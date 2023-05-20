<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = ['trans_code',
'trans_date',
'cust_name',
'total_room_price',
'total_extra_charge',
'final_total'
    ];
    
    public function detailTransaction()
    {
        return $this->hasOne(DetailTransaction::class, 'trans_id');
    }

}
