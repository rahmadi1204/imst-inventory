<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcrVendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_ncrv',
        'date_ncrv',
        'no_po',
        'code_supplier',
        'name_warehouse',
        'way_transport',
        'code_product',
        'type_product',
        'name_product',
        'qty_product',
        'unit_product',
    ];
}
