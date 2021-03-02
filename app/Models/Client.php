<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'city_id',
    ];

    public function city() {
        return $this->belongsTo(City::class);
    }

    public function user() {
        return $this->hasOne(User::class);
    }
}
