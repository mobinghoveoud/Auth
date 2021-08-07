<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Approve
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle( Request $request, Closure $next )
    {
        if ( !auth()->user()->can( 'approve', User::class ) ) {
            return redirect()->route( 'not_approved' );
        }

        return $next( $request );
    }
}
