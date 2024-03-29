<?php

namespace App\Http\Livewire\Locality;

use Botble\Location\Models\City;
use Botble\Location\Models\Country;
use Botble\Location\Models\State;
use Livewire\Component;

class Create extends Component
{
    public $countries;
    public $states;
    public $cities;
    public $show_states;
    public $show_cities;
    public $show_localities;
    public $country_id;
    public $state_id;
    public $city_id;
    public $nb_locality;

    public function mount(){
        $this->countries = Country::all();
        $this->show_states = false;
        $this->show_cities = false;
        $this->show_cities = false;
    }

    public function states_list(){
        $states = State::where('country_id',$this->country_id)->get();
        $this->states = $states;
        $this->show_states = true;
    }

    public function cities_list(){
        $cities = City::where('state_id',$this->state_id)->get();
        $this->cities = $cities;
        $this->show_cities = true;
        $this->show_localities = true;
    }

    public function locality_nb(){
        
    }

    public function render()
    {
        return view('livewire.locality.create');
    }
}
