<?php

namespace Gkiokan\SecondHandShop;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Customer extends Model
{
    protected $table = '2hs_customers';

    protected $fillable = [
      'kdnr', 'company_id',
      'firstname', 'lastname', 'bday',
      'street', 'plz', 'city', 'state', 'country',
      'tel', 'mobil', 'email'
    ];

    public static function byUserID($id){
        return self::where('user_id', $id);
    }

    public function items(){
        return $this->hasMany('Gkiokan\SecondHandShop\Item');
    }


    /*
        Clearing out the Item Count calls
    */
    public function open_items(){
        return $this->items()
                    ->where('expires_at', '>', Carbon::now())
                    ->where('sold_at', null)->count();
    }

    public function all_items(){
        return $this->items()->count();
    }

    public function sold_items(){
        return $this->items()
                    ->where('sold_at', '!=', null)->count();
    }

    public function expired_items(){
        return $this->items()
                    ->where('expires_at', '<', Carbon::now())
                    ->where('sold_at', null)
                    ->count();
    }

    // <td> {{ \Gkiokan\SecondHandShop\Item::sold()->where('customer_id', $customer->id)->count() }} </td>
}
