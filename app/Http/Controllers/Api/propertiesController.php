<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\fonction\Fonction;
use App\Models\Locality;
use Botble\Blog\Models\Category;
use Botble\Location\Models\City;
use Botble\Location\Models\Country;
use Botble\Location\Models\State;
use Botble\RealEstate\Models\Account;
use Botble\RealEstate\Models\Category as ModelsCategory;
use Botble\RealEstate\Models\Property;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class propertiesController extends Controller
{
    public function create(Request $request){
        // return count($request->file("images"));

        if($request->hasFile('images') && $request->moderation_status != null && $request->period != null && $request->name != null && $request->type != null  && $request->description != null && $request->country_id != null && $request->state_id != null && $request->city_id != null ){
            if ($request->hasFile('images')) {
                $images=array();
                foreach ($request->file("images") as $image) {
                    $images[]=$image;
                }
                $save_image = new Fonction();
                $image_path = $save_image->saveImageInToStorage($images , $request->user_id);
                $tableauAssoc = [];
                foreach ($image_path as $index => $element) {
                    $tableauAssoc[$index + 1] = $element;
                }
                $images_path = json_encode($tableauAssoc);
            } 

            $expire_date = Carbon::now()->addMonth()->format('Y-m-d');
            $property = [
                'name'              => $request->name,
                'type'              => $request->type,
                'description'       => $request->description,
                'content'           => $request->content,
                'location'          => $request->location,
                'images'            => $images_path, 
                'number_bedroom'    => $request->number_bedroom,
                'number_bathroom'   => $request->number_bathroom,
                'number_floor'      => $request->number_floor,
                'square'            => $request->square,
                'price'             => $request->price,
                'status'            => $request->status,
                'latitude'          => $request->latitude,
                'longitude'         => $request->longitude,
                'city_id'           => $request->city_id,
                'state_id'          => $request->state_id,
                'author_id'         => $request->author_id,
                'country_id'        => $request->country_id,
                'period'            => $request->period,
                'expire_date'       => $expire_date,
                'author_type'       => Account::class,
                'moderation_status' => "rejected",
                'never_expired'     => false,
                'auto_renew'        => false,
                'currency_id'       => 1,
                'created_at'        => now(),
                'updated_at'        => now(),
            ];
    
            if(Property::insert($property)){
                return ["success"=>true];
            }
            else{
                return ["success"=>false,"error"=>"file is null"];
            }
        }
        else{
            return ["success"=>false,"error"=>"some data are null"];
        }
    }

    //Recuperation des bon liens
    public function imageLink($images){
        $u=0;
        foreach($images as $image_link){
            $Link = "/storage"."/".$image_link;
            $image_links[$u] = asset($Link);
            $u++;
        }
        return $image_links;
    }

    public function image_150x150($imageName,$imagePath){
        // La chaîne que vous souhaitez ajouter avant l'extension
        $prefix = '-150x150';

        // Utilisez pathinfo pour extraire l'extension
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);

        // Construisez le nouveau nom de fichier avec le préfixe ajouté
        $newFileName = pathinfo($imageName, PATHINFO_FILENAME) . $prefix . '.' . $extension;

        //reconstitution du chemin normal :
        $imageLink = $imagePath.$newFileName;

        return $imageLink;
    }

    public function image_410x270($imageName,$imagePath){
        $prefix = '-410x270';
        $extension = pathinfo($imageName, PATHINFO_EXTENSION);
        $newFileName = pathinfo($imageName, PATHINFO_FILENAME) . $prefix . '.' . $extension;
        $imageLink = $imagePath.$newFileName;
        return $imageLink;
    }

    //Suppression des images
    public function deleteImage($imagePath){
        $success = true;
        $i = 0 ; $image = [];
        foreach($imagePath as $path){
            $delete = Storage::delete($path);

            $image_name = basename($path);
            $image_path = dirname($path);
            $image_link =  $image_path."/";

            $imagePath1 = $this->image_150x150($image_name,$image_link);
            $delete = Storage::delete($imagePath1);

            $imagePath2 = $this->image_410x270($image_name,$image_link);
            $delete = Storage::delete($imagePath2);

            if(!$delete){
                $success = false;
            };
        }
        return $success ;
    }

    //Suppression d'une propreité
    public function delete($property_id){
        if($property_id != null){
            $property = Property::find($property_id);
            $this->deleteImage($this->imageLink($property->images));
            $property->delete();
            return ["found"=>true,"success"=>true];
        }
        return ["found"=>false,"success"=>false];
    }

    public function propertyTable($properties){
        $i=0;
        $table = [];
        if(count($properties) != 0){
            foreach($properties as $property){

                // Convertissez la chaîne en objet DateTime
                $dateTime = new DateTime($property->created_at);
                $image_links = $this->imageLink($property->images);
                $table[$i]=[
                    "id"                    =>$property->id,
                    "name"                  =>$property->name,
                    "description"           =>$property->description,
                    "location"              =>$property->location,
                    "number_bedroom"        =>$property->number_bedroom,
                    "number_bathroom"       =>$property->number_bathroom,
                    "number_floor"          =>$property->number_floor,
                    "square"                =>$property->square,
                    "price"                 =>$property->price,
                    "period"                =>$property->period,
                    "status"                =>$property->status,
                    "moderation_status"     =>$property->moderation_status,
                    "auto_renew"            =>$property->auto_renew,
                    "never_expired"         =>$property->never_expired,
                    "currency_name"         =>$property->currency->title,
                    "country_name"          =>$property->country->name,
                    "state_name"            =>$property->state->name,
                    "city_name"             =>$property->city->name,
                    "image_link"            => $image_links,
                    "created_at"            =>$dateTime->format('Y-m-d H:i:s'),
                ];
                $i++;
            }
        }
        return $table;
    }

    //Recuperation des biens imobilier d'un agent
    public function account_properties($account_id)
    {
        if(Account::find($account_id)){
            $account = Account::find($account_id);
            $properties = Property::where("author_id",$account_id)->get();
            $properties_table = $this ->propertyTable($properties);
            return ["found"=>true,"quantity"=>count($properties),"properties"=>$properties_table];
        }
        return ["found"=>false,"properties"=>null];

    }

    //Recuperation des biens imobiliers de tout agent 
    public function properties($maximum)
    {
        $properties = Property::latest()->take($maximum)->get();
        $properties_table = $this ->propertyTable($properties);
        return ["found"=>true,"quantity"=>count($properties_table),"properties"=>$properties_table];
    }

    //Recuperation des informations d'une seule propertier
    public function PropertyData($property_id){
        if($property_id != null){
            if(Property::where("id",$property_id)->exists()){
                $property = Property::find($property_id);
                $properties[0] =  $property;
                $properties_table = $this ->propertyTable($properties);
                return ["found"=>true,"property"=>$properties_table];
            }
        }
        return ["found"=>false,"property"=>null];
    }

    public function propertiesFilter(Request $request ){
        if($request->type != null && $request->type != ""){
            $response=true;
            $properties = Property::where("moderation_status","approved")->get();
            $properties = $properties->filter(function ($property)  use ($request) {
                return (
                    stripos($property->name,  $request->key) !== false || 
                    stripos($property->location,  $request->key) !== false || 
                    stripos($property->description,  $request->key) !== false ||
                    stripos($property->content,  $request->key) !== false
                );
            });
            if($request->type != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return stripos($property->type, $request->type) !== false;
                });
            }
            if($request->city_id != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return stripos($property->city_id, $request->city_id) !== false;
                });
            }
            if($request->bedroom != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return stripos($property->number_bedroom, $request->bedroom) !== false;
                });
            }
            if($request->bathroom != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return stripos($property->number_bathroom, $request->bathroom) !== false;
                });
            }
            if($request->floor != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return stripos($property->number_floor, $request->floor) !== false;
                });
            }
            if($request->min_price != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return $property->price >= $request->min_price;
                });
            }
            if($request->max_price != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return $property->price <= $request->max_price;
                });
            }
            if($request->square != null){
                $properties = $properties->filter(function ($property)  use ($request) {
                    return stripos($property->square, $request->square) !== false;
                });
            }

            $nbproperties = 0;
            if($properties != null){
                $nbproperties = count($properties);
                $property = new propertiesController();
                $properties = $property->propertyTable($properties);
            }
            return ["success"=>$response,"quantity"=>$nbproperties,"properties"=>$properties] ;

        }
        else{
            $response = false;
            $properties = null;
            return ["success"=>$response,"properties"=>$properties] ;

        }
    }

    public function property_creating_data() {
        $allcountries = Country::get();
        $allstate = State::get();
        $allcities = City::get();
        $allcategories = ModelsCategory::get();
        $countries = array();
        $states = array();
        $cities = array();
        $categories = array();
        foreach($allcountries as $country){
            $data = [
                "id"=>$country->id,
                "name"=>$country->name,
            ];
            $countries[]=$data;
        }

        foreach($allstate as $state){
            $data = [
                "id"=>$state->id,
                "country_id"=>$state->country_id,
                "name"=>$state->name,
            ];
            $states[]=$data;
        }

        foreach($allcities as $city){
            $data = [
                "id"=>$city->id,
                "state_id"=>$city->state_id,
                "name"=>$city->name,
            ];
            $cities[]=$data;
        }

        foreach($allcategories as $category){
            $cat = [
                "id"=>$category->id,
                "name"=>$category->name,
            ];
            $categories[]=$cat;
        }
        return ["countries"=>$countries,"states"=>$states,"cities"=>$cities,"categories"=>$categories];
    }

    public function get_countries(){
        $allcountries = Country::get();
        if(count($allcountries) != 0){
            $countries = array();
            foreach($allcountries as $country){
                $data = [
                    "id"=>$country->id,
                    "name"=>$country->name,
                ];
                $countries[]=$data;
            }
            return ["success"=>true,"total"=>count($countries),"countries"=>$countries];
        }
        return ["success"=>true,"total"=>0,"countries"=>null];
       
    }

    public function get_states($country_id){
        if($country_id != null){
            if(Country::where("id",$country_id)->exists()){
                $allstate = State::get();
                $states = array();
                foreach($allstate as $state){
                    $data = [
                        "id"=>$state->id,
                        "country_id"=>$state->country_id,
                        "name"=>$state->name,
                    ];
                    $states[]=$data;
                }
                return ["success"=>true,"total"=>count($states),"states"=>$states];
            }
            return ["success"=>false,"total"=>0,"states"=>null];
        }
       
    }

    public function get_cities($state_id){
        if($state_id != null){
            if(State::where("id",$state_id)->exists()){
                $allcities = City::get();
                $cities = array();
                foreach($allcities as $city){
                    $data = [
                        "id"=>$city->id,
                        "state_id"=>$city->state_id,
                        "name"=>$city->name,
                    ];
                    $cities[]=$data;
                }
                return ["success"=>true,"total"=>count($cities),"cities"=>$cities];
            }
        }
        return ["success"=>false,"total"=>0,"cities"=>null];
    }

    public function get_categories(){
        $allcategories = ModelsCategory::get();
        $categories = array();
        foreach($allcategories as $category){
            $data = [
                "id"=>$category->id,
                "name"=>$category->name,
            ];
            $categories[]=$data;
        }

        return ["success"=>true,"total"=>count($categories),"categories"=>$categories];
    }

    public function get_city_id($city_id){
        $localities = null;
        if($city_id != null){
            $localities = Locality::where('city_id',$city_id)->get();
        }
        return ["localities"=>$localities];
    }
}
