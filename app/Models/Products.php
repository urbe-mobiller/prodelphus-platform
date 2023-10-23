<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id_category',
        'code',
        'name',
        'description',
        'highlights',
        'releases',
        'status'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Categories::class, 'id', 'id_category');
    }

    public function images(): HasMany
    {
        return $this->hasMany(ProducsImages::class, 'id_product', 'id');
    }

    public function models(): HasMany
    {
        return $this->hasMany(ProducsModels::class, 'id_product', 'id');
    }
}
