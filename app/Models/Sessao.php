<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    protected $table = 'sessao';

    protected $fillable = ['usuario_id', 'endereco_ip', 'ultimo_login'];

    public $incrementing = false;

    public $timestamps = false;
}
