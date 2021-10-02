<?php

namespace App\Models\Master;

use App\Models\StockProduct;
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
}
