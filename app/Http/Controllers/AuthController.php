<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Traits\ApiResponser;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    use ApiResponser;

    public function register(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'picture_url'=>'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'firstname' => $attr['firstname'],
            'middlename' => $attr['middlename'],
            'lastname' => $attr['lastname'],
            'picture_url'=>$attr['picture_url'],
            'email' => $attr['email'],
            'password' => bcrypt($attr['password']),
        ]);
        $token = $user->createToken('API Token')->plainTextToken;
        return $this->authResponse($token);
    }

    public function login(Request $request)
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }
        $user = User::where('email', $request->email)->first();
        $token = $user->createToken('API Token')->plainTextToken;
        return $this->authResponse($token);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Tokens Revoked'
        ];
    }

    private function authResponse($token)
    {
        return response()->json(
            [
                'token' => $token,
            ],
            201
        );
    }
}
