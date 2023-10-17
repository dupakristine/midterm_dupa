<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milktea extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'flavor', 'price', 'size', 'addons'];
}
