<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function produkMasuk()
    {
        return $this->belongsTo('App\Models\ProdukMasuk', 'produkmasuk_id', 'id');
    }
}
