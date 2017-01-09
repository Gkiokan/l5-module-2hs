<?php

namespace Gkiokan\SecondHandShop;

use Illuminate\Database\Eloquent\Model;

use Auth;
use Carbon\Carbon;

class Receipt extends Model
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

    public function scopeBills($q){
        return $q->where('user_id', Auth::user()->id)
                 ->where('type', 'receipt')
                 ->orderBy('id', 'desc')
                 ->get();
    }


    public function scopeLastOpenReceipt($q){
        $bill = Receipt::where('status', false)->where('type', 'receipt')->first();

        if(!$bill):
          $bill = new Receipt();
          $bill->type = 'receipt';
          $bill->user_id = Auth::user()->id;
          $bill->save();
        endif;

        if($bill->items()->count() == 0):
          $bill->created_at = Carbon::now();
          $bill->updated_at = Carbon::now();
          $bill->save();
        endif;

        return $bill;
    }

}
