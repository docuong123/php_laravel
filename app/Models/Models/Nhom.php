<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhom extends Model
{
    protected $table = 'nhoms';
    protected $fillable = ['nhom_ten','nhom_mota'];
    public $timestamps = false;
}
