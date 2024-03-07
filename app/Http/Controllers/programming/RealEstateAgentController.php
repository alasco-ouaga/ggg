<?php

namespace App\Http\Controllers\programming;

use App\Http\Controllers\Controller;
use App\Mail\becomeAgentMail;
use Botble\RealEstate\Models\Account;
use Carbon\Carbon;
use Doctrine\DBAL\Types\JsonType;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Http;

class RealEstateAgentController extends Controller
{
    //Enregistrement de l'image manage par intervension
    public function saveImageFile($image,$image_name,$user_last_name){
        $image_path = null;
        $save_path = "accounts/".$user_last_name."/";
        $image_path = $image->storeAs($save_path, $image_name);
        return str_replace('//', '/', $image_path);
    }


    //Recuperation du nom de l'image
    public function  imageName($image){
        $image_name = pathinfo($image,PATHINFO_FILENAME);
        $image_extension = $image->getClientOriginalExtension();
        $image_new_name = $image_name.'_'.time().'.'.$image_extension;
        return $image_new_name;
    }

    public function saveImageInToStorage($image,$user_last_name) {
        $image_name = $this->imageName($image);
        return $image_name;
        $image_save_path = $this->saveImageFile($image,$image_name,$user_last_name);

        return $image_save_path;
    }
    
    public function sendNotificationToCustumer($user){
        $url = 'https://www.google.com';
        $headers = @get_headers($url);
        if ($headers && strpos($headers[0], '200')) {
            Mail::to($user->email)->send(new becomeAgentMail($user));
        }
        return true;
    }

    public function save_become_Agent_data(Request $request){

        $avatar_path ="";
        $response = false;
        $document_file_path ="";
        if($request->user_id != null){
            
            $user = Account::find($request->user_id);
            
            //enregistrer image du document cnib
            if($request->hasFile("document_file")){
                $image = $request->file("document_file");
                $document_file_path = $this->saveImageInToStorage($image, $user->last_name);
            }

            
            //enregistrer image d'une photo d'identité 
            if($request->hasFile("avatar_file")){
                $image = $request->file("avatar_file");
                $avatar_path = $this->saveImageInToStorage($image , $user->last_name);
            }


            //Mise a jour dans la base de données
            $response = Account::find($request->user_id)->update(
                [
                    'request_send'          =>true,
                    'request_document'      =>$document_file_path,
                    'request_avatar'        =>$avatar_path,
                    'request_document_type' =>$request->document_type,
                    'request_date'          =>Carbon::now()
                ]
            );


            //Envoie du mail au client pour le traitement de sa demande
            if($response){
                if($user != null){
                    $url = 'https://www.google.com';
                    $headers = @get_headers($url);
                    if ($headers && strpos($headers[0], '200')) {
                        Mail::to($user->email)->send(new becomeAgentMail($user));
                        $response = true;
                    }
                }
                $response = true;
            }
        }

        return $response;
    }

    public function FunctionName() {
        return "test";
    }

    public function become_real_state_agent_data_test(){
        return "yes";
    }
}
