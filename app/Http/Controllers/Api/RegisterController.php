<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\RegisterService;
use App\Http\Requests\RegisterRequest;
class RegisterController extends Controller
{
    public function register(RegisterRequest $registerRequest,RegisterService $registerService)
    {
        try {
            $user = $registerService->createUser($registerRequest->all());

            return response()->json(['message'=>'success','data'=>$user],config('constants.OK'));
            
        } catch (\Throwable $th) {
            // throw $th;
            return response()->json(['message'=>'failed','error'=>$th->getMessage()],config('constants.INTERNAL_SERVER_ERROR'));
        }
        
    }

}
