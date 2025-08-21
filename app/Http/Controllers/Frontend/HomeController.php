<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller {

    public function index() {
        return view( 'frontend.home' );
    }
    public function services() {
        return view( 'frontend.services' );
    }
    public function about() {
        return view( 'frontend.about_us' );
    }
    public function contact() {
        return view( 'frontend.contact_us' );
    }
    public function blog() {
        return view( 'frontend.blog' );
    }
    public function workForUs() {
        return view( 'frontend.work_for_us' );
    }
    public function clientSignin() {
        return view( 'frontend.auth.login' );
    }
    public function clientRegister() {
        return view( 'frontend.auth.register' );
    }

    // public function index() {
    //     $data['pageTitle'] = 'Home';

    //     if ( Auth::guard( 'employee' )->check() ) {
    //         return view( 'frontend.home' );
    //     }

    //     return redirect()->route( 'employeeLogin.show' );

    // }

    // public function loginPageShow() {
    //     $data['pageTitle'] = 'Home';

    //     if ( Auth::guard( 'employee' )->check() ) {
    //         return redirect()->route( 'home' );
    //     }

    //     return view( 'frontend.auth.login' );
    // }

    // public function login( Request $request ) {
    //     // Validate the request data
    //     $request->validate( [
    //         'email'    => 'required|email',
    //         'password' => 'required|min:6',
    //     ] );

    //     // Convert the "remember" checkbox value to a boolean
    //     $remember = $request->has( 'remember' );

    //     // Attempt to log in the employee with the remember token
    //     if ( Auth::guard( 'employee' )->attempt( ['email' => $request->email, 'password' => $request->password], $remember ) ) {
    //         $request->session()->regenerate();

    //         // Store credentials in cookies if "Remember Me" is checked
    //         if ( $remember ) {
    //             Cookie::queue( 'employee_email', $request->email, 43200 ); // 30 days
    //             Cookie::queue( 'employee_password', $request->password, 43200 ); // 30 days
    //             Cookie::queue( 'remember_me', true, 43200 );
    //         } else {
    //             // Clear cookies if not selected
    //             Cookie::queue( Cookie::forget( 'employee_email' ) );
    //             Cookie::queue( Cookie::forget( 'employee_password' ) );
    //             Cookie::queue( Cookie::forget( 'remember_me' ) );
    //         }

    //         return redirect()->route( 'home' )->with( 'success', 'Logged in successfully.' );
    //     }

    //     return back()->withErrors( ['email' => 'The provided credentials do not match our records.'] )->onlyInput( 'email' );
    // }

    // public function registerPageShow() {
    //     $data['pageTitle'] = 'Home';

    //     if ( Auth::guard( 'employee' )->check() ) {
    //         return redirect()->route( 'home' );
    //     }

    //     return view( 'frontend.auth.register' );
    // }

    // public function register( Request $request ) {
    //     // Validate the request
    //     $validator = Validator::make( $request->all(), [
    //         'name'          => 'required|string|max:255',
    //         'email'         => 'required|string|email|max:255|unique:employees',
    //         'phone'         => 'required|string|max:15',
    //         'company_code'  => 'required|string|max:255|exists:users,company_code',
    //         'role'          => 'required|string|max:255',
    //         'employee_type' => 'required|in:onsite,remote',
    //         'password'      => 'required|string|min:8|confirmed',
    //     ] );

    //     // Check if validation fails
    //     if ( $validator->fails() ) {
    //         return redirect()->back()
    //             ->withErrors( $validator )
    //             ->withInput();
    //     }

    //     // Create new employee record
    //     $employee = Employee::create( [
    //         'name'          => $request->name,
    //         'email'         => $request->email,
    //         'phone'         => $request->phone,
    //         'company_code'  => $request->company_code,
    //         'role'          => $request->role,
    //         'employee_type' => $request->employee_type,
    //         'password'      => Hash::make( $request->password ),
    //     ] );

    //     // Attempt to log in the newly registered employee
    //     if ( Auth::guard( 'employee' )->attempt( ['email' => $request->email, 'password' => $request->password] ) ) {
    //         $request->session()->regenerate();
    //         return redirect()->route( 'home' )->with( 'success', 'Account created and logged in successfully.' );
    //     }

    //     // Redirect to login with error if login fails
    //     return redirect()->route( 'employeeLogin.show' )->with( 'error', 'Account created but login failed. Please try logging in.' );
    // }

    // public function logout() {
    //     Auth::guard( 'employee' )->logout();
    //     session()->invalidate();
    //     session()->regenerateToken();
    //     return redirect()->route( 'employeeLogin.show' )->with( 'success', 'You have been logged out successfully.' );
    // }

}
