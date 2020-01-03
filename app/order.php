<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    protected $fillable =[
        'id','shipping_address','phone_number','user_id','price'
    ];
}
