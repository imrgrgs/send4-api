<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['nome', 'sobrenome', 'email', 'telefone', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function mensagens()
    {
        return $this->hasMany('App\Mensagem');
    }
}
