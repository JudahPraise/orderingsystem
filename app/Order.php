<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['prd_id','prd_name','quantity','price','price_total'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
