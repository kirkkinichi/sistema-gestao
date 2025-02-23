<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use App\Models\Colaborador;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColaboradorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colaboradores = Colaborador::all();
        return view('colaborador.index', ['colaboradores' => $colaboradores]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        return view('colaborador.create', ['unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->input('cpf'));
        $request->merge(['cpf' => $cpf]);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'size:11', new \App\Rules\CpfValido],
            'unidade_id' => 'required|integer',
        ]);

        $colaborador = Colaborador::create($validated);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Colaborador criado',
            'valores' => json_encode($colaborador->getAttributes()),
            'ip' => $request->ip(),
            'created_at' => now()
        ]);

        return redirect('/colaboradores');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $colaborador = Colaborador::where('id', $id)->first();
        $unidade = Unidade::where('id', $colaborador->unidade_id)->first();
        return view('colaborador.show', [
            'colaborador' => $colaborador,
            'unidade' => $unidade
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $colaborador = Colaborador::where('id', $id)->first();
        $unidades = Unidade::all();
        return view('colaborador.edit', [
            'colaborador' => $colaborador,
            'unidades' => $unidades
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cpf = preg_replace('/[^0-9]/', '', $request->input('cpf'));
        $request->merge(['cpf' => $cpf]);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'cpf' => ['required', 'string', 'size:11', new \App\Rules\CpfValido],
            'unidade_id' => 'required|integer',
        ]);

        $colaboradores = Colaborador::findOrFail($id);
        $colaboradores->update($validated);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Colaborador atualizado',
            'valores' => json_encode($colaboradores->getChanges()),
            'ip' => $request->ip(),
            'created_at' => now()
        ]);

        return redirect('/colaboradores');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $colaboradores = Colaborador::findOrFail($id);
        $colaboradores->delete();

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Colaborador removido',
            'valores' => json_encode($colaboradores->getAttributes()),
            'ip' => request()->ip(),
            'created_at' => now()
        ]);

        return redirect('/colaboradores');
    }
}
