<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    //

    protected $fillable = [
            'trans_id',
            'room_id',
            'days',
            'sub_total_room',
            'extra_charge'
    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'trans_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

}
