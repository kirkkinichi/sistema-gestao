<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GrupoEconomico;

class GrupoEconomicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupoEconomico = GrupoEconomico::all();
        return view('grupo-economico.index', ['grupoEconomico' => $grupoEconomico]);
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
            'grupo' => $grupoEconomico
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
        return redirect('/grupo-economico');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupoEconomico = GrupoEconomico::findOrFail($id);
        $grupoEconomico->delete();
        return redirect('/grupo-economico');
    }
}
