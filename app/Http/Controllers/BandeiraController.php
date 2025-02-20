<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Bandeira;
use App\Models\GrupoEconomico;

class BandeiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bandeiras = Bandeira::with('grupoEconomico')->get();
        return response()->json($bandeiras);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupoEconomicos = GrupoEconomico::all();
        return view('bandeira', compact('grupoEconomicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|exists:grupo_economico,id',
        ]);

        $bandeira = Bandeira::create($validated);
        return response()->json($bandeira, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bandeira = Bandeira::with('grupoEconomico')->findOrFail($id);
        return response()->json($bandeira);
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
            'grupo_economico_id' => 'required|exists:grupo_economico,id',
        ]);

        $bandeira = Bandeira::findOrFail($id);
        $bandeira->update($validated);

        return response()->json($bandeira);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bandeira = Bandeira::findOrFail($id);
        $bandeira->delete();
        return response()->json(null, 204);
    }
}
