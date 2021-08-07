<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminHomeController extends Controller
{
    public function index()
    {
        return view( 'admin.profile' );
    }

    public function users()
    {
        $users = User::paginate( 10 );

        return view( 'admin.users', compact( 'users' ) );
    }

    public function userApprove( $id )
    {
        $user = User::findOrFail( $id );
        $user->invertApprove();

        return redirect()->back()->with( [ 'approve' => 'Approbation status changed!' ] );
    }

    public function userDelete( $id )
    {
        $user = User::findOrFail( $id );
        $user->delete();

        return redirect()->back()->with( [ 'delete' => 'User deleted!' ] );
    }
}
