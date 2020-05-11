<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UserRolesController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->roles()->detach();

        if ($request->filled('roles')) {
            $user->roles()->attach($request->roles);
        }

        return back()->withFlash('Los roles han sido actalizados');
    }
}
