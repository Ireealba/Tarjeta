<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Navigation extends Component
{
    public function render()
    {
        $roles = Role::all();
        
        return view('livewire.navigation', compact('roles'));
    }
}
