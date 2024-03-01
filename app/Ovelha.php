<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class Ovelha extends Model
{
    protected $table = 'ovelhas';
    protected $fillable = ['brinco','raca','data_nascimento','pai',
                        'mae','total_cria','gemeas','abate','abate',
                        'abatida','doente'];

    // Define o mutator para a coluna data_nascimento
    public function setDataNascimentoAttribute($value) {
        $this->attributes['data_nascimento'] = date('Y-m-d', strtotime(str_replace('/', '-', $value)));
    }

}

                