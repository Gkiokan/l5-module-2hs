<?php

namespace Gkiokan\SecondHandShop;

use Illuminate\Database\Eloquent\Model;

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
}
