<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    use ApiResponse;

    /**
     * Fetch User data based on user_id
     *
     * @return \Illuminate\Http\JsonResponse  JSON response with success or error.
     */

    public function userData()
    {

        $user = User::select(['id', 'is_premium', 'name', 'email', 'role', 'avatar', 'number', 'address', 'lat', 'long', 'gender', 'agree_to_terms', 'created_at'])->find(auth()->user()->id);
        if (!$user) {
            return $this->error([], 'User Not Found', 404);
        }
        return $this->success($user, 'User data fetched successfully', '200');
    }

    /**
     * Update User Infromation
     *
     * @param  \Illuminate\Http\Request  $request  The HTTP request with the register query.
     * @return \Illuminate\Http\JsonResponse  JSON response with success or error.
     */

    public function userUpdate(Request $request, int $id)
    {

        $validator = Validator::make($request->all(), [
            'avatar' => 'nullable|image|mimes:jpeg,png,gif|max:5120',
            'name' => 'required|string|max:255',
            'gender' => 'required|in:male,female,other',
            'number' => 'required|numeric',
            'address' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->error([], $validator->errors()->first(), 422);
        }

        try {
            // Find the user by ID
            $user = User::select(['id', 'is_premium', 'name', 'email', 'role', 'avatar', 'number', 'address', 'lat', 'long', 'gender', 'agree_to_terms', 'created_at'])->find($id);

            if ($request->hasFile('avatar')) {

                if ($user->avatar) {
                    $previousImagePath = public_path($user->avatar);
                    if (file_exists($previousImagePath)) {
                        unlink($previousImagePath);
                    }
                }

                $image                        = $request->file('avatar');
                $imageName                    = uploadImage($image, 'User/Avatar');
            } else {
                $imageName = $user->avatar;
            }

            // If user is not found, return an error response
            if (!$user) {
                return $this->error([], "User Not Found", 404);
            }

            $user->name = $request->name;
            $user->gender = $request->gender;
            $user->number = $request->number;
            $user->address = $request->address;
            $user->avatar = $imageName;

            $user->save();

            return $this->success($user, 'User updated successfully', '200');
        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }
    }

    /**
     * Logout the authenticated user's account
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse JSON response with success or error.
     */
    public function logoutUser()
    {

        try {
            auth()->guard('api')->logout();

            return $this->success([], 'Successfully logged out', '200');
        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }


    }


    /**
     * Delete the authenticated user's account
     *
     * @return \Illuminate\Http\JsonResponse JSON response with success or error.
     */
    public function deleteUser()
    {
        try {
            // Get the authenticated user
            $user = auth()->user();

            // Delete the user's avatar if it exists
            if ($user->avatar) {
                $previousImagePath = public_path($user->avatar);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            // Delete the user
            $user->delete();

            return $this->success([], 'User deleted successfully', '200');
        } catch (\Exception $e) {
            return $this->error([], $e->getMessage(), 500);
        }
    }
}
