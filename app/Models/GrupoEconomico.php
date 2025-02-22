<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Bandeira;

class GrupoEconomico extends Model
{
    use HasFactory;

    protected $table = 'grupo_economico';

    protected $fillable = ['nome'];

    public $timestamps = true;

    public function bandeiras()
    {
        return $this->hasMany(Bandeira::class);
    }
}
