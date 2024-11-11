<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Role;
use Barryvdh\Debugbar\Facades\Debugbar;
use App\Models\Advertiser;
use App\Models\Webmaster;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index($role = null)
    {
        if ($role) {
            $roleId = Role::where('name', '=', $role)->first()->id;
            if ($role == 'advertiser') {
                $users = User::where('role_id', '=', $roleId)->with('advertiser', 'role')->get();
            } else if ($role == 'webmaster') {
                $users = User::where('role_id', '=', $roleId)->with('webmaster', 'role')->get();
            }
        } else {
            $users = User::with('role', 'advertiser', 'webmaster')->get();
            Debugbar::info($users);
        }
        return Inertia::render('Admin/User/Index', ['users' => $users]);
    }

    public function create()
    {
        Debugbar::info('create');
        return Inertia::render('Admin/User/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
            'role' => 'required',
        ]);

        $roleId = Role::where('name', $request->role)->first()->id;

        if ($request->role == 'advertiser') {
            $request->validate([
                'nameCompany' => 'required|string|max:255',
            ]);
        } else if ($request->role == 'webmaster') {
            $request->validate([
                'site' => 'required|url',
            ]);
        }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $roleId;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->role == 'advertiser') {
            $advertiser = new Advertiser();
            $advertiser->user_id = $user->id;
            $advertiser->name = $request->nameCompany;
            $advertiser->save();
        } else if ($request->role == 'webmaster') {
            $webmaster = new Webmaster();
            $webmaster->user_id = $user->id;
            $webmaster->site = $request->site;
            $webmaster->save();
        }

        return redirect()->route('admin.users.index', '');
    }
}
