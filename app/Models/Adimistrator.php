<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adimistrator extends Model
{
    use HasFactory;

    protected $table = 'administrators';
    protected $guarded = ['id'];
}
