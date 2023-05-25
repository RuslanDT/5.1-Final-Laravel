<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricula',
        'nombre',
        'fecha_nacimiento',
        'telefono',
        'email',
        'nivel_id',
    ];

    public function nivel(){
        return $this->BelongsTo(Nivel::class, "nivel_id", "id");
    }
}
