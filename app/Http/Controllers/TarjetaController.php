<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Tarjeta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Spatie\Permission\Models\Role;


class TarjetaController extends Controller
{
    public function index(){
        $tarjetas = Tarjeta::all();
        $i = 0;
        
        $tarjetasUsuario = array();
             
            foreach ($tarjetas as $tarjeta ) {
                Auth::check();
                if (Auth::user()->id == $tarjeta->user_id) {
                    $tarjetasUsuario[$i] = $tarjeta;
                    $i++;
                };
            };
        
        
        return view('tarjetas.index', compact('tarjetasUsuario'));
    }    

    public function create(){     
        
            if(Auth::check()){
                
                $id = Auth::user()->id;

                $user = User::find(auth()->user()->id);

                $roles = Role::all();

                foreach ($roles as $role ) {
                    if ($user->hasRole($role)) {
                        $user_role = $role;
                    }
                }

                if ($user->card_number < $user_role) {
                    return view('tarjetas.create', compact('id'));
                }else{
                    return redirect(route('tarjetas.index', $id))->with('info', 'El límite de tarjetas ha sido alcanzado.');
                }
                

            }
            else{
                return view('tarjetas.create', compact('id'));
            }

                 
    }

    public function store(Request $request, Tarjeta $tarjeta, User $user){       
        
        
        $tarjeta = Tarjeta::create($request->all());
        
        /* if($request->file('file')){
            $url = $request->file('file')->store('imgtarjetas');

            $tarjeta->image()->create([
                'url'=> $url
            ]);
        } */        

        if($request->file('file')){
            $url = Storage::put('imgtarjetas', $request->file('file'));
            $tarjeta->image()->create([
                'url' => $url
            ]);
        }

        $tarjeta->url = "https://gallant-hamilton.185-209-60-239.plesk.page/tarjetas/".$tarjeta->id;
        $tarjeta->save();

        $user = User::find(auth()->user()->id);
        $user->card_number = auth()->user()->card_number + 1;
        $user->save();
        

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
             
            $url = $request->file('file')->store('imgtarjetas');

            if($tarjeta->image){
                Storage::delete($tarjeta->image->url);

                $tarjeta->image()->update([
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

        /* $roles = Role::all();

        foreach ($roles as $role) {
            if ($role != 'TarjetasLimite') {
                if(Auth::user()->hasRole($role)){
                    $user_role = $role;
               }
            }
        } */

        /* Auth::user()->removeRole('TarjetasLimite'); */
        /* Auth::user()->assignRole($role); */

        $user = User::find(auth()->user()->id);

        $user->card_number = auth()->user()->card_number - 1;
        $user->save();

        $tarjeta->delete();

        return redirect()->route('tarjetas.index')->with('eliminar', 'ok');
    }

    public function qr_generate(Tarjeta $tarjeta){
        return QrCode::size(300)->generate($tarjeta->url);

    }

    
}

