<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cupcake extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'quantity',
        'price',
        'is_available',
        'is_advertised',
    ];

    // public function user() {
    //     return $this->belongsTo(User::class);
    // }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_cupcake');
    }
}
