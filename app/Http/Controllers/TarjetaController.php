<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tarjeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TarjetaController extends Controller
{
    public function index(){
        $tarjetas = Tarjeta::all();
        return view('tarjetas.index', compact('tarjetas'));
    }    

    public function create(){     
        
            if(Auth::check()){
                $id = Auth::user()->id;
            }

        return view('tarjetas.create', compact('id'));
    }

    public function store(Request $request, Tarjeta $tarjeta){       
        
        $tarjeta = Tarjeta::create($request->all());
        
        if($request->file('file')){
            $url = Storage::put('imgtarjetas', $request->file('file'));

            $tarjeta->image()->create([
                'url'=> $url
            ]);
        }

        return redirect()->route('tarjetas.edit', $tarjeta)->with('info', 'Los datos se crearon con éxito.');
    }

    public function show(Tarjeta $tarjeta){

        return view('show', compact('tarjeta'));
    }

    public function edit(Tarjeta $tarjeta){
        if(Auth::check()){
            $id = Auth::user()->id;
        }

        return view('tarjetas.edit', compact('tarjeta', 'id'));
    }

    public function update(Request $request, Tarjeta $tarjeta){
        
        $tarjeta->update($request->all());

        if($request->file('file')){
            $url = Storage::put('public/imgtarjetas', $request->file('file'));

            if($tarjeta->image){
                Storage::delete($tarjeta->image->url);

                $tarjeta->image->update([
                    'url' => $url
                ]);
            }
            else{
                $tarjeta->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('tarjetas.edit', $tarjeta)->with('info', 'Los datos se actualizaron con éxito.');
    }

    public function destroy(Tarjeta $tarjeta){
        $tarjeta->delete();

        return redirect()->route('tarjetas.index')->with('info', 'Los datos han sido eliminados con éxito.');
    }

}
