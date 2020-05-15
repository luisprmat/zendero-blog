<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Silber\Bouncer\Database\Ability;

class AbilityController extends Controller
{
    public function index()
    {
        return view('admin.abilities.index', [
            'abilities' => Ability::all()
        ]);
    }

    public function edit(Ability $ability)
    {
        return view('admin.abilities.edit', [
            'ability' => $ability
        ]);
    }

    public function update(Request $request, Ability $ability)
    {
        $data = $request->validate(['title' => 'required']);

        $ability->update($data);

        return redirect()->route('admin.abilities.edit', $ability)->withFlash('El permiso ha sido actualizado');
    }
}
