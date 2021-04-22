<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model {
	use SoftDeletes;
	protected $table = 'customer';


	public static function employeeCode(){
		$record = Customer::latest()->first();
		if(!$record){
			return 'EMP001';
		}else{
			$Id =$record->id + 1;
			return 'EMP00'.$Id;
		}
	}
}
