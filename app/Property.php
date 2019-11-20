<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'user_name','status','property_name','prefecture','town','house_number','price','limit_price','full_price','build_month','structure','user_id','build_month',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
