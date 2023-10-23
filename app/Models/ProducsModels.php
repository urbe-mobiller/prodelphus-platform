<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProducsModels extends Model
{
    use HasFactory;

    protected $table = 'products_models';

    protected $fillable = [
        'id_product',
        'name',
        'description'
    ];
}
