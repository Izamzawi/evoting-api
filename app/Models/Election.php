<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Election extends Model
{
    use HasFactory;

    protected $fillable = [
    ];

    // protected $casts = [
    //     'election_date' => 'datetime:Y-m-d',
    //     'end_date' => 'datetime:Y-m-d',
    // ];
}
