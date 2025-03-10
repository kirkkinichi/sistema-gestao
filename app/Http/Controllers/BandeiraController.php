<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Bandeira;
use App\Models\GrupoEconomico;

class BandeiraController extends Controller
{
    /**
     * Lista todas as Bandeiras
     */
    public function index()
    {
        $bandeiras = Bandeira::all();
        return view('bandeira.index', ['bandeiras' => $bandeiras]);
    }

    /**
     * Mostra o formulário para criar uma nova Bandeira
     */
    public function create()
    {
        $grupoEconomicos = GrupoEconomico::all();
        return view('bandeira.create', ['grupoEconomicos' => $grupoEconomicos]);
    }

    /**
     * Armazena a Bandeira no banco de dados
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|integer'
        ]);

        $bandeira = Bandeira::create($validated);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Bandeira criada',
            'valores' => json_encode($bandeira->getAttributes()),
            'ip' => $request->ip(),
            'created_at' => now()
        ]);

        return redirect('/bandeira');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Edita a Bandeira
     */
    public function edit($id)
    {
        $bandeira = Bandeira::find($id);
        $grupoEconomicos = GrupoEconomico::all();

        return view('bandeira.edit', compact('bandeira', 'grupoEconomicos'));
    }

    /**
     * Atualiza a Bandeira
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|integer'
        ]);

        $bandeira = Bandeira::findOrFail($id);
        $bandeira->update($validated);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Bandeira editada',
            'valores' => json_encode($bandeira->getChanges()),
            'ip' => request()->ip(),
            'created_at' => now()
        ]);

        return redirect('/bandeira');
    }

    /**
     * Remove a Bandeira
     */
    public function destroy($id)
    {
        $bandeira = Bandeira::findOrFail($id);

        if ($bandeira->unidades()->count() > 0) {
            return redirect()->back()->with('error', 'Não é possível excluir esta Bandeira pois existem Unidades relacionadas a ela.');
        }

        $bandeira->delete();

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Bandeira removida',
            'valores' => json_encode($bandeira->getAttributes()),
            'ip' => request()->ip(),
            'created_at' => now()
        ]);

        return redirect('/bandeira')->with('success', 'Bandeira excluída com sucesso.');
    }
}
