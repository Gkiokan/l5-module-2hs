<?php

namespace Gkiokan\SecondHandShop;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = '2hs_items';

    protected $dates = [
      'created_at',
      'updated_at',
      'expires_at',
      'sold_at',
      'limit_at'
    ];

    protected $fillable = [
        'item_nr', 'name', 'description', 'content', 'image', 'price', 'limit'      
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function customer(){
        return $this->belongsTo('Gkiokan\SecondHandShop\Customer');
    }


}
