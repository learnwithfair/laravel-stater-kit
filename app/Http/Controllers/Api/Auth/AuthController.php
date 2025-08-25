<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helpers\OtpHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;

class AuthController extends Controller
{
    use ApiResponse;

    public function register(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = User::create($data);
        if ($user) {
            return OtpHelper::sendEmailOtp($user->email, 'register');
        }

        return $this->error(null, 'Failed to register user', 500);
    }

    public function resendOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Validation failed', 422);
        }

        return OtpHelper::sendEmailOtp($request->email, 'register');
    }

    public function verifyRegisterOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'otp'   => 'required|integer',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Validation failed', 422);
        }

        $cacheKey  = 'user_otp_' . $request->email;
        $cachedOtp = Cache::get($cacheKey);

        if (!$cachedOtp || $cachedOtp != $request->otp) {
            return $this->error(null, 'OTP expired or invalid!', 400);
        }

        User::where('email', $request->email)->update([
            'email_verified_at' => now(),
        ]);

        Cache::forget($cacheKey);

        return $this->success(null, 'Email verified successfully!');
    }

    public function index()
    {
        $users = User::whereNotNull('email_verified_at')->latest()->get();
        return $this->success($users, 'Users retrieved successfully');
    }

    public function show(User $user)
    {
        if (!$user) {
            return $this->error(null, 'User not found', 404);
        }
        return $this->success($user, 'User details retrieved');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|exists:users,email',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Validation failed', 422);
        }

        $user = User::where('email', $request->email)->first();
        if (!$user->email_verified_at) {
            return $this->error(null, 'Please verify your email before logging in.', 403);
        }

        if (!Hash::check($request->password, $user->password)) {
            return $this->error(null, 'Invalid email or password', 401);
        }

        // Check account status
        if (!$user->is_enabled) {
            return $this->error(null, 'Your account is inactive. Please contact support.', 403);
        }

        // Create token
        $token = $user->createToken('postman')->plainTextToken;

        return $this->success([
            'user'       => $user,
            'token'      => $token,
            'token_type' => 'Bearer'
        ], 'Login successful');
    }


    public function destroy(Request $request)
    {
        $user = $request->user(); // Authenticated user

        deleteById(User::class, $user->id, 'image');

        return $this->success(null, 'Account deleted successfully.');
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password'     => 'required|string|min:6|different:current_password|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Validation failed', 422);
        }

        $user = $request->user(); // Authenticated user via Sanctum

        if (!Hash::check($request->current_password, $user->password)) {
            return $this->error(null, 'Current password is incorrect.', 401);
        }

        $user->update(['password' => Hash::make($request->new_password)]);

        return $this->success(null, 'Password updated successfully.');
    }

    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Validation failed', 422);
        }

        return OtpHelper::sendEmailOtp($request->email, 'forgot_password');
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'        => 'required|email|exists:users,email',
            'otp'          => 'required|integer',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return $this->error($validator->errors(), 'Validation failed', 422);
        }

        $cacheKey  = 'user_otp_' . $request->email;
        $cachedOtp = Cache::get($cacheKey);

        if (!$cachedOtp || $cachedOtp != $request->otp) {
            return $this->error(null, 'OTP is invalid or expired.', 400);
        }

        $user = User::where('email', $request->email)->first();
        $user->update(['password' => Hash::make($request->new_password)]);
        Cache::forget($cacheKey);

        return $this->success(null, 'Password reset successfully.');
    }

    public function updateProfile(UpdateUserRequest $request)
    {
        $user = $request->user(); // Authenticated user
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = uploadFile($request->file('image'), 'assets/users/images');
        }

        $user->update($data);

        return $this->success($user, 'Profile updated successfully.');
    }



    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()?->delete();
        return response()->json(['message' => 'Logged out']);
    }

    public function logoutAll(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out from all devices']);
    }
}
