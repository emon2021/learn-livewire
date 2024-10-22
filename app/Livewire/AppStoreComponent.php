<?php

namespace App\Livewire;

use Livewire\Component;

class AppStoreComponent extends Component
{
    public $name, $email, $password;

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
    }

    public function render()
    {
        return view('livewire.app-store-component');
    }
}
