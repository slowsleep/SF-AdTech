<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Barryvdh\Debugbar\Facades\Debugbar;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request)
    {
        try {
            $request->validate([
                'id' => 'required|numeric',
                'active' => 'bool',
            ]);
            $user = User::findOrFail($request->id);
            $user->update($request->all());
            $response = ['error' => false, 'message' => 'User has been successfully updated.'];

            return response()->json($response, 200);
        } catch (Exception $e) {
            Debugbar::error($e);

            $response = [
                'error' => true,
                'message' => $e->getMessage(),
            ];

            return response()->json($response, 500);
        }
    }
}
