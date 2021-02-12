<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date_time',
        'client_id',
        'provider_id',
        'address',
        'client_charge',
        'prestopp_margin',
        'provider_vat',
        'state',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'date_time' => 'datetime',
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function provider() {
        return $this->belongsTo(Provider::class);
    }

    public function stateText() {
        switch ($this->state) {
            case 1:
                return "Pendiente";
            case 2:
                return "Completado";
            case 3:
                return "Cancelado";
        }
    }
}
