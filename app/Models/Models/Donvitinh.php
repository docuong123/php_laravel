<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donvitinh extends Model
{
    protected $table = 'donvitinhs';
	protected $fillable =['dovitinh_ten','donvitinh_mota'];
	public $timestamps = false;
}
