<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Util\Roles;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function edit(User $user)
    {
        return view('role.edit', ['user' => $user, 'roles' => Roles::getRoles()]);
    }

    public function set(Request $request, User $user)
    {
        $role = $request->role;
        $user->setRole($role);
        $user->save();

        return redirect(route('admin.dashboard'));
    }
}
