<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias'; 
    protected $primaryKey = 'id_cate'; 
    public $timestamps = false;

    protected $fillable = ['categoria'];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria', 'id_cate');
    }
}
