<?php

namespace App\Http\Controllers\Web\Backend\Settings;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserDetail;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the profile settings page.
     *
     * @return View
     */
    public function showProfile()
    {
        $userDetails = User::where('id', Auth::id())->first();
        return view('backend.layouts.settings.profile_settings', ['userDetails' => $userDetails]);
    }

    /**
     * Update the user's profile information.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'  => 'nullable|max:100|min:2',
            'email' => 'nullable|email|unique:users,email,' . auth()->user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $user        = User::find(auth()->user()->id);
            $user->name  = $request->name;
            $user->email = $request->email;

            $user->save();
            return redirect()->back()->with('t-success', 'Profile updated successfully');
        } catch (Exception) {
            return redirect()->back()->with('t-error', 'Something went wrong');
        }
    }

    /**
     * Update the user's password.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function UpdatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password'     => 'required|confirmed|min:8',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            $user = Auth::user();
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();

                return redirect()->back()->with('t-success', 'Password updated successfully');
            } else {
                return redirect()->back()->with('t-error', 'Current password is incorrect');
            }
        } catch (Exception) {
            return redirect()->back()->with('t-error', 'Something went wrong');
        }
    }

    /**
     * Update the user's profile picture.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function UpdateProfilePicture(Request $request)
    {
        try {
            $request->validate([
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:4048',
            ]);

            $user        = Auth::user();

            if ($user->avatar) {
                $previousImagePath = public_path($user->avatar);
                if (file_exists($previousImagePath)) {
                    unlink($previousImagePath);
                }
            }

            if ($request->hasFile('profile_picture')) {
                $image                        = $request->file('profile_picture');
                $imageName                    = uploadImage($image, 'users');
                $user->avatar = $imageName;

                $user->save();
            }

            return response()->json([
                'success'   => true,
                'image_url' => asset($user->avatar),
            ]);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while uploading the profile picture.',
            ]);
        }
    }
}
