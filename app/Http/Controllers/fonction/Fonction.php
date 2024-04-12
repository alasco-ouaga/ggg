<?php

namespace App\Http\Controllers\fonction;

use App\Http\Controllers\Controller;
use App\Mail\retourMail;
use App\Models\ProgramingSearch;
use Botble\Location\Models\City;
use Botble\RealEstate\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;
use Botble\Menu\Models\MenuNode;
use Botble\RealEstate\Models\Category;
use PhpOffice\PhpSpreadsheet\Calculation\Logical\Boolean;
use Intervention\Image\Facades\Image;

class Fonction extends Controller
{
    public function getProjectMenu(){
        $menu = MenuNode::find(1);
        return $menu;
    }

    public function getPropertyMenu(){
        $menu = MenuNode::find(2);
        return $menu;
    }

    public function userMail($user_id){
        $email = Account::find($user_id)->email;
        return $email;
    }

    public function compareType($programing_type_name , $property_type){
        if( strcmp(strtolower($programing_type_name), strtolower($property_type)) == 0){
            return true ;
        }
        return false ;
    }

    public function compareCity($city_id , $property_city_id){

        if($city_id != null && $property_city_id != null){
            if(($city_id == $property_city_id) ){
                return true ;
            }
            else{
                return false;
            }
        }
        return true;
    }

    public function compareLocality($programing_locality_id , $property_locality_id){

        if($programing_locality_id != null && $property_locality_id != null){
            if(($programing_locality_id == $property_locality_id) ){
                return true ;
            }
            else{
                return false;
            }
        }
        return true;
    }

    public function comparePrice($programing_min_price ,$programing_max_price , $property_price){
        if(
            ($property_price >= $programing_min_price) ||
            ($property_price <= $programing_max_price) ||
            ($programing_min_price <= $property_price && $property_price <= $programing_max_price)
        ) {return true ; }

        return false ;
    }

    public function compareBedroom($programing_bedroom , $property_bedroom){
        if(strcmp($programing_bedroom,  $property_bedroom) ===0 )
        { 
            return true ; 
        }
        return false ;
    }

    public function compareBathroom($programing_bathroom , $property_bathroom){
        if($programing_bathroom == $property_bathroom )
        { 
            return true ; 
        }
        return false ;
    }
    
    public function compareFloor($programing_floor , $property_floor){
        if($programing_floor == $property_floor)
        { 
            return true ; 
        }
        return false ;
    }

    public function getCategorieName($category_id) {
        $name = null;
        if($category_id != null){
            $name = Category::find($category_id)->name;
        }
        return $name;
    }

    public function compareCategory($programing , $property_category_multi_id){

        if($programing->category_id != null){
            foreach($property_category_multi_id as $property_category_id){
                if($programing->category_id == $property_category_id){
                    return true;
                }
            }
            return false;
        }
        return true ;
    }

    public  function getPropertyLink($identifier){
        $link = "properties/".$identifier;
        $path = asset($link);
        return  $path;
    }

    public function find_programing($type,$city_id,$locality_id,$categories,$price,$number_bedroom,$number_bathroom,$number_floor) {
        //Get all programing search
        $programings = ProgramingSearch::all();
        $i = 0; $programingMails = [];

        //Verification de l'existence 
        foreach($programings as $programing){
            if(
                $this->compareType($programing->type , $type) &&
                $this->compareCategory($programing , $categories) &&
                $this->compareCity($programing->city_id , $locality_id)&&
                $this->compareCity($programing->locality_id , $city_id)&&
                $this->comparePrice($programing->min_price,$programing->max_price , $price ) &&
                $this->compareBedroom($programing->number_bedroom , $number_bedroom) &&
                $this->compareBathroom($programing->number_bathroom , $number_bathroom) && 
                $this->compareFloor($programing->number_floor , $number_floor)
             )
             {
                if($programing->id != null){
                    ProgramingSearch::where('id',$programing->id)->update([
                        "found"=>true,
                    ]);
                }
               
                $programingMails[$i] = $this->userMail($programing->account_id);
             }
        }
        return $programingMails;
    }

