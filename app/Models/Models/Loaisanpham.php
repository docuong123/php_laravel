<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loaisanpham extends Model
{
    protected $table = 'loaisanphams';
    protected $fillable = ['loaisanpham_ten','loaisanpham_mota','nhom_id'];
    public $timestamps = false;
}
