<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'img_url', 'name', 'description', 'price', 'user_id', 'category', 'condition'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
