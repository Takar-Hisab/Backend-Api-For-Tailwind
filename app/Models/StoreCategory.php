<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(mixed $validStoreCategory)
 */
class StoreCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

//    protected $fillable = ['name', 'details', 'image'];



    public function modules(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Module::class, 'store_categories_modules')->withTimestamps();
    }



}
