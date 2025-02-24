<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Exibe o formulário de registro
     */
    public function create() {
        return view('sessao.registrar');
    }

    /**
     * Registra o Usuário
     */
    public function store() {
        $validator = Validator::make(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);

        // Verifica se o e-mail já existe
        if (Usuario::where('email', request()->email)->exists()) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Este e-mail já está em uso.']);
        }

        // Se a validação falhar, redireciona de volta com os erros
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

