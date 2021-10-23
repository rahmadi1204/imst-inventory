<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Po extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_po',
        'project',
        'date_po',
        'vendor_name',
        'vendor_address',
        'send_address',
        'code_product',
        'type_product',
        'name_product',
        'description',
        'value_product',
        'unit_price',
        'currency',
        'total_amount',
        'latest',
    ];
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }
}
