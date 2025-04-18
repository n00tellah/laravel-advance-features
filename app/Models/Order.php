<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use Notifiable;
    protected $fillable = [
        'item',
        'item_price',
        'item_quantity',
        'payment_method',
    ];

    public function users():BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
