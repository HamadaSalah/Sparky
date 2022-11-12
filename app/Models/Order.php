<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'subcat_id' => 'array',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function category() {
        return $this->hasOne('App\Models\Category', 'id', 'cat_id');
    }
    public function subcategory() {
        return $this->hasMany('App\Models\Category', 'id',  'subcat_id');
    }
    public function books() {
        return $this->hasMany(Book::class);
    }
    public function employee() {
        return $this->hasOne('App\Models\Employee', 'id', 'employee_id');
    }

}
