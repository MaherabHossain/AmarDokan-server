<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return response($categories);
    }
    public function categoryProduct($id){
        $category = Category::findOrFail($id);
        return $category->product;
        // return return response()->json($data, 200, $headers);
    }
}
