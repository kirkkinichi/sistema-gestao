<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function create() {
        return view('sessao.registrar');
    }

    public function store() {
        $validator = Validator::make(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        if (Usuario::where('email', request()->email)->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este e-mail já está em uso.']);
        }

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Usuario::create($validator->validated());

        Auth::login($user);

        Sessao::updateOrCreate([
            'usuario_id' => $user->id,
            'endereco_ip' => request()->ip(),
            'ultimo_login' => now(),
        ]);

        return redirect('/')->with('success', 'Conta criada com sucesso!');
    }
}

