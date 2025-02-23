<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UsuarioController extends Controller
{
    public function create() {
        return view('sessao.registrar');
    }

    public function store() {

        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        $user = Usuario::create($attributes);

        Auth::login($user);

        Sessao::updateOrCreate([
            'usuario_id' => $user->id,
            'endereco_ip' => request()->ip(),
            'ultimo_login' => now(),
        ]);

        return redirect('/');
    }
}
