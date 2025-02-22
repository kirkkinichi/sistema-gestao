<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unidade;

class Colaborador extends Model
{
    use HasFactory;

    protected $table = 'colaborador';

    protected $fillable = ['nome', 'email', 'cpf', 'unidade_id'];

    public function unidade()
    {
        return $this->belongsTo(Unidade::class);
    }
}
