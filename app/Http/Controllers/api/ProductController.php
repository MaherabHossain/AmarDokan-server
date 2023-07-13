<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $response = array(
            "success" => true,
            "data" => $products
        );
        
        // Convert the PHP array to JSON
        $jsonResponse = json_encode($response);

        return  response($jsonResponse);

    }
}
