<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline_Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_discipline',
        'id_subject'
    ];

}
