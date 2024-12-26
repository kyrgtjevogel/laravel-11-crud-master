<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Snoep extends Model
{
    protected $fillable = [
    'naam',
    'value'  
];
protected $table = 'snoep';

    use HasFactory;
}
