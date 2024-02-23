<?php

namespace App\Http\Livewire\Programing;

use App\Models\ProgramingSearch;
use Botble\Blog\Models\Category;
use Botble\RealEstate\Models\Category as ModelsCategory;
use Livewire\Component;

class FiltrePrograming extends Component
{
    public $parametter = "";
    public $typeParametter="";
    public $categoryParametter="";
    public $cityParametter="";
    public $costParametter="";
    public $quantityParametter="";

    public function render()
    {
        $programings = null;
        $programinglimited = null;
        $categories = ModelsCategory::all();
        $programings = ProgramingSearch::orderBy('created_at', 'desc')->where("find",false)->take(5)->latest()->get();

        if($this->quantityParametter != ""){
            $programings = ProgramingSearch::orderBy('created_at', 'desc')->where("find",false)->get();
            if($this->quantityParametter < 100 ){
                $programinglimited = $programings->take($this->quantityParametter);
                $programings = $programinglimited;
                
            }
        }

        if($this->typeParametter != ""){
            $programinglimited = $programings->filter(function ($programing) {
                return stripos(strtolower($programing->type_name), strtolower($this->typeParametter)) !== false;
            });
            $programings = $programinglimited;
        }

        if($this->categoryParametter != ""){
            $programinglimited = $programings->filter(function ($programing) {
                return stripos(strtolower($programing->category_name), strtolower($this->categoryParametter)) !== false;
            });
            $programings = $programinglimited;
        }

        if($this->cityParametter !== ""){
            $programinglimited = $programings->filter(function ($programing) {
                return stripos(strtolower($programing->city_name), strtolower($this->cityParametter)) !== false;
            });
            $programings = $programinglimited;
        }

        if($this->costParametter != ""){
            $programinglimited = $programings->filter(function ($programing) {
                return $programing->min_price <= $this->costParametter && $this->costParametter <= $programing->max_price;
            });
            $programings = $programinglimited;
        }
        return view('livewire.programing.filtre-programing',compact("programings","categories"));
    }
}
