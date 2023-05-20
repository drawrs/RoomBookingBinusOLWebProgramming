<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\RoomType;

class Room extends Model
{
    //

    protected $fillable = ['room_type_id', 'room_name', 'area', 'price', 'facility'];
    
    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'room_type_id');
    }

}
