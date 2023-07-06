<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
//use Spatie\Permission\Contracts\Role;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:usuarios')->only('index', 'edit', 'create', 'update', 'store');   
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $roles = Role::select('*')->get();
        $usuarios = User::select('*')->orderBy('id', 'ASC');
        $limit=(isset($request->limit)) ? $request->limit:5;

        if(isset($request->search)){
            $usuarios = $usuarios->where('id', 'like', '%'.$request->search.'%')
            ->orWhere('name','like', '%'.$request->search.'%')
            ->orWhere('email','like', '%'.$request->search.'%');
        }
        $usuarios = $usuarios->paginate($limit)->appends($request->all());

        return view('users.index', compact('usuarios', 'roles'));
    }


    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('users.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->save();

        return redirect()->route('usuarios.index');
    }



    public function edit(string $id)
    {
        //
        $roles = Role::get();
        $usuario = User::where('id', $id)->firstOrFail();
        return view('users.edit' ,compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        //
        // $usuario = User::where('id', $id)->roles()->synk($request->role);
        $usuario = User::findOrFail($id);
        $usuario->roles()->sync($request->role);
        return redirect()->route('usuarios.index');

        // $usuario = User::where('id', $id)->firstOrFail();
        // $usuario->roles()->synk($request->role);
        // return redirect('usuarios.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
