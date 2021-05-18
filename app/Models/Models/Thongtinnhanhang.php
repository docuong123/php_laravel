<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thongtinnhanhang extends Model
{
    protected $table = 'thongtinnhanhangs';
    protected $fillable = ['nguoinhan_ten','nguoinhan_sodienthoai','nguoinhan_diachi','nguoinhan_email','nguoinhan_ghichu'];
    public $timestamps = false;
}
