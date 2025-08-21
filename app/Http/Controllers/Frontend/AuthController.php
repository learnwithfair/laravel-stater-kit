<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller {
    public function clientSignin() {
        return view( 'frontend.auth.login' );
    }

    public function showRegisterForm() {
        return view( 'frontend.auth.register' );
    }

    public function register( Request $request ) {
        $validator = Validator::make( $request->all(), [
            'name'         => 'required|string|max:255',
            'email'        => 'required|string|email|max:255|unique:clients,email',
            'phone_number' => 'required|string|max:20|unique:clients,phone_number',
            'password'     => 'required|string|min:6|confirmed', // 'password_confirmation' required
        ] );

        if ( $validator->fails() ) {
            return back()->withErrors( $validator )->withInput();
        }

        Client::create( [
            'name'         => $request->name,
            'email'        => $request->email,
            'phone_number' => $request->phone_number,
            'password'     => Hash::make( $request->password ),
        ] );

        return redirect()->route( 'clientSignin' )->with( 'success', 'Account created successfully!' );
    }

    public function clientLogin( Request $request ) {
        $request->validate( [
            'login'    => 'required|string',
            'password' => 'required|string',
        ] );

        $client = Client::where( 'email', $request->login )
            ->orWhere( 'phone_number', $request->login )
            ->first();

        if ( !$client || !Hash::check( $request->password, $client->password ) ) {
            return back()->withErrors( ['login' => 'Invalid login credentials'] )->withInput();
        }

        Auth::guard( 'client' )->login( $client );

        return redirect()->route( 'home' )->with( 'success', 'Logged in successfully!' );
    }

    public function clientLogout( Request $request ) {
        Auth::guard( 'client' )->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route( 'clientLogin' )->with( 'success', 'Logged out!' );
    }

    ##################################

    // public function showLinkRequestForm() {
    //     if ( Auth::guard( 'employee' )->check() ) {
    //         return redirect()->route( 'home' );
    //     }
    //     return view( 'frontend.auth.employee-forgot-password' );
    // }

    // public function sendResetLink( Request $request ) {
    //     $request->validate( [
    //         'email' => 'required|email|exists:employees,email',
    //     ] );

    //     // Use the 'employees' password broker
    //     $status = Password::broker( 'employees' )->sendResetLink( $request->only( 'email' ) );

    //     return $status === Password::RESET_LINK_SENT
    //     ? back()->with( 'status', __( 'A password reset link has been sent to your email.' ) )
    //     : back()->withErrors( ['email' => __( 'Unable to send reset link. Try again later.' )] );
    // }

    // public function showResetForm( $token ) {
    //     if ( Auth::guard( 'employee' )->check() ) {
    //         return redirect()->route( 'home' );
    //     }
    //     return view( 'frontend.auth.employee-reset-password', ['token' => $token] );
    // }

    // public function reset( Request $request ) {
    //     $request->validate( [
    //         'email'    => 'required|email|exists:employees,email',
    //         'password' => 'required|min:6|confirmed',
    //         'token'    => 'required',
    //     ] );

    //     // Use the employees password broker
    //     $status = Password::broker( 'employees' )->reset(
    //         $request->only( 'email', 'password', 'password_confirmation', 'token' ),
    //         function ( $employee, $password ) {
    //             $employee->password = Hash::make( $password );
    //             $employee->save();
    //         }
    //     );

    //     return $status === Password::PASSWORD_RESET
    //     ? redirect()->route( 'employeeLogin.show' )->with( 'success', 'Your password has been reset. Please log in.' )
    //     : back()->withErrors( ['email' => __( 'Unable to reset password.' )] );
    // }
}
