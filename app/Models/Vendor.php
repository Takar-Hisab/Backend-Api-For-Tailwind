<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static create(array $array)
 */
class Vendor extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id', 'referal_code', 'register_date'
    ];

    protected $casts = [
        'register_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }


}
