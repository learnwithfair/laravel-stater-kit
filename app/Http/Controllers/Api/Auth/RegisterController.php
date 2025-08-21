<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegistationOtp;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Mail\OTPMail;
use App\Models\EmailOtp;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    use ApiResponse;


    /**
     * Send a Register (OTP) to the user via email.
     *
     * @param  \App\Models\User  $user
     * @return void
     */

    private function sendOtp($user) {
        $code = rand(1000, 9999);

        // Store verification code in the database
        $verification = EmailOtp::updateOrCreate(
            ['user_id' => $user->id],
            [
                'verification_code' => $code,
                'expires_at' => Carbon::now()->addMinutes(15)
            ]
        );

        Mail::to($user->email)->send(new RegistationOtp($user, $code));
    }


    /**
     * Register User by name, gender, email, number, password & privacy policy
     *
     * @param  \Illuminate\Http\Request  $request  The HTTP request with the register query.
     * @return \Illuminate\Http\JsonResponse  JSON response with success or error.
     */

    public function userRegister(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'email' => 'required|email|unique:users,email',
            'number' => 'required|numeric',
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
            ],
            'agree_to_terms' => 'required|boolean'
        ], [
            'password.min' => 'The password must be at least 8 characters long.',
            'gender.in' => 'The selected gender is invalid.',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors(), 422);
        }

        try {
            // Find the user by ID
            $user = new User();
            $user->name = $request->input('name');
            $user->gender = $request->input('gender');
            $user->email = $request->input('email');
            $user->number = $request->input('number');
            $user->password = Hash::make($request->input('password')); // Hash the password
            $user->agree_to_terms = $request->input('agree_to_terms');

            $user->save();

            $token = JWTAuth::fromUser($user);

            $this->sendOtp($user);


            $responseData = [
                'id'       => $user->id,
                'name'     => $user->name,
                'email'    => $user->email,
                'number'    => $user->number,
                'gender'    => $user->gender,
                'agree_to_terms'   => $user->agree_to_terms,
                'token'    => $token,
            ];

            return $this->success($responseData, 'Verification email sent', 201);
        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }
    }

    /**
     * Verify the OTP sent to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function otpVarify(Request $request) {

        // Validate the request
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp' => 'required|numeric|digits:4',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors(), 422);
        }

        try {
            // Retrieve the user by email
            $user = User::where('email', $request->input('email'))->first();

            $verification = EmailOtp::where('user_id', $user->id)
            ->where('verification_code', $request->input('otp'))
            ->where('expires_at', '>', Carbon::now())
            ->first();


            if ($verification) {

                $user->email_verified_at = Carbon::now();
                $user->save();

                $verification->delete();

                return $this->success($user, 'OTP verified successfully', 200);
            } else {

                return $this->error([], 'Invalid or expired OTP', 400);
            }
        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }
    }

    /**
     * Resend an OTP to the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

     public function otpResend(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors(), 422);
        }

        try {
            // Retrieve the user by email
            $user = User::where('email', $request->input('email'))->first();

            $this->sendOtp($user);

            return $this->success($user, 'OTP has been sent successfully.',200);
        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }
     }

     /**
     * Save User Address
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

     public function saveAddress(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'address' => 'required|string',
            'lat' => 'required|numeric',
            'long' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors(), 422);
        }

        try {
            // Retrieve the user by email
            $user = User::where('email', $request->input('email'))->first();

            $user->address = $request->input('address');
            $user->lat = $request->input('lat');
            $user->long = $request->input('long');
            $user->save();

            return $this->success($user, 'Address Saved!',200);

        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }
     }
}
