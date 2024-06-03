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
        'slug',
        'description',
        'order_from',
        'ref_link',
        'pickup_date',
        'status',
        'qr_code'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug('PPP-'. $value. rand(0, 9999), '-');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
