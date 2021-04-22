<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Validator;
use DB;
use Session;
use App\Models\user;
use App\Models\Customer;

class TaskController extends Controller
{
    //


    public function tasktest()
    {

    	DB::table('users')->insert(
    		['name'=>'john','user_type'=>'admin', 'email'=>'john@gmail.com','phone'=>'9876543200','code'=>'EMP001','password'=>Hash::make('pass1234')]
    	);
    	return 'ok';
    	return 'hai';
    }

    public function login()
    {
    	return view('login');
    }


    public function loginpost(Request $request)
    {
    	try {
    		$input = $request->all();
    		$rules = [
    			"username"=>"required",
    			"password"=>"required"
    		];
    		$validation = Validator::make($input, $rules);
    		if($validation->fails()){
    			return redirect()->back()->withErrors($validation)->with('validation', 'validation');
    		}

    		if(Auth::attempt(array('email' => $input['username'], 'password' => $input['password'],'status'=>'enabled'))){
    			return redirect()->route('homepage');    		
    		}else{
    			return redirect()->back()->with(['error' => 'Login Failed!, Check user name and password & Employee status']);
    		}
    	} catch (Exception $e) {
    		return redirect()->back()->with(['error' => $e->getMessage().' at Line '.$e->getLine()]);
    	}
    }


    public function homepage()
    {
        if (Auth::check()) {
            return view('welcome');
        }
        return redirect()->route('login');

    }


    public function customer(){
		$records = Customer::whereNull('deleted_at')->get();
		return view('customermanage')->with('records',$records);
	}

	public function addcustomer(){
        $data = Customer::employeeCode();
		return view('customeradd')->with('code',$data);
	}

	public function addcustomerpost(Request $request){
        try {
            $input = $request->all();
            $rules = [
                "name"=>"required",
                "phone"=>"required|integer|unique:users",
                "email"=>"required|unique:users",
                "code"=>"required|unique:users",
            ];
            $validation = Validator::make($input, $rules);
            if($validation->fails()){
                return redirect()->back()->withErrors($validation)->with('validation', 'validation');
            }
            DB::transaction(function () use ($input) {
        		$query = new Customer();
        		$query->name = $input['name'];
                $query->code = $input['code'];
                $query->email = $input['email'];
                $query->phone = $input['phone'];
                $query->status = $input['status'];
        		$query->save();

                //usertable

                $insert = new user();
                $insert->name = $input['name'];
                $insert->code = $input['code'];
                $insert->email = $input['email'];
                $insert->phone = $input['phone'];
                $insert->status = $input['status'];
                $insert->password = Hash::make('password');
                $insert->user_type = 'customer';
                $insert->customer_id = $query['id'];
                $insert->save();

            });
		 return redirect()->back()->with(['msg' => 'Customer Created successfully']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage().' at Line '.$e->getLine()]);
        }
	}


	public function deletecustomer(Request $req){
        try {
    		$id = $req["id"];
    		$company = Customer::find($id);
    		$company->delete();
            $check = User::where('customer_id',$id)->delete();
    		return response()->json(["status"=>'success']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage().' at Line '.$e->getLine()]);
        }
	}

	public function editcustomer($id){
		$query = Customer::where('id',$id)->first();
		return view('customeredit')->with('query',$query);
	}
	public function editcustomerpost(Request $request){
         try {
            $input = $request->all();
            $rules = [
                "name"=>"required",
                "code"=>"required",
                "mobile"=>"required",
                "email"=>"required"
                
            ];
            $validation = Validator::make($input, $rules);
            if($validation->fails()){
                return redirect()->back()->withErrors($validation)->with('validation', 'validation');
            }
            DB::transaction(function () use ($input) {
                $query = Customer::find($input['id']);
                $query->name = $input['name'];
                $query->code = $input['code'];
                $query->email = $input['email'];
                $query->phone = $input['mobile'];
                $query->status = $input['status'];
                $query->save();

                //usertable

                $checkUser = User::where('customer_id',$input['id'])->first();
                $insert =  user::find($checkUser['id']);
                $insert->name = $input['name'];
                $insert->code = $input['code'];
                $insert->email = $input['email'];
                $insert->phone = $input['mobile'];
                $insert->status = $input['status'];
                $insert->save();

            });
         return redirect()->back()->with(['msg' => 'Customer Updated successfully']);
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage().' at Line '.$e->getLine()]);
        }

	}



    public function logout()
    {
      Auth::logout();
      Session::flush();
      return redirect()->route('login');
    }
}
