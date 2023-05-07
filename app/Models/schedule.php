<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class schedule extends Model
{
    use HasFactory;
    
    // テーブルを固定
    protected $table = 'myschedules';
    
    // 以下をValidation
    protected $guarded = array('id');
    
    public static $rules = array(
        'user_id' => 'required',
        'title' => 'required',
        'date' => 'required',
        'location' => 'required',
        'body' => 'required',
    );
    
}
