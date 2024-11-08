<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Offer;
use App\Models\WebmasterOffer;

class IndexController extends Controller
{
    public function index()
    {
        $users = DB::table('users')
            ->join('roles', 'users.role_id', '=', 'roles.id')
            ->select('users.id', 'users.name', 'roles.name as role')
            ->get();

        return view('index', [
            'users' => $users,
            'offers' => Offer::with('advertiser', 'theme')->get(),
            'webmasters_offers' => WebmasterOffer::with('webmaster')->with('offer')->get(),
        ]);
    }
}
