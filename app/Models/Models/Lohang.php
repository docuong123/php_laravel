<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lohang extends Model
{
    protected $table = 'lohangs';
    protected $fillable = ['id','lohang_kyhieu','lohang_hansudung','lohang_giamuavao','lohang_giabanra','sanpham_id','lohang_tinhtrang','nhacungcap_id','lohang_soluongsp'];
    public $timestamps = true;
}
