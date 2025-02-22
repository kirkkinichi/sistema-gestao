<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GrupoEconomico;
use App\Models\Bandeira;
use App\Models\Unidade;
use App\Models\Colaborador;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = GrupoEconomico::with(['bandeiras.unidades.colaboradores'])
            ->get()
            ->map(function ($grupoEconomico) {
                return [
                    'grupo_economico' => $grupoEconomico->nome,
                    'bandeiras' => $grupoEconomico->bandeiras->map(function ($bandeira) {
                        return [
                            'nome' => $bandeira->nome,
                            'unidades' => $bandeira->unidades->map(function ($unidade) {
                                return [
                                    'nome_fantasia' => $unidade->nome_fantasia,
                                    'razao_social' => $unidade->razao_social,
                                    'cnpj' => $unidade->cnpj,
                                    'colaboradores' => $unidade->colaboradores->map(function ($colaborador) {
                                        return [
                                            'nome' => $colaborador->nome,
                                            'email' => $colaborador->email,
                                            'cpf' => $colaborador->cpf,
                                        ];
                                    }),
                                ];
                            }),
                        ];
                    }),
                ];
            });

        return view('relatorio', compact('data'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
