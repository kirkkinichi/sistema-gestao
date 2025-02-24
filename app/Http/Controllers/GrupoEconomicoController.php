<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;

use App\Models\GrupoEconomico;
use Illuminate\Support\Facades\Auth;

class GrupoEconomicoController extends Controller
{
    /**
     * Lista todos os Grupos Econômico
     */
    public function index()
    {
        $gruposEconomicos = GrupoEconomico::all();
        return view('grupo-economico.index', ['gruposEconomicos' => $gruposEconomicos]);
    }

    /**
     * Mostra o formulário para criar um novo Grupo Econômico
     */
    public function create()
    {
        return view('grupo-economico.create');
    }

    /**
     * Armazena o Grupo Econômico no banco de dados
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
     * Exibe o Grupo Econômico
     */
    public function show($id)
    {
        $grupoEconomico = GrupoEconomico::where('id', $id)->first();
        return view('grupo-economico.show', [
            'grupo' => $grupoEconomico
        ]);
    }

    /**
     * Edita o Grupo Econômico
     */
    public function edit($id)
    {
        $grupoEconomico = GrupoEconomico::where('id', $id)->first();
        return view('grupo-economico.edit', [
            'grupoEconomico' => $grupoEconomico
        ]);
    }

    /**
     * Atualiza o Grupo Econômico
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
     * Remove o Grupo Econômico
     */
    public function destroy($id)
    {
        $grupoEconomico = GrupoEconomico::findOrFail($id);

        if ($grupoEconomico->bandeiras()->count() > 0) {
            return redirect()->back()->with('error', 'Não é possível excluir este Grupo Econômico pois existem Bandeiras relacionadas a ele.');
        }

        if ($grupoEconomico->unidades()->count() > 0) {
            return redirect()->back()->with('error', 'Não é possível excluir este Grupo Econômico pois existem Unidades relacionadas a ele.');
        }

        $grupoEconomico->delete();

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Grupo Economico Removido',
            'valores' => json_encode($grupoEconomico->getAttributes()),
            'ip' => request()->ip(),
            'created_at' => now()
        ]);

        return redirect('/grupo-economico')->with('success', 'Grupo Econômico excluído com sucesso.');
    }
}
