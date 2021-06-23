<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Foto;
use App\Models\Comodo;

class Imovel extends Model
{
    use HasFactory;

    protected $table = 'Imoveis';
    protected $primaryKey = 'idImovel';

    public function fotos()
    {
        return $this->hasMany(Foto::class);
    }

    public function comodos()
    {
        return $this->hasMany(Comodo::class);
    }
}
