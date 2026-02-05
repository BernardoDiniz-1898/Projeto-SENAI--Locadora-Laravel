<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Model_Carros extends Model
{
    use HasFactory;


    protected $fillabeil = ['Modelo', 'Cor', 'Ano Veiculo'];
}
