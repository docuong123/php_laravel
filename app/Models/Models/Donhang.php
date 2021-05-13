<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = "donhangs";

    protected $fillable = ['id','donhang_tongtien','thongtinnhanhang_id','khachhang_id','tinhtranghd_id'];

	public $timestamps = true;
}
