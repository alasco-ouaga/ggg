<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Auth;
use Botble\Media\Models\MediaFile;
use Botble\RealEstate\Models\Account;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat\Wizard\Accounting;

class accountController extends Controller
{
    //Creation de compte agent ou client
    public function create(Request $request)
    {
        if(Account::where("username",$request->username)->exists()){
            return ["success"=>false,"account"=>null,"userNameExist"=>true,"emailExist"=>false];
        }
        if(Account::where("email",$request->email)->exists()){
            return ["success"=>false,"account"=>null,"userNameExist"=>false,"emailExist"=>true];
        }

        
        $account = [
            'first_name'        =>$request->first_name,
            'last_name'         =>$request->last_name,
            'username'          =>$request->username,
            'email'             =>$request->email,
            'country_id'        =>$request->country_id,
            'state_id'          =>$request->state_id,
            'city_id'           =>$request->city_id,
            'phone'             =>$request->phone,
            'password'          =>Hash::make($request->password),
            'status'            =>false,
            'created_at'        =>now(),
            'updated_at'        =>now(),
            'confirmed_at'      =>now(),
        ];

        if (Account::insert($account)){
            $account = Account::where("email",$request->email)->first(); 
            return ["Success"=>true,"account"=>$account];
        }

        return ["success"=>false,"account"=>null,"userNameExist"=>false,"emailExist"=>false];
    }

    //Obtenir les informations d'un compte
    public function account($account_id)
    {
        if($account_id != null){
            $account = Account::find($account_id);
            return ["success"=>true,"account"=>$account];
        }
        return ["success"=>false,"account"=>null];
    }

    //Modification d'un compte agent ou client
    public function update(Request $request)
    {
        //verification de l'email 
        if(Account::where("email",$request->email)->exists()){
            return ["success"=>false,"emailExist"=>true,"account"=>null];
        }

        //Forcage en boolean
        $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);

        //Modification
        $update = Account::where("id",$request->account_id)->update([
                    'first_name'        =>$request->first_name,
                    'last_name'         =>$request->last_name,
                    'username'          =>$request->username,
                    'email'             =>$request->email,
                    'country_id'        =>$request->country_id,
                    'state_id'          =>$request->state_id,
                    'city_id'           =>$request->city_id,
                    'phone'             =>$request->phone,
                    'password'          =>Hash::make($request->password),
                    'status'            =>$status,
                ]);

        if ($update){
            $account = Account::find($request->account_id); 
            return ["Success"=>true,"account"=>$account];
        }

        return ["success"=>false,"emailExist"=>false,"account"=>null];
    }

    //Verification de la validité des informations d'un compte
    public function login(Request $request)
    {
        if(Account::where("username",$request->identifier)->orWhere("email",$request->identifier)->exists()){
            $account = Account::where("username",$request->identifier)->orWhere("email",$request->identifier)->first();
            if(Hash::check($request->password , $account->password)){
                return ["success"=>true,"account"=>$account];
            }
        }

        return ["success"=>false,"account"=>null];        
    }

    public function simpleAccountList(){
        $accounts = Account::where("request_send",true)->where("status",false)->get();
        return $accounts;
    }
}
