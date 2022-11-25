<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'checkresetPassword']]);
    }
    public function login(Request $request)
    {
        $credentials = request(['phone']);
        
        if (User::where('phone', $request->phone)->first() == null) {
             $request->validate([
                'phone' => 'required|unique:users'
            ]);
            $lastU  =  User::latest('created_at')->first();
            if(!$lastU) {
                $user = User::create([
                    'chat_id' => 1,
                    'phone' => request()->phone,
                    'password' => bcrypt('testpass')
                ]);
            }
            else {
                $user = User::create([
                    'chat_id' => $lastU->chat_id+2,
                    'phone' => request()->phone,
                    'password' => bcrypt('testpass')
                ]);

            }
            $user = User::findOrFail($user->id);
            $token = Auth::guard('api')->login($user);
            return response()->json(['data' =>  $user, 'token' => $token], 210);
        }
        $user = User::where('phone', $request->phone)->first();
        $token = Auth::guard('api')->login($user);
        return response()->json(['data' => auth('api')->user(), 'token' => $token], 200);
    }
    protected function attemptLogin(Request $request)
    {   
        //Try with email AND username fields
        if (Auth::attempt(['phone' => $request['phone']])){
            return true;
        }
        return false;
    }
    
    public function editProfile(Request $request) {
        $request->validate([
            'id' => 'required'
        ]);
        $user = User::findOrFail($request->id);
        $request_data = $request->except(['token']);
        if(isset($request_data['password'] )) {
            $request_data['password'] = bcrypt($request_data['password']);
        }
        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $filename = 'photos'.'_'.time().'.'.$ext;
            $storagePath = Storage::disk('public_uploads')->put('/photos', $file);
            $storageName = basename($storagePath);
            $request_data['photo'] = $storageName;
       }
        $user->update($request_data);
        return response()->json(['data' => $user]);
    }


}
