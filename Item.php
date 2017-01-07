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
        return self::where('sold_at', '!=', null);
    }

    // List all avaible Items (to sell)
    public static function open(){
        return self::where('expires_at', '>', Carbon::now())
                   ->where('sold_at', null);
    }

    // List all Items which are over the limit
    public static function expired(){
        return self::where('expires_at', '<', Carbon::now())
                   ->where('sold_at', null);
    }


    // Automatic calculates the time by limit or expire date
    public function auto_detect_expire_time($request){
        if(!empty($request->expires_at)):
            $this->expires_at = $request->expires_at;
            $this->content = $this->content . ' exp upd. + ';
            $this->limit   = Carbon::now()->diffInWeeks(Carbon::parse($request->expires_at . ' 23:59'));
        else:
            $this->expires_at  = Carbon::now()->addWeeks($request->limit);
            $this->content = $this->content . ' Auto calc. upd. ';
        endif;
    }

}
