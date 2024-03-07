<?php

namespace App\Http\Controllers\programming;

use App\Http\Controllers\Api\propertiesController;
use App\Http\Controllers\Controller;
use App\Mail\agentMail;
use App\Mail\custumerMail;
use Illuminate\Http\Request;
use App\Models\ProgramingSearch;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Botble\Blog\Models\Category as ModelsCategory;
use Botble\Location\Models\City;
use Botble\RealEstate\Models\Property;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use LDAP\Result;

use function PHPSTORM_META\type;

class programingController extends Controller
{
    public function sendMailToCustumer($custumer_id){
        $message="go";
        // $custumer = Account::find($custumer_id);
        // $message = "Cher(e)".$custumer->first_name." ".$custumer->last_name;
        // $message = $message." "."Nous vous remercions chaleureusement pour avoir choisi [Rgi.imobilier] pour vos besoin de maison";
        // $message = $message." "."Nous sommes ravis de vous servir et de vous offrir une expérience exceptionnelle. Nous confirmons que nous avons bien reçu votre recherche programmée et que celle-ci est actuellement en cours de traitement.";
        return $message;
    }

    public function agentEmail(){
        $agent_email = Account::where("status",true)->pluck('email');
        return $agent_email;
    }

    public function propertyProgramingSave(Request $request) {

        $category_name = null;
        $success = true;
        if($request->custumer_id != null){
            $custumer = Account::find($request->custumer_id);
            if($custumer == null){
                return ["success"=>false,"error"=>"custumer not found"];
            }
        }
        if(($request->type == "rent" || $request->type == "sale") && ($request->custumer_id != null) ){
            
            $programing = [
                "custumer_id"           => $request->custumer_id,
                "type_name"             => $request->type,
                "city_name"             => $request->city,
                "min_price"             => $request->min_price,
                "max_price"             => $request->max_price,
                "number_bedroom"        => $request->bedroom,
                "number_bathroom"       => $request->bathroom,
                "number_floor"          => $request->floor,
                "city_id"               => $request->city_id,
                "category_id"           => $request->category_id,
                "keys"                  => $request->keys,
                "find"                  => false,
                "created_at"            => now(),
                "updated_at"            => now()
            ];
    
            $custumer = Account::find($request->custumer_id)->first();

            if(ProgramingSearch::insert($programing))
            {  
                $url = 'https://www.google.com';
                $headers = @get_headers($url);
                if ($headers && strpos($headers[0], '200')) {
                    Mail::to($custumer->email)->send(new custumerMail($custumer));
                }
                
                $emails = $this->agentEmail();
                $url = 'https://www.google.com';
                $headers = @get_headers($url);
                if ($headers && strpos($headers[0], '200')) {
                    foreach($emails as $email){
                        $user = Account::where("email",$email)->first();
                        Mail::to($email)->send(new agentMail($programing ,$category_name ,$user));
                        
                    }
                }
                Cache::forget("programing_data");
                return ["success"=> $success] ;
            }
            else{
                return ["success"=>false ,"error"=>"server error"] ;
            }
        }
        else{
            return ["success"=> false ,"error"=>"Données invalides"] ;
        }
    }

    public function projectProgramingSession(){
        $data = null;
        $category = null;
        $city = null;
        if(Cache::has('programing_data')){
            $data = Cache::get("programing_data");
            
            if(isset($data['category_id'])){
                if($data['category_id'] != null){
                    $category = Category::find($data["category_id" ]);
                }
            }

            if(isset($data['city_id'])){
                if($data['city_id'] != null){
                    $city = City::find($data["city_id"])->name;
                }
            }
        }
        return ["data"=>$data,"category"=>$category->name ,"city"=>$city];
    }

    public function projectProgramingSave(Request $request){
        return $request;
    }

    public function propertyProgramingSession(){

        $data = null;
        $city_name = null;
        $city_id = null;
        $category_id = null;
        $category_name = null;
        if(Cache::has('programing_data')){
            $data = Cache::get("programing_data");
            if(isset($data['category_id'])){
                if($data['category_id'] != null){
                    $category = Category::find($data["category_id" ]);
                }
                $category_name = $category->name;
                $category_id = $category->id;

            }
            if(isset($data['city_id'])){
                if($data['city_id'] != null){
                    $city = City::find($data["city_id" ]);
                }
                $city_name = $city->name;
                $city_id= $city->id;
            }

        }
        return ["data"=>$data,"category"=>$category_name ,"category_id"=>$category_id,"city"=>$city_name ,"city_id"=>$city_id];
    }

    public function programing_search_click() {
        $data = Cache::get("programing_data");
        return $data;
    }

}
