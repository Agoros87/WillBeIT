<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Imports\UsersImport;
use App\Models\Center;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(16);

        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        $centers = Center::all();

        return view('users.create', compact('roles', 'centers'));
    }

    public function store(UserStoreRequest $request)
    {
        //dd($request);
        // Crear un nuevo usuario
        $user = User::create([
            'center_id' => $request->center_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'type' => $request->type,
        ]);
        // Asignar el rol al usuario
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente');
    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $centers = Center::all();
        $userRole = $user->roles->pluck('name')->first();

        return view('users.edit', compact('user', 'roles', 'centers', 'userRole'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update([
            'center_id' => $request->center_id,
            'surname' => $request->surname,
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        $user->syncRoles($request->roles);

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente');
    }

    public function importUsers(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv'
        ]);

        Excel::import(new UsersImport, $request->file('file'));

        return back()->with('success', 'Importación exitosa.');
    }

    public function exportUsers()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
