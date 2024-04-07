<?php

namespace App\Http\Livewire\Locality;

use App\Models\Locality;
use Botble\Location\Models\City;
use Botble\Location\Models\Country;
use Botble\Location\Models\State;
use Botble\Support\Http\Requests\Request;
use Livewire\Component;

class Create extends Component
{
    public $countries;
    public $states;
    public $cities;
    public $show_states;
    public $show_cities;
    public $show_localities;
    public $show_select_localities;
    public $country_id;
    public $state_id;
    public $city_id;
    public $nb_locality;
    public $locality_1="";
    public $locality_2="";
    public $locality_3="";
    public $locality_4="";
    public $locality_5="";
    public $localities = [];

    //show localities
    public $localities_list;
    public $get_number = 7;
    public $get_city_id = 1;
    public $locality="";
    public $locality_id=0;
    public $delete_id=0;
    public $show_locality = true;
    public $update_locality = false;
    public $create_locality = false;
    public $show_delete = false;

    public function mount(){
        $this->countries = Country::all();
        $this->show_states = false;
        $this->show_cities = false;
        $this->show_localities = false;
        $this->show_select_localities = false;
        $this->localities_list = Locality::where("city_id",1)->take($this->get_number)->get();
        $this->cities = City::all();
    }

    public function show_create(){
        $this->create_locality = true;
        $this->show_locality = false;
        $this->update_locality = false;
        $this->show_delete = false;

    }

    public function show_list(){
        $this->create_locality = false;
        $this->show_locality = true;
        $this->update_locality = false;
        $this->show_delete = false;
    }

    public function locality_updating($locality_id){
        if($locality_id != null){
            $this->create_locality = false;
            $this->show_locality = false;
            $this->update_locality = true;

            if(Locality::where('id',$locality_id)->exists()){
                $locality = Locality::find($locality_id);
                $this->locality = $locality->name; 
                $this->locality_id = $locality->id; 
            }
        }
    }

    public function locality_deleting($locality_id){
        $this->create_locality = false;
        $this->show_locality = false;
        $this->update_locality = false;
        $this->show_delete = true;
        $this->delete_id = $locality_id;
    }

    public function locality_delete($delete_id){
            if($delete_id != null){
                $delete = Locality::where('id',$delete_id)->delete();
                if($delete){
                    session()->flash("success","La localité a été supprimée avec succès");
                    $this->create_locality = false;
                    $this->show_locality = true;
                    $this->update_locality = false;
                    $this->show_delete = false;

                    $this->localities_list = Locality::where("city_id",1)->take($this->get_number)->get();
                }
                else{
                    session()->flash("error","Erreur : Suppression refusée.Coexion desactivée");
                }
            }
    }

    public function locality_back(){
        $this->show_locality = true;
        $this->update_locality = false;
        $this->create_locality = false;
        $this->show_delete = false;
    }

    public function locality_update_save(){
        if($this->locality_id != null){
            $locality = Locality::find($this->locality_id);
            $locality->name = $this->locality;
            $update = $locality->update();
            if($update){
                session()->flash("success","La modification a reussi avec succès");
                $this->create_locality = false;
                $this->show_locality = true;
                $this->update_locality = false;

                $this->localities_list = Locality::where("city_id",1)->take($this->get_number)->get();
                $this->cities = City::all();
            }
            else{
                session()->flash("error","Erreur : la modification a echouée");
            }
        }
        else{
            session()->flash("error","Erreur : Données invalides");
        }
        
    }


    public function nb_show(){
        $this->localities_list = Locality::where("city_id",$this->get_city_id)->take($this->get_number)->get();
    }

    public function get_locality(){
        $this->localities_list = Locality::where("city_id",$this->get_city_id)->take($this->get_number)->get();
    }

    public function states_list(){
        if($this->country_id != ""){
            if($this->states != null){
                $this->states = State::where('country_id',$this->country_id)->get();
                $this->show_states = true;
                $this->show_cities = true;
                $this->show_select_localities = true;

                if($this->nb_locality != null){
                    $this->show_localities = true;
                }
            }
            else{
                $this->states = State::where('country_id',$this->country_id)->get();
                $this->show_states = true;
            }
        }
        else{
            $this->show_states = false;
            $this->show_cities = false;
            $this->show_localities = false;
            $this->show_select_localities = false;
        }
    }

    public function cities_list(){
        if($this->state_id != ""){
            $this->cities = City::where('state_id',$this->state_id)->get();
            $this->show_cities = true;
            if($this->nb_locality != null){
                $this->show_localities = true;
            }
        }
        else{
            $this->show_cities = false;
            $this->show_localities = false;
            $this->show_select_localities = false;
        }
    }

    public function distric_list(){
        if($this->city_id != ""){
            $this->show_select_localities = true;
            if($this->nb_locality != null){
                $this->show_localities = true;
            }
        }
        else{
            $this->show_localities = false;
            $this->show_select_localities = false;
        }
    }

    public function locality_nb(){
        $this->show_localities = true;
    }

    public function save(){
        $response = false;
        $this->localities[1]=$this->locality_1;
        $this->localities[2]=$this->locality_2;
        $this->localities[3]=$this->locality_3;
        $this->localities[4]=$this->locality_4;
        $this->localities[5]=$this->locality_5;

        $locality = new Locality();
        if(count($this->localities) != 0){
            $save = false;
            foreach($this->localities as $locale){
                if($locale != null){
                    $save = true;
                }
            }
            if($save){
                foreach($this->localities as $locale){
                    if(!Locality::where("name",$locale)->where("city_id")->exists()){
                        if($locality != null){
                            $locality->name = $locale;
                            $locality->city_id = $this->city_id;
                            $response = $locality->save();
                        }
                    }
                }
                if($response){
                    session()->flash('success', 'Quartiers enregistrés avec succes');
                }
                else{
                    session()->flash('error', 'Echec : error de sauvegarde');
                }
            }
            else{
                session()->flash('error', 'Données invalides : Saisie de quartier invalide');
            }
        } 
    }

    public function render()
    {
        return view('livewire.locality.create');
    }
}
