<?php

namespace App\Http\Controllers\Api\Emp;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register', 'checkresetPassword', 'editProfile']]);
    }
    public function login(Request $request)
    {
        $credentials = request(['phone']);
        
        if (Employee::where('phone', $request->phone)->first() == null) {
             $request->validate([
                'phone' => 'required|unique:employees'
            ]);    
            $lastU  =  Employee::latest('created_at')->first();
            if(!$lastU) {
                $user = Employee::create([
                    'phone' => request()->phone,
                    'chat_id' => 2,
                    'password' => bcrypt('testpass')
                ]);

            }
            else {
                $user = Employee::create([
                    'phone' => request()->phone,
                    'chat_id' => $lastU->chat_id+2,
                    'password' => bcrypt('testpass')
                ]);
            }
            $user = Employee::findOrFail($user->id);
            $token = Auth::guard('api')->login($user);
            return response()->json(['data' =>  $user, 'token' => $token], 210);
        }
        $user = Employee::where('phone', $request->phone)->first();
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
        $user = Employee::findOrFail($request->id);
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
