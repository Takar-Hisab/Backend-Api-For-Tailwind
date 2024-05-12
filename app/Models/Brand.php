<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillabla = [
        'name',
        'logo'
    ];
    public function prducts()
    {
        return $this->hasMany(Product::class);
    }
}
