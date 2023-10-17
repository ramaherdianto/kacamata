<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produkmasuk extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => asset('/storage/' . $value),
        );
    }


    public function kategoriproduk()
    {
        return $this->belongsTo(Kategoriproduk::class, 'kategori_produk_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }


    public function customers()
    {
        return $this->hasMany('App\Models\Customer', 'produkmasuk_id', 'id');
    }
}
