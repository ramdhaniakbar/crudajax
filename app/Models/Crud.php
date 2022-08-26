<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Crud extends Model
{
    use SoftDeletes;
    protected $table = 'product';
    protected $fillable = ['name'];
    protected $hidden;
}
