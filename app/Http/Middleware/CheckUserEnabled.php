<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CheckUserEnabled {
    public function handle( $request, Closure $next ) {
        // Ensure user is authenticated
        if ( Auth::check() ) {
            $user = Auth::user();

            // Use the Gate to check if the user is enabled
            if ( !Gate::allows( 'is-enabled', $user ) ) {
                abort( 403, 'Your account is disabled.' );
            }
        }

        return $next( $request );
    }
}
