<?php

namespace App\Http\Controllers;

use App\Models\Auditoria;
use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\Bandeira;
use Illuminate\Support\Facades\Auth;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidade.index', ['unidades' => $unidades]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bandeiras = Bandeira::all();
        return view('unidade.create', ['bandeiras' => $bandeiras]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $request->input('cnpj'));
        $request->merge(['cnpj' => $cnpj]);

        $validate = $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => ['required', 'string', 'size:14', new \App\Rules\CnpjValido],
            'bandeira_id' => 'required|integer',
        ]);

        $unidade = Unidade::create($validate);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Unidade Criada',
            'valores' => json_encode($unidade->getAttributes()),
            'ip' => $request->ip(),
            'created_at' => now()
        ]);

        return redirect('/unidades');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $unidade = Unidade::where('id', $id)->first();
        $bandeiras = Bandeira::all();
        return view('unidade.show', [
            'unidade' => $unidade,
            'bandeiras' => $bandeiras
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $unidade = Unidade::where('id', $id)->first();
        $bandeiras = Bandeira::all();
        return view('unidade.edit', [
            'unidade' => $unidade,
            'bandeiras' => $bandeiras
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cnpj = preg_replace('/[^0-9]/', '', $request->input('cnpj'));
        $request->merge(['cnpj' => $cnpj]);

        $validate = $request->validate([
            'nome_fantasia' => 'required|string|max:255',
            'razao_social' => 'required|string|max:255',
            'cnpj' => ['required', 'string', 'size:14', new \App\Rules\CnpjValido],
            'bandeira_id' => 'required|integer',
        ]);

        $unidade = Unidade::findOrFail($id);
        $unidade->update($validate);

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Unidade Atualizada',
            'valores' => json_encode($unidade->getChanges()),
            'ip' => $request->ip(),
            'created_at' => now()
        ]);

        return redirect('/unidades');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $unidade = Unidade::findOrFail($id);

        if ($unidade->colaboradores()->count() > 0) {
            return redirect()->back()->with('error', 'Não é possível excluir esta Unidade pois existem Colaboradores relacionados a ela.');
        }

        $unidade->delete();

        Auditoria::create([
            'usuario_id' => Auth::id(),
            'acao' => 'Unidade Removida',
            'valores' => json_encode($unidade->getAttributes()),
            'ip' => request()->ip(),
            'created_at' => now()
        ]);

        return redirect('/unidades')->with('success', 'Unidade excluída com sucesso.');
    }
}
