<?php

namespace Gkiokan\SecondHandShop;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Commission extends Model
{
    protected $table = '2hs_bills';

    protected $fillable = [
        'nr', 'status', 'date', 'pay_date', 'paid_at'
    ];

    protected $dates = [
        'pay_date', 'date'
    ];


    public function items(){
        return $this->belongsToMany('Gkiokan\SecondHandShop\Item', '2hs_bill_items', 'bill_id', 'item_id');
    }

    public function avaible_items($iib){
        // return $this->items()->wherePivot('item_id', '!=', null);
        // return self::doesntHave('Items');
        return self::whereDoesntHave('items', function($q) use ($iib){
            $q->whereNotIn('item_id', $iib);
        });
    }

    public function scopeBills($q){
        return $q->where('user_id', Auth::user()->id)
                 ->where('type', 'commission')
                 ->get();
    }
}
