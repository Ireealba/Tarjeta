<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Fortify\PasswordValidationRules;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;



class UserController extends Controller
{
    use PasswordValidationRules;

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update', 'destroy');
        $this->middleware('can:admin.users.create')->only('create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            
        ]);

        /* return DB::transaction(function () use ($request) {
            return tap(User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        }); */

        /* Validator::make($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($request) {
            return tap(User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]), function (User $user) {
                $this->createTeam($user);
            });
        });*/

         $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

        return redirect()->route('admin.users.edit', $user)->with('info', 'Usuario creado con éxito'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => "required|string|email|max:255|unique:users,email,$user->id",
            
        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),            

        ]);

        $user->roles()->sync($request->roles);

        $roles = Role::all();
        $i = 0;

        foreach ($roles as $role ) {

            $i++;

            if($request->roles == $role){
                $user->role_id = $i;
            }
        }

        
        
        //sincronizar un rol con un usuario

        return redirect()->route('admin.users.edit', $user)->with('info', 'usuario actualizado con éxito'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}
