<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
     protected $table ='sanphams';
    protected $fillable = ['id','sanpham_ten','sanpham_mota','sanpham_anh','loaisanpham_id','donvitinh_id','sanpham_khuyenmai'];
    public $timestamps =true;
}
