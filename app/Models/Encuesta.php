<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuesta extends Model
{
    use HasFactory;

    protected $fillable = [
        'folio',
        'conoce',
        'informado',
        'decision',
        'latitud',
        'longitud',
        'user_id',
        'brigada_id',
        'estado_id',
        'municipio_id',
        'distrito_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class);
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

    public function municipio()
    {
        return $this->belongsTo(Municipio::class);
    }

    public function brigada()
    {
        return $this->belongsTo(Brigada::class);
    }
}
