<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use DB;
use Validator;
use Auth;
use JWTAuth;
use Response;
use Log;
use Hash;

class ApiController extends Controller
{
    //

    public function login(Request $req){
		try{
			$credentials = $req->only('email','password');
			Log::info($req);
			$input = $req->all();
			$rules = [
				"email"=>"required",
				"password"=>"required"
			];
			$validation = Validator::make($input, $rules);
			if($validation->fails()){
				return response()->json(['status'=> 'fail','msg'=>'']);
			}			

			if($token = JWTAuth::attempt($credentials)){
				return response()->json(['status'=> true, 'token' => $token]);	
				Log::info('success');
			}else{
				Log::info('failure');
				return response()->json(['status'=>'failure']);
			}
		}	 
		catch(Exception $e){
			return response()->json(['status'=> 'fail','msg'=>'error in'.$e->getMessage()]);
		}
	}


	Public function getalluser(){
		try{
			$records = Customer::whereNUll('deleted_at')->select('fname','email')->get();
			return response()->json(['status'=>true,'data'=>$records]);
		}	 
		catch(Exception $e){
			return response()->json(['status'=> false,'msg'=>'error in'.$e->getMessage()]);
		}

	}


	public function logout(){

	 	auth()->logout();
        return response()->json(['success'=>true, 'message' => 'Successfully logged out']);
    }
}
