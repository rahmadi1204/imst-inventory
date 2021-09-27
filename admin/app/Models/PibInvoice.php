<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PibInvoice extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_approval',
        'invoice',
        'date_invoice',
        'transaction',
        'date_transaction',
        'house_bl',
        'date_house_bl',
        'master_bl',
        'date_master_bl',
        'bc11',
        'date_bc11',
        'pos',
        'sub',
        'facility',
        'dump',
        'valuta',
        'ndpbm',
        'value',
        'insurance',
        'freight',
        'pabean_value',
    ];
}
