<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    use ApiResponse;

    public function socialLogin(Request $request)
    {
        // Validate the incoming request to ensure all necessary data is provided
        $request->validate([
            'token' => 'required|string',
            'provider' => 'required|in:google,facebook',
            'username' => 'required|string',
            'email' => 'nullable|email',
            'avatar' => 'nullable|url',
        ]);

        // try {
        // Check if the user already exists in the database
        $user = User::where('email', $request->email)->first();

        // Initialize the path for storing the avatar
        $avatarPath = null;

        if ($request->avatar) {
            try {
                // Download the avatar image content
                $avatarContents = file_get_contents($request->avatar);

                // Generate a unique image name
                $imageName = Str::slug(time()) . '.jpg'; // Using current timestamp for unique naming

                // Define the path to store the image
                $folder = 'avatars';
                $path = public_path('uploads/' . $folder);

                // Create the directory if it does not exist
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }

                // Save the image to the specified path
                file_put_contents($path . '/' . $imageName, $avatarContents);

                // Store the relative path to the image in the database
                $avatarPath = 'uploads/' . $folder . '/' . $imageName;

            } catch (Exception $e) {
                // Handle any errors during image download
                return $this->error(['error' => 'Failed to download avatar.'], 'Something went wrong', 500);
            }
        }

        if (!$user) {
            // If user does not exist, create a new user including the avatar
            $user = User::create([
                'name'           => $request->username,
                'email'          => $request->email,
                'avatar'         => $avatarPath, // Save avatar URL
                'provider'       => $request->provider,
                'password'       => bcrypt(Str::random(16)), // Generate a random password
                'agree_to_terms' => false,
            ]);
        } else {
            // Update user information if necessary (e.g., name, avatar)
            $user->update([
                'name'   => $request->username,
                'avatar' =>  $avatarPath ? $avatarPath : $user->avatar, // Update avatar URL if provided
            ]);
        }

        // Generate JWT token for the existing or newly created user
        $token = JWTAuth::fromUser($user);

        // Prepare response data
        $responseData = [
            'id'       => $user->id,
            'name'     => $user->name,
            'email'    => $user->email,
            'avatar'   => $user->avatar,
            'provider' => $user->provider,
            'agree_to_terms' => $user->agree_to_terms,
            'token'    => $token,
        ];

        return $this->success($responseData, 'User authenticated successfully', 200);

        // } catch (Exception $e) {
        //     return $this->error(['error' => $e->getMessage()], 'Something went wrong', 500);
        // }
    }
}
