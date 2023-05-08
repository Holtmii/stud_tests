<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_Discipline extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_discipline',
        'id_group'
    ];
}
