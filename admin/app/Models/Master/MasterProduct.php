<?php

namespace App\Models\Master;

use App\Models\PoProduct;
use App\Models\StockProduct;
use App\Models\TypeProduct;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterProduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_product',
        'name_product',
        'type_product',
        'qty_product',
        'status_product',
    ];

    public function type()
    {
        return $this->belongsTo(TypeProduct::class);
    }
    public function poProduct()
    {
        return $this->hasMany(PoProduct::class);
    }
}
