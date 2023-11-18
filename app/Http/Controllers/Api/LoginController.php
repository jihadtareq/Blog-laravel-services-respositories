<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Services\LoginService;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{

    public function login(LoginRequest $request,LoginService $loginService,UserService $userService)
    {
        try {
            $user = $loginService->getToken($request->all());
            $userService-reactivateAccount($user);

            return response()->json(['message'=>'success','data'=>$user],200);
            
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],500);

        }
        
    }
    
}
