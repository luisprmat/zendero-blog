<?php

namespace App\Http\Controllers\Admin;

use Bouncer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserRolesController extends Controller
{
    public function update(Request $request, User $user)
    {
        Bouncer::sync($user)->roles($request->roles);

        return back()->withFlash('Los roles han sido actalizados');
    }
}
