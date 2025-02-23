<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessaoController extends Controller
{
    public function create() {
        return view('sessao.login');
    }

    public function store() {
        $attributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (! Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Credenciais inválidas.'
            ]);
        }

        Sessao::updateOrCreate([
            'usuario_id' => Auth::id(),
            'endereco_ip' => request()->ip(),
            'ultimo_login' => now(),
        ]);

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy() {
        Auth::logout();
        return redirect('/login');
    }
}
