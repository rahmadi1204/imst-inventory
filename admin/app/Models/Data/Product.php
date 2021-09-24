<?php

namespace App\Models\Data;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_code',
        'product_name',
        'product_type',
        'user_id',
        'product_from',
        'product_now',
        'for_use',
        'no_po',
        'no_pib',
        'date',
        'stock',
        'unit',
        'status',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
