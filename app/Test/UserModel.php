<?php

namespace App\Test;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['name','pwd'];
    public $timestamps = false; //不需要laravel自动管理创建时间和更新时间
}
