<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\GrupoEconomico;

use App\Exports\RelatorioExport;
use Maatwebsite\Excel\Facades\Excel;

class RelatorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $tags = $request->input('tags', []);

        $query = GrupoEconomico::with(['bandeiras.unidades.colaboradores']);

        if ($search) {
            $query->whereHas('bandeiras.unidades.colaboradores', function ($q) use ($search) {
                $q->where(function ($subQuery) use ($search) {
                    $subQuery->where('nome', '=', $search)
                        ->orWhere(function ($wordQuery) use ($search) {
                            $words = explode(' ', $search);
                            foreach ($words as $word) {
                                $wordQuery->where('nome', 'LIKE', "%{$word}%");
                            }
                        });
                });
            });
        }

        $data = $query->get()->map(function ($grupoEconomico) use ($tags, $search) {
            return [
                'grupo_economico' => in_array('grupo_economico', $tags) ? $grupoEconomico->nome : null,
                'bandeiras' => $grupoEconomico->bandeiras->map(function ($bandeira) use ($tags, $search) {
                    return [
                        'nome' => in_array('bandeira', $tags) ? $bandeira->nome : null,
                        'unidades' => $bandeira->unidades->map(function ($unidade) use ($tags, $search) {
                            return [
                                'nome_fantasia' => in_array('unidade', $tags) ? $unidade->nome_fantasia : null,
                                'razao_social' => in_array('razao_social', $tags) ? $unidade->razao_social : null,
                                'cnpj' => in_array('cnpj', $tags) ? $unidade->cnpj : null,
                                'colaboradores' => $unidade->colaboradores
                                    ->filter(function ($colaborador) use ($search) {
                                        if (!$search) return true;

                                        if (strpos($search, ' ') === false) {
                                            return stripos($colaborador->nome, $search) !== false;
                                        } else {
                                            $words = explode(' ', $search);
                                            return count($words) > 1 && count(array_filter($words, function($word) use ($colaborador) {
                                                return stripos($colaborador->nome, $word) !== false;
                                            })) === count($words);
                                        }
                                    })
                                    ->map(function ($colaborador) use ($tags) {
                                        return [
                                            'nome' => $colaborador->nome,
                                            'email' => in_array('email', $tags) ? $colaborador->email : null,
                                            'cpf' => in_array('cpf', $tags) ? $colaborador->cpf : null,
                                        ];
                                    }),
                            ];
                        }),
                    ];
                }),
            ];
        });

        return view('relatorio', compact('data', 'search', 'tags'));
    }

    public function export(Request $request)
    {
        $search = $request->input('search');
        $tags = $request->input('tags', []);

        $query = GrupoEconomico::with(['bandeiras.unidades.colaboradores']);

        if ($search) {
            $query->whereHas('bandeiras.unidades.colaboradores', function ($q) use ($search) {
                $q->where(function ($subQuery) use ($search) {
                    $subQuery->where('nome', '=', $search)
                        ->orWhere(function ($wordQuery) use ($search) {
                            $words = explode(' ', $search);
                            foreach ($words as $word) {
                                $wordQuery->where('nome', 'LIKE', "%{$word}%");
                            }
                        });
                });
            });
        }

        $data = $query->get()->map(function ($grupoEconomico) use ($tags, $search) {
            return [
                'grupo_economico' => in_array('grupo_economico', $tags) ? $grupoEconomico->nome : null,
                'bandeiras' => $grupoEconomico->bandeiras->map(function ($bandeira) use ($tags, $search) {
                    return [
                        'nome' => in_array('bandeira', $tags) ? $bandeira->nome : null,
                        'unidades' => $bandeira->unidades->map(function ($unidade) use ($tags, $search) {
                            return [
                                'nome_fantasia' => in_array('unidade', $tags) ? $unidade->nome_fantasia : null,
                                'razao_social' => in_array('razao_social', $tags) ? $unidade->razao_social : null,
                                'cnpj' => in_array('cnpj', $tags) ? $unidade->cnpj : null,
                                'colaboradores' => $unidade->colaboradores
                                    ->filter(function ($colaborador) use ($search) {
                                        if (!$search) return true;

                                        if (strpos($search, ' ') === false) {
                                            return stripos($colaborador->nome, $search) !== false;
                                        } else {
                                            $words = explode(' ', $search);
                                            return count($words) > 1 && count(array_filter($words, function($word) use ($colaborador) {
                                                return stripos($colaborador->nome, $word) !== false;
                                            })) === count($words);
                                        }
                                    })
                                    ->map(function ($colaborador) use ($tags) {
                                        return [
                                            'nome' => $colaborador->nome,
                                            'email' => in_array('email', $tags) ? $colaborador->email : null,
                                            'cpf' => in_array('cpf', $tags) ? $colaborador->cpf : null,
                                        ];
                                    }),
                            ];
                        }),
                    ];
                }),
            ];
        });

        return Excel::download(new RelatorioExport($data, $tags), 'relatorio.xlsx');
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
