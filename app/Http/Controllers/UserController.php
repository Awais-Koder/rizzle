<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();

        return new UserCollection($users);
    }

    public function store(UserStoreRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        // Generate a Sanctum token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        // Return the user resource along with the token
        return response()->json([
            'user' => new UserResource($user),
            'token' => $token,
        ], 201);
    }
    public function login(Request $request)
    {
        $request->validate([
            'phone_number' => 'required|string|exists:users,phone_number',
            'password' => 'required|string',
        ]);

        // Attempt to authenticate user with phone and password
        $credentials = $request->only('phone_number', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        // Generate Sanctum token
        $user = Auth::user();
        $token = $user->createToken('API Token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function applyForCard($id)
    {
        $reqExist = User::where('id', $id)->where('card_status', 'applied')->exists();
        if ($reqExist) {
            return response()->json([
                'message' => 'Card application already exists.',
            ]);
        }
        $user = User::findOrFail($id);
        $user->card_status = 'applied';
        $user->save();

        return response()->json([
            'message' => 'Card application successful.',
        ]);
    }
}
