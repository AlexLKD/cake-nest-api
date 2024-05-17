<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function cupcake() {
    //     return $this->hasMany(Cupcake::class);
    // }

    public function cupcakes()
    {
        return $this->belongsToMany(Cupcake::class, 'order_cupcake')
                    ->withPivot('quantity')
                    ->withPivot('total_price');
    }
}
