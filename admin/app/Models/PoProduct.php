<?php

namespace App\Models;

use App\Models\Master\MasterProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo(MasterProduct::class, 'product_id', 'id');
    }
}
