<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Advertiser;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Role;
use App\Models\Webmaster;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'role' => 'required|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
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
            Advertiser::create([
                'user_id' => $user->id,
                'name' => $request->nameCompany
            ]);
        } else if ($request->role == 'webmaster') {
            Webmaster::create([
                'user_id' => $user->id,
                'site' => $request->site
            ]);
        }

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
