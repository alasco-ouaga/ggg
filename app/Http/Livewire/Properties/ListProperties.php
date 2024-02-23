<?php

namespace App\Http\Livewire\Properties;

use Botble\RealEstate\Models\Property;
use Livewire\Component;

class ListProperties extends Component
{
    public $properties;
    public $propertiescopied;
    public $propertiesid=[];
    public $type="";
    public $locality="";
    public $price=0;
    public $parametter="";
    public $listing=0;

    public function mount(){
        $this->properties = Property::whereIn('id', $this->propertiesid)->get();
        $this->propertiescopied =  $this->properties;
    }

    public function get_properties(){
        $first_properties = $this->properties->filter(function ($property) {
            return (
                stripos(strtolower($property->status), strtolower($this->type)) !== false || 
                stripos(strtolower($property->city->name), strtolower($this->locality)) !== false
            );
        });

        $this->properties = $first_properties;

        if($this->price != ""){
            $second_properties = $first_properties->filter(function ($property) {
                return (
                    ((($this->price) >= $property->price-5000) !== false && 
                    (($this->price) <= $property->price+5000) !== false )
                );
            });
            $this->properties = $second_properties;
        }

        if($this->parametter != ""){
            $third_properties = $second_properties->filter(function ($property) {
                return (
                    stripos(strtolower($property->name), strtolower($this->parametter)) !== false || 
                    stripos(strtolower($property->description), strtolower($this->parametter)) !== false ||
                    stripos(strtolower($property->content), strtolower($this->parametter)) !== false
                );
            });
            $this->properties = $third_properties;
        }
    }

    public function render()
    {
        $this->properties = $this->propertiescopied;
        
        if($this->listing != 0){
            $this->properties = Property::take($this->listing)->latest()->get();
            $this->propertiescopied =  $this->properties;
        }

        if($this->type != ""){
            $properties = $this->properties->filter(function ($property) {
                return stripos(strtolower($property->status), strtolower($this->type)) !== false;
            });
            $this->properties = $properties;
        }
        else{
            $this->properties = $this->propertiescopied;
        }

        if($this->locality != ""){
            $properties = $this->properties->filter(function ($property) {
                return stripos(strtolower($property->city->name), strtolower($this->locality)) !== false;
            });
            $this->properties = $properties;
        }

        if($this->parametter != ""){
            $properties =  $this->properties->filter(function ($property) {
                return (
                    stripos(strtolower($property->name), strtolower($this->parametter)) !== false || 
                    stripos(strtolower($property->description), strtolower($this->parametter)) !== false ||
                    stripos(strtolower($property->content), strtolower($this->parametter)) !== false
                );
            });

            if($properties == null){
                $properties = $this->properties->filter(function ($property) {
                    return (
                        ((($this->price) >= $property->price-5000) !== false && 
                        (($this->price) <= $property->price+5000) !== false )
                    );
                });
            }

            $this->properties = $properties;
        }

        return view('livewire.properties.list-properties');
    }
}
