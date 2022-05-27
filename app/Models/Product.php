<?php

namespace App\Models;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable        = ['name','price','category_id','description','discount','image_url1','image_url2','image_url3','image_url4'];
    use HasFactory;

    public function category(){
    	return $this->belongsTo(Category::class);
    }
}
