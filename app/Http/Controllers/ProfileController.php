<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function showUpdateProfileForm()
    {
        return view( 'profile.update' );
    }

    public function updateProfile( UpdateUserRequest $request )
    {
        $user = auth()->user();

        $attr = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => is_null( $request->password ) ? $user->password : Hash::make( $request->password ),
        ];
        $user->update( $attr );

        return redirect()->back()->with( 'message', 'Profile Updated!' );
    }
}
