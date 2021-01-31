<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = "categories";
    protected $fillable = ['name'];
    public $timestamps = false;

    public function SubCategories()
    {
        return $this->hasMany('App\Subcategories', 'categories_id', 'id');
    }
}
