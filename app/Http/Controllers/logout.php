<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class logout extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
