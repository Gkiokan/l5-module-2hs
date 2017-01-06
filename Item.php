<?php

namespace Gkiokan\SecondHandShop;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    // Who have created this Item
    public function user(){
        return $this->belongsTo('App\User');
    }

    // The Customer itself
    public function customer(){
        return $this->belongsTo('Gkiokan\SecondHandShop\Customer');
    }

    // List all sold Items
    public static function sold(){
        return self::where('sold_at', '!=', null)->get();
    }

    // List all avaible Items (to sell)
    public static function open(){
        return self::where('expires_at', '>', Carbon::now())
                   ->where('sold_at', null)
                   ->get();
    }

    // List all Items which are over the limit
    public static function expired(){
        return self::where('expires_at', '<', Carbon::now())
                   ->where('sold_at', null)
                   ->get();
    }

}
