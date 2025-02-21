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
        $bandeiras = Bandeira::all();
        return view('bandeira.index', ['bandeiras' => $bandeiras]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupoEconomicos = GrupoEconomico::all();
        return view('bandeira.create', ['grupoEconomicos' => $grupoEconomicos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|integer'
        ]);

        $bandeira = Bandeira::create($validated);
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
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bandeira = Bandeira::find($id);
        $grupoEconomicos = GrupoEconomico::all();
        return view('bandeira.edit', compact('bandeira', 'grupoEconomicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'grupo_economico_id' => 'required|integer'
        ]);

        $bandeira = Bandeira::findOrFail($id);
        $bandeira->update($validated);
        return redirect('/bandeira');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bandeira = Bandeira::find($id);
        $bandeira->delete();
        return redirect('/bandeira');
    }
}
