<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    public $primaryKey = 'id';

    protected $fillable = ['razao_social', 'nm_fantasia','cnpj','endereco','email','telefone','nm_responsavel','cpf','celular'];

}
