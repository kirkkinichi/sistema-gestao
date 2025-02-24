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
     * Lista todas as Undidades
     */
    public function index()
    {
        $unidades = Unidade::all();
        return view('unidade.index', ['unidades' => $unidades]);
    }

    /**
     * Mostra o formulário para criar uma nova Unidade
     */
    public function create()
    {
        $bandeiras = Bandeira::all();
        return view('unidade.create', ['bandeiras' => $bandeiras]);
    }

    /**
     * Armazena a Unidade no banco de dados
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
     * Exibe a Unidade
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
     * Edita a Unidade
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
     * Atualiza a Unidade
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
     * Remove a Unidade
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