    public function getProgramingData($type_name,$city_id,$categories,$price,$number_bedroom,$number_bathroom,$number_floor){
        
        $city_name =null;
        if($city_id !=null){
            $city_name = City::find($city_id)->name;
        }
        
        $programing = [
            "type_name"             => $type_name,
            "city_name"             => $city_name,
            "category_id"           => $categories,
            "price"                 => $price,
            "number_bedroom"        => $number_bedroom,
            "number_bathroom"       => $number_bathroom,
            "number_floor"          => $number_floor,
            "created_at"            => now(),
            "updated_at"            => now()
        ];

        return $programing;

    }
    public function sendMailToCustumer($programingMail , $link){
        $url = 'https://www.google.com';
        $headers = @get_headers($url);
        if ($headers && strpos($headers[0], '200')) {
            foreach($programingMail as $mail){
                $custumer = Account::where("email",$mail)->first();
                Mail::to($mail)->send(new retourMail($link , $custumer));
            }
        }
    }

    //count le nombre de recherche programmée
    public function countPropgramingSearch(){
        $count = ProgramingSearch::count();
        return $count;
    }

    //La liste de recherche programmé
    public function ProgramingList(){
        $programings = ProgramingSearch::where("find",false)->latest()->get();
        return $programings;
    }

    /* ---------------gestion et management des images---------- */
    /* ---------------gestion et management des images---------- */


    //Recuperation du nom de l'image
    public function  imageName($image){
         $image_name = pathinfo($image,PATHINFO_FILENAME);
         $image_extension = $image->getClientOriginalExtension();
         $image_new_name = $image_name.'_'.time().'.'.$image_extension;
         return $image_new_name;
    }

    //Recuperation du nom de l'image
    public function  imageName150x150($image_name){
        $name_and_extension = pathinfo($image_name);
        $file_name = $name_and_extension['filename'];
        $file_name150x150 =  $file_name."-150x150".".".$name_and_extension['extension'];
        return $file_name150x150;
    }

    //Recuperation du nom de l'image image410x210
    public function  imageName410x270($image_name){
        $name_and_extension = pathinfo($image_name);
        $file_name = $name_and_extension['filename'];
        $file_name410x270 =  $file_name."-410x270".".".$name_and_extension['extension'];
        return $file_name410x270;
    }

     //Image de format 150x150
     public function interventionManageImage150x150($path){
        $format150x150 = Image::make($path)->resize(150, 150);
        return $format150x150;
    }

    //Image de format 150x150
    public function interventionManageImage410x270($path){
        $format410x270 = Image::make($path)->resize(410, 270);
        return $format410x270;
    }

    //Enregistrement de l'image originale
    public function saveImageFile($user_last_name , $image_file , $image_name){
        $image_path = null;
        $save_path = "accounts/".$user_last_name."/";
        $image_path = $image_file->storeAs($save_path, $image_name);
        return str_replace('//', '/', $image_path);
    }

    //Enregistrement de l'image manage par intervension
        public function saveInterventionImageFile($image,$name,$user_last_name){
        $image_save_path = null;
        $image_save_path = public_path("/storage/accounts/".$user_last_name."/".$name);
        $image->save($image_save_path);
        return $image_save_path;
    }

    // fonction pour stocquer une ou plusieur image
    public function saveImageInToStorage($images,$user_id) {
        $user_last_name = Account::find($user_id)->last_name;
        $error = false;
        $image_paths = [];

        foreach($images as $image){
            //Enregsitrement de l'image originale
            $image_name = $this->imageName($image);
            $image_save_path = $this->saveImageFile( $user_last_name , $image , $image_name ,  );
            $image_paths[] = $image_save_path;

            //Recuperation de path depuis la racine de Laravel : Ensuite on formate le lien
            $image_public_path = public_path("storage/".$image_save_path);
            $intervension_manage_path = str_replace('\\', '/', $image_public_path);

            //Decoupage de l'image.On cree le nom et on decoupe l'image au taille voulue : Ensuite on passe a l'enregistrement
            $image_name150x150 = $this->imageName150x150($image_name);
            $imageFile150x150 = $this->interventionManageImage150x150($intervension_manage_path);
            $image_150x150_path = $this->saveInterventionImageFile( $imageFile150x150 , $image_name150x150 , $user_last_name);

            //Decoupage de l'image.On cree le nom et on decoupe l'image au taille voulue : Ensuite on passe a l'enregistrement
            $image_name410x270 = $this->imageName410x270($image_name);
            $imageFile410x270 = $this->interventionManageImage410x270($intervension_manage_path);
            $image_410x270_path = $this->saveInterventionImageFile( $imageFile410x270 , $image_name410x270 , $user_last_name);

            if($image_save_path == null || $image_150x150_path == null || $image_410x270_path == null){
                $error = true;
                break;
            }
        }   
        return $image_paths;
    }
}
