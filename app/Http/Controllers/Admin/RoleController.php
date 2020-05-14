<?php

namespace App\Http\Controllers\Admin;

use Bouncer;
use Illuminate\Http\Request;
use Silber\Bouncer\Database\Role;
use App\Http\Controllers\Controller;
use Silber\Bouncer\Database\Ability;

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
        return view('admin.roles.create', [
            'abilities' => Ability::all(),
            'role' => new Role
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:bouncer_roles',
            'title' => 'required'
        ]);

        $role = Bouncer::role()->create($data);

        if ($request->has('abilities')) {
            $role->abilities()->attach($request->abilities);
        }

        return redirect()->route('admin.roles.index')->withFlash('El rol fue creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
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
    public function update(Request $request, Role $role)
    {
        $data = $request->validate([
            'name' => 'required|unique:bouncer_roles,name,' . $role->id,
            'title' => 'required'
        ]);

        $role->update($data);

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
    public function destroy($id)
    {
        //
    }
}
