<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pib extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function po()
    {
        return $this->belongsTo(Po::class, 'code_po', 'code_po');
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
    public function importir()
    {
        return $this->belongsTo(Importir::class);
    }
    public function pibLoad()
    {
        return $this->hasOne(PibLoad::class, 'code_pib', 'code_pib');
    }
    public function pibInvoice()
    {
        return $this->hasOne(PibInvoice::class, 'code_pib', 'code_pib');
    }
    public function pibContainer()
    {
        return $this->hasMany(pibContainer::class, 'code_pib', 'code_pib');
    }
    public function pibProduct()
    {
        return $this->hasMany(pibProduct::class, 'code_pib', 'code_pib');
    }
    public function pibDevy()
    {
        return  $this->hasOne(pibDevy::class, 'code_pib', 'code_pib');
    }
}
