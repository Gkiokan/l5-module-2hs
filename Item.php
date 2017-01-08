<?php

namespace Gkiokan\SecondHandShop;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Auth;

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

    public function commission(){
        return $this->belongsToMany('Gkiokan\SecondHandShop\Commission', '2hs_bill_items', 'item_id', 'bill_id');
    }

    // Avaible Items on the commission
    public function scopeAvaibleItems($iib=null){
        return self::whereDoesntHave('commission', function($q) use ($iib){
               $q->whereNotIn('item_id', $iib);
        });
    }

    // All User Items
    public function scopeAllUserItems($q, $user_id){
        return $q->where('user_id', $user_id);
    }

    // Not sold items
    public function scopeNotSold($q, $user_id){
        return $q->where('sold_at', null)
                 ->where('user_id', $user_id);
    }

    // List all sold Items
    public function scopeSold($q, $user_id){
        return $q->where('sold_at', '!=', null)
                 ->where('user_id', $user_id);
    }

    // List all avaible Items (to sell)
    public function scopeOpen($q, $user_id){
        return $q->where('expires_at', '>', Carbon::now())
                   ->where('sold_at', null)
                   ->where('user_id', $user_id);
    }

    // List all Items which are over the limit
    public function scopeExpired($q, $user_id){
        return $q->where('expires_at', '<', Carbon::now())
                  ->where('sold_at', null)
                  ->where('user_id', $user_id);
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
