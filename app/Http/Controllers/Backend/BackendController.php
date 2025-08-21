<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BackendController extends Controller {

    public function redirectToDashboard() {
        return redirect()->route( 'admin.dashboard' );
    }

    public function index() {

        return view( 'backend.dashboard' );
    }

    public function logo() {

        $logoInfo = Logo::limit( 3 )->orderBy( 'id', 'DESC' )->get();
        return view( 'backend.logo.logo', compact( 'logoInfo' ) );

    }

    public function updatePicture( Request $request ) {
        $path = 'uploads/profileImages/';
        $file = $request->file( 'admin_image' );
        $new_name = 'admin_' . date( 'Ymd' ) . uniqid() . '.jpg';

        //Upload new image
        $upload = $file->move( public_path( $path ), $new_name );

        if ( !$upload ) {
            return response()->json( ['status' => 0, 'msg' => 'Something went wrong, upload new picture failed.'] );
        } else {
            //Get Old picture

            $oldPicture = Auth::user()->image;

            if ( $oldPicture != '' ) {
                if ( File::exists( public_path( $path . $oldPicture ) ) ) {
                    File::delete( public_path( $path . $oldPicture ) );
                }
            }

            //Update DB
            $update = User::find( Auth::user()->id )->update( ['image' => $new_name] );

            if ( !$update ) {
                return response()->json( ['status' => 0, 'msg' => 'Something went wrong, updating picture in db failed.'] );
            } else {
                return response()->json( ['status' => 1, 'msg' => 'Your profile picture has been updated successfully'] );
            }
        }
    }

}
