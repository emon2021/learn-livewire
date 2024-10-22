<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\ValidateRequest;

class AppIndexComponent extends Component
{
    public $name, $email, $password, $password_confirmation, $search;

    public function updated($fields){
        $valid = new ValidateRequest();
        $this->validate($valid->rules(), $valid->messages());
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        session()->flash('delete', 'User deleted successfully');
    }
    public function store()
    {
        $user = new User();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->password = Hash::make($this->password);
        $user->save();

        session()->flash('success', 'User created successfully');

        $this->reset(['name', 'email', 'password', 'password_confirmation']);

    }


    public function render()
    {
        $query = new User();

        if($this->search){
            $users = $query->where('name', 'like', '%' . $this->search . '%')->get();
        }else{
            $users = $query->get();
        }


        return view('livewire.app-index-component')->with(['users' => $users]);
    }
}
