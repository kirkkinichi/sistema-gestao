<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\Bandeira;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = Unidade::with('bandeira')->get();
        return response()->json($unidades);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bandeiras = Bandeira::all();
        return view('unidade', compact('bandeiras'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14',
            'bandeira_id' => 'required|exists:bandeira,id',
        ]);

        $unidade = Unidade::create($validated);

        return response()->json($unidade, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $unidade = Unidade::with('bandeira')->findOrFail($id);
        return response()->json($unidade);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unidade = Unidade::findOrFail($id);
        $bandeiras = Bandeira::all();
        return view('unidade.edit', compact('unidade', 'bandeiras'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => 'required|string|max:14',
            'bandeira_id' => 'required|exists:bandeira,id',
        ]);

        $unidade = Unidade::findOrFail($id);
        $unidade->update($validated);

        return response()->json($unidade);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unidade = Unidade::findOrFail($id);
        $unidade->delete();
        return response()->json(null, 204);
    }
}
