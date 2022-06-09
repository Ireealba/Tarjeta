<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarjeta;

class Navigation extends Component
{
    public function render()
    {
        $tarjetas = Tarjeta::count('user_id');        

        $roles = Role::all();

        foreach ($roles as $role ) {
            if (Auth::user()->hasRole($role)) {
                $cards = $role->card_number;
            }
        }

        if ($tarjetas < $cards) {
            $button = 0;
        }
        else {
            $button = 1;
        }

        return view('livewire.navigation', compact('button'));
    }
}
