<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'reservation_datetime',
        'num_of_guests',
        'table_id'
    ];

    public function table(){
        return $this->belongsTo(Table::class);
    }
    
}
