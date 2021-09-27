<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PibLoad extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_approval',
        'no_register',
        'date_register',
        'way_transport',
        'name_transport',
        'date_estimate',
        'load_place',
        'load_transit',
        'load_destination',
    ];
}
