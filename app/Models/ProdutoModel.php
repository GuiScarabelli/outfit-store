<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoModel extends Model
{
    use HasFactory;

    protected $table = "tbproduto";

    protected $fillable = [
        'idProduto',
        'idCategoria',
        'produto',
        'valor',
        'foto',

    ];

    public $timestamps = false;
}
