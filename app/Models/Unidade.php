<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Unidade extends Model
{
    use HasFactory;

    protected $table = 'unidade';

    protected $fillable = ['nome_fantasia', 'razao_social', 'CNPJ', 'bandeira_id'];

    public function bandeira()
    {
        return $this->belongsTo(Bandeira::class);
    }
}
