<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $fillable = ['descricao', 'contato_id'];

    public function contato()
    {
        return $this->belongsTo('App\Contato');
    }
}
