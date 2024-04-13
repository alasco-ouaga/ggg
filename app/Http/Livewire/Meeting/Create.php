<?php

namespace App\Http\Livewire\Meeting;

use App\Models\Meeting;
use Livewire\Component;

class Create extends Component
{

    public $tool = "";
    public $link = "";
    public $date = "";
    public $time = "";
    public $mode = "";
    public $motif = "";
    public $locality = "";
    public $comment = "";
    public $agent_last_name = "";
    public $agent_first_name = "";
    public $agent;

    public $account_id = 0;
    public $property_id = 0;

    public $show_online = false;
    public $show_btn = true;
    public $show_meeting = true;

    public function mount(){
        $user = auth('account')->user();  
        if($user != null){
            $this->account_id = $user->id;
        }
        $this->motif = "Visite, Inspection technique et échanges";

        $meeting = Meeting::where("property_id",$this->property_id)->where("account_id",$this->account_id)->first();
        if($meeting != null){
            $this->show_meeting = false;
        }
    }

    public function get_mode(){
        if($this->mode != ""){
            if($this->mode == "online" ){
                $this->show_online = true;
            }
            if($this->mode == "presential" ){
                $this->show_online = false;
            }
        }
    }

    public function save(){
        if($this->account_id != 0 && $this->property_id != 0 && $this->agent != null){
            $meeting = new Meeting();
            $meeting->account_id = $this->account_id;

            $meeting->agent_id = $this->agent->id;
            $meeting->agent_first_name = $this->agent->first_name;
            $meeting->agent_last_name = $this->agent->last_name;

            $meeting->motif = $this->motif;
            $meeting->mode = $this->mode;
            $meeting->tool = $this->tool;
            $meeting->link = $this->link;
            $meeting->date = $this->date;
            $meeting->time = $this->time;
            $meeting->property_id = $this->property_id;
            $meeting->comment = $this->comment;
            $meeting->locality = $this->locality;

            $save = $meeting->save();
            if($save){
                $this->show_meeting = false;
                session()->flash("success","la rencontre a été enregistrée avec succès");
            }
        }
        else{
            session()->flash("error","Erreur : données invalides");
        }
    }

    public function render()
    {
        if($this->motif == "" || $this->date == "" || $this->time == "" || $this->locality == "" ||($this->show_online == true && $this->link == "")){
            $this->show_btn = false ;
        }
        else{
            $this->show_btn = true ;
        }

        return view('livewire.meeting.create');
    }
}
