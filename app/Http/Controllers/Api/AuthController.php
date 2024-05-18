<?php

namespace App\Http\Controllers\Api;
use Validator;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login
    public function login(Request $request)
    {
        // $credentials = $request->only('email', 'password');
        // if (auth()->attempt($credentials)){
        //     $user = auth()->user();
        //     $token = $user->createToken('auth_token')->plainTextToken;
        //     return respons()->json([
        //         'token' => $token,
        //         'token_type' => 'Bearer',
        //     ]);
        // }
        // return response()->json([
        //     'message' => 'Unauthorized',
        // ], 401);

        $loginData = $request->validate([
            'email' => 'request|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $loginData['email'])->first();

        //check user exist
        if (!$user){
            return response(['message' => 'Invalid credentials'], 401);
        }
        //check password
        if (!Hash::check($loginData['password'], $user->password)){
            return response(['message' => 'Invalid credentials'], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response(['user' => $user, 'token' => $token], 200);
    }
    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response(['message' => 'Logged out'], 200);
    }

    //update image profile & face_embedding
    public function updateProfile(Request $request)
    {
        $request->validate([
            'image_url'=> 'required|image|mimes:png,jpg,jpeg|max:2048',
            'face_embedding'=> 'required',
        ]);

        $user = $request->user();
        $image = $request->file('image');
        $face_embedding = $request->face_embedding;

        //save image
        $image->storeAs('public/images', $image->hashName());
        $user->image_url = $image->hashName();
        $user->face_embedding = $face_embedding;
        $user->save();

        //return response(['message' => 'Profile update'], 200);

        return response([
                   'message' => 'Profile updated',
                     'user' => $user,
                ], 200);

    }
    // public function updateProfile(Request $request)
    // {
    //     $request->validate([
    //         // 'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //         'face_embedding' => 'required',
    //     ]);

    //     $user = $request->user();
    //     // $image = $request->file('image');
    //     $face_embedding = $request->face_embedding;

    //     // //save image
    //     // $image->storeAs('public/images', $image->hashName());
    //      //$user->image_url = $image->hashName();
    //     $user->face_embedding = $face_embedding;
    //     $user->save();

    //     return response([
    //         'message' => 'Profile updated',
    //         'user' => $user,
    //     ], 200);
    // }


}
