<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Unidade;

class Bandeira extends Model
{

    protected $table = 'bandeira';

    protected $fillable = ['nome', 'grupo_economico_id'];

    public function grupoEconomico()
    {
        return $this->belongsTo(GrupoEconomico::class);
    }

    public function unidades()
    {
        return $this->hasMany(Unidade::class);
    }
}
