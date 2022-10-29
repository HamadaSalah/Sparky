<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
     
    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }
    public function books() {
        return $this->hasMany(Book::class);
    }
}
