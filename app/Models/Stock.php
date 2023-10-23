<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Define the relationship with the Purchase model
    public function purchase()
    {
        return $this->belongsTo('App\Models\Purchase', 'purchase_id');
    }
}