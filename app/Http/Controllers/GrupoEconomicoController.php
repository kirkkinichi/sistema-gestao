<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;

use App\Models\GrupoEconomico;
use Illuminate\Support\Facades\Auth;

class GrupoEconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gruposEconomicos = GrupoEconomico::all();
        return view('grupo-economico.index', ['gruposEconomicos' => $gruposEconomicos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grupo-economico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $grupoEconomico = GrupoEconomico::create($validated);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Grupo Economico Criado',
            'valores' => json_encode($grupoEconomico->getAttributes()),
            'ip' => $request->ip(),
            'created_at' => now()
        ]);

        return redirect('/grupo-economico');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $grupoEconomico = GrupoEconomico::where('id', $id)->first();
        return view('grupo-economico.show', [
            'grupo' => $grupoEconomico
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $grupoEconomico = GrupoEconomico::where('id', $id)->first();
        return view('grupo-economico.edit', [
            'grupoEconomico' => $grupoEconomico
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        $validated = request()->validate([
            'nome' => 'required|string|max:255',
        ]);

        $grupoEconomico = GrupoEconomico::findOrFail($id);
        $grupoEconomico->update($validated);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Grupo Economico Atualizado',
            'valores' => json_encode($grupoEconomico->getAttributes()),
            'ip' => request()->ip(),
            'created_at' => now()
        ]);

        return redirect('/grupo-economico');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupoEconomico = GrupoEconomico::findOrFail($id);
        $grupoEconomico->delete();

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Grupo Economico Removido',
            'valores' => json_encode($grupoEconomico->getAttributes()),
            'ip' => request()->ip(),
            'created_at' => now()
        ]);

        return redirect('/grupo-economico');
    }
}
