<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserAbilitiesController extends Controller
{
    public function update(Request $request, User $user)
    {
        $user->abilities()->detach();

        if ($request->filled('abilities')) {
            $user->abilities()->attach($request->abilities);
        }

        return back()->withFlash('Los permisos han sido actualizados');
    }
}
