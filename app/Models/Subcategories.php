<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $table = "subcategories";
    protected $fillable = ['categories_id','name'];
    public $timestamps = false;
    
    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }
}
