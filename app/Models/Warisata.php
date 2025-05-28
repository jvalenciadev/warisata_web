<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warisata extends Model
{
    use HasFactory;

    protected $table = 't_warisata';
    protected $primaryKey = 'id_warisata';

    protected $fillable = [
        'nombre',
        'descripcion',
        'mision',
        'vision',
        'logo',
    ];
}
