<?php

namespace App\Http\Livewire\Realestate;

use App\Http\Controllers\fonction\Fonction;
use App\Mail\realestate\becomeAgentRefuzed;
use App\Mail\realEstateAgentConfirmedMail;
use Livewire\Component;
use App\Post;
use Botble\RealEstate\Models\Account;
use Mail;

class RealEstateAgentList extends Component
{
    public $user_id;
    public $get_user_id;
    public $accounts;
    public $show_user;
    public $account;
    public $request_refuzed = false;
    public $denied_motif = "";
    public $denied_user_id;

    public function accepte_request($id)
    {
        $user = Account::find($id);
        if($id != null) {
            $response = Account::where("id",$id)->update([
                "status"=>true,
                "credits"=>20,
            ]);
            session()->flash('message', 'passage a agent imobilier reussi avec succès');
            if($response){
                $url = 'https://www.google.com';
                $headers = @get_headers($url);
                if ($headers && strpos($headers[0], '200')){
                    Mail::to($user->email)->send(new realEstateAgentConfirmedMail($user));
                }
            }
            else{
                session()->flash('message', 'La validation a éte rejettée');
            }
        }  
      
    }

    public function refuzed_request($user_id){
        $this->request_refuzed = true;
        $this->denied_user_id = $user_id;
    }

    public function confirm_denied(){
        $update = Account::where('id',$this->denied_user_id)->update([
            'request_send'          =>false,
            'request_document'      =>"",
            'request_avatar'        =>"",
            'request_document_type' =>"",
            'request_date'          =>null,
            'status'                =>false
        ]);

        if($update){
            $this->request_refuzed = false;
            session()->flash('message', 'passage a agent imobilier rejeté avec succès');
            $user = Account::find($this->denied_user_id);
            if($user != null){
                $url = 'https://www.google.com';
                $headers = @get_headers($url);
                if ($headers && strpos($headers[0], '200')) {
                    Mail::to($user->email)->send(new becomeAgentRefuzed($this->denied_motif,$user));
                }
            }
        }
        $this->accounts = Account::where("request_send",true)->where("status","!=",true)->get();
    }

    public function show_account($id)
    {
        $this->account = Account::find($id);
        $this->show_user = true;
    }

    public function hide_account($id)
    {
        $this->show_user = false;
    }

    public function mount(){
        $this->show_user = false;
        $this->accounts = Account::where("request_send",true)->where("status","!=",true)->get();
    }

    public function becomeRealEstateAgentNotification($user){
        $url = 'https://www.google.com';
        $headers = @get_headers($url);
        $response = false;
        if ($headers && strpos($headers[0], '200')){
          $response =  Mail::to($user->email)->send(new realEstateAgentConfirmedMail($user));
        }
        return $response;
    }
    
    public function render()
    {       
        $this->accounts = Account::where("request_send",true)->where("status",false)->get();
        return view('livewire.realestate.real-estate-agent-list');
    }

    
}
