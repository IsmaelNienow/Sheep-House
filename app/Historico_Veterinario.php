<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Ovelha;

class Historico_Veterinario extends Model
{
    protected $table = 'historico_veterinario';
    protected $fillable = ['sintomas','tratamento','data_tratamento'];

     // Define o mutator para a coluna data_tratamento
     public function setDataTratamentoAttribute($value) {
        $this->attributes['data_tratamento'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }
    // Accessor para formatar a data_tratamento ao obter do banco de dados
    public function getDataTratamentoAttribute($value)
    {
        return date('d/m/Y', strtotime($value));
    }

    public function ovelha()
    {
        return $this->belongsTo(Ovelha::class, 'id_ovelha', 'id');
    }


}

