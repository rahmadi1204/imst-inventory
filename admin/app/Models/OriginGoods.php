<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OriginGoods extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_origin',
        'origin',
    ];
}
