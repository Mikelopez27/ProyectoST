<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_prod';
    public $timestamps = false;

    protected $fillable = ['titulo', 'precio', 'descripcion', 'categoria'];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria', 'id_cate');
    }
}
