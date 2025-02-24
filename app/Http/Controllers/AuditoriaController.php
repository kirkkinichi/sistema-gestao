<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auditoria;

class AuditoriaController extends Controller
{
    /**
     * Exibe todos os registros de Auditoria
     */
    public function index()
    {
        $auditorias = Auditoria::all();

        return view('auditoria.index', ['auditorias' => $auditorias]);
    }
}
