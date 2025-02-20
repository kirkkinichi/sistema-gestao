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
        return response()->json($grupoEconomico);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        return response()->json($grupoEconomico, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $grupoEconomico = GrupoEconomico::findOrFail($id);
        return response()->json($grupoEconomico);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $grupoEconomico = GrupoEconomico::findOrFail($id);
        $grupoEconomico->update($validated);
        return response()->json($grupoEconomico);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grupoEconomico = GrupoEconomico::findOrFail($id);
        $grupoEconomico->delete();
        return response()->json(null, 204);
    }
}
