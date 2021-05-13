<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    protected $table = 'nhacungcaps';
    protected $fillable = ['nhacungcap_ten','nhacungcap_diachi','nhacungcap_sdt'];
    public $timestamps = false;
}
