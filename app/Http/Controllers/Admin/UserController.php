<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index($role = null)
    {
        if ($role) {
            $roleId = Role::where('name', '=', $role)->first()->id;
            $users = User::where('role_id', '=', $roleId)->with('role')->get();
        } else {
            $users = User::with('role')->get();
        }
        return Inertia::render('Admin/User/Index', ['users' => $users]);
    }
}
