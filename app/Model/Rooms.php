<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rooms extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'id_room_type',
        'square',
        'quantity',
        'id_building'
    ];
}
