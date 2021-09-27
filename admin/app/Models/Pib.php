<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pib extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_document_pabean',
        'office_pabean',
        'no_approval',
        'no_po',
        'type_pib',
        'type_import',
        'payment_method',
        'name_shipper',
        'address_shipper',
        'name_seller',
        'address_seller',
        'nik_importir',
        'name_importir',
        'address_importir',
        'status_importir',
        'apiu',
        'name_owner',
        'address_owner',
        'name_ppjk',
        'npwp_ppjk',
        'np_ppjk',
    ];
}
