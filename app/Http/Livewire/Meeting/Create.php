<?php

namespace App\Http\Livewire\Meeting;

use Livewire\Component;

class Create extends Component
{
    public $show_link = false;
    public $show_platform = false;

    public function render()
    {
        return view('livewire.meeting.create');
    }
}
