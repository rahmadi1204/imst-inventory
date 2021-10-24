<?php

namespace App\Models;

use App\Models\Master\MasterProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PibProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function master()
    {
        return $this->belongsTo(MasterProduct::class, 'product_id', 'id');
    }
}
