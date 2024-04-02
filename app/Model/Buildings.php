<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buildings extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'address',
        'img'
    ];
}