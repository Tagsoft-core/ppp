<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'order_from',
        'ref_link',
        'pickup_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
