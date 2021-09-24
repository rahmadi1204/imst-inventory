<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convertion extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_convertion',
        'code_raw',
        'code_finished',
    ];
}
