<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class ContactSearch extends Component
{
    public $q;
    public $search_term;
    public function mount()
    {
        $this->fill(request()->only('q'));
        $this->search_term = '%'.$this->q . '%';
    }

    public function render()
    {
        $contact = User::where('phone','like',$this->search_term)->get();

        return view('livewire.contact-search',[
            'contact' => $contact,
        ]);
    }
}
