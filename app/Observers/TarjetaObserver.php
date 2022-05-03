<?php

namespace App\Observers;

use App\Models\Tarjeta;
use Illuminate\Support\Facades\Storage;

class TarjetaObserver
{

    public function created(Tarjeta $tarjeta)
    {
        //
    }

    public function deleting(Tarjeta $tarjeta)
    {
        if($tarjeta->image){
            Storage::delete($tarjeta->image->url);
        }
    }

}
