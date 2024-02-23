<?php

namespace App\Http\Livewire\Visibility;

use Botble\Menu\Models\MenuNode;
use Livewire\Component;

class FooterVisibility extends Component
{
    public $menuParametter="";

    public function Activate($id){
        if(MenuNode::find($id)){
            MenuNode::where('id',$id)->update([
                "display"=>"yes",
            ]);
        }
        session()->flash('on_message', 'Activation reussie avec succès');
    }

    public function Disabled($id){
        if(MenuNode::find($id)){
            MenuNode::where('id',$id)->update([
                "display"=>"no",
            ]);
        }
        session()->flash('off_message', 'Desactivation reussie avec succès');
    }
    public function render()
    {
        $menus = MenuNode::where("menu_id","!=",1)->get();
        return view('livewire.visibility.footer-visibility',compact("menus"));
    }
}
