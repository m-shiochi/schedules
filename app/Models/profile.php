<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    use HasFactory;
    
    // テーブルを固定
    protected $table = 'myprofile';
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'user_id' => 'required',
        'name' => 'required',
        'gender' => 'required',
        'introduction' => 'required',
    );
}
