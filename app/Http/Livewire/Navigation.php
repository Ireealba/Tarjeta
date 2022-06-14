<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Tarjeta;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class Navigation extends Component
{
    public function render()
    {

        $user = User::find(auth()->user()->id);

        $roles = Role::all();

        foreach ($roles as $role ) {
            if($user->hasRole($role)){
                $user_role = $role;
            }
        }

        if ($user->card_number < $user_role->card_number){
            $button = 0;
        }
        else {
            $button = 1;
        }

        return view('livewire.navigation', compact('button'));
    }
}
