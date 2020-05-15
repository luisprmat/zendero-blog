<?php

namespace App\Http\Controllers\Admin;

use Bouncer;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;
use App\Http\Controllers\Controller;
use Silber\Bouncer\Database\Ability;
use App\Http\Requests\SaveRolesRequest;
use Illuminate\Auth\Access\AuthorizationException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('update', $role = new Role);

        return view('admin.roles.create', [
            'abilities' => Ability::all(),
            'role' => $role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveRolesRequest $request)
    {
        $this->authorize('create', new Role);

        $role = Bouncer::role()->create($request->validated());

        if ($request->has('abilities')) {
            $role->abilities()->attach($request->abilities);
        }

        return redirect()->route('admin.roles.index')->withFlash('El rol fue creado correctamente');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $this->authorize('update', $role);

        return view('admin.roles.edit', [
            'role' => $role,
            'abilities' => Ability::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SaveRolesRequest $request, Role $role)
    {
        $this->authorize('update', $role);

        $role->update($request->validated());

        $role->abilities()->detach();

        if ($request->has('abilities')) {
            $role->abilities()->attach($request->abilities);
        }

        return redirect()->route('admin.roles.edit', $role)->withFlash('El rol fue actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);

        $role->delete();

        return redirect()->route('admin.roles.index')->withFlash('El rol fue eliminado');
    }
}
