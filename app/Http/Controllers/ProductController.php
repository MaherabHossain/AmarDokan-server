<?php

namespace App\Http\Controllers;
use File;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['products'] = Product::all();
        return view('Home.Product.products',$this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['button'] = "Add Product";
        $this->data['headline'] = "Add Product";
        $this->data['categories'] = Category::all();
        return view('Home.Product.product_form',$this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function handleImage ($image) {
        $destinationPath = 'image/';
        $profileImage = rand() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $profileImage);
        return "$profileImage";
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image_url1' => 'required',
        ]);
        $input = $request->all();
        if ($image = $request->file('image_url1')) {
            $input['image_url1'] = $this->handleImage($image);
        }
        if ($image = $request->file('image_url2')) {
            $input['image_url2'] = $this->handleImage($image);
        }
        if ($image = $request->file('image_url3')) {
            $input['image_url3'] = $this->handleImage($image);
        }
        if ($image = $request->file('image_url4')) {
            $input['image_url4'] = $this->handleImage($image);
        }

        if(Product::create($input)){
            Session::flash('message','Product added Successfully!');
        }
        return redirect()->to('products');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->data['headline'] = "Update Product";
        $this->data['button'] = "update";
        $this->data['products'] = Product::findOrFail($id);
        $this->data['categories'] = Category::all();
        return view('Home.Product.product_form',$this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
        ]);
        $prevImg = Product::findOrFail($id);
        $prevImg1 = $prevImg->image_url1;
        $prevImg2 = $prevImg->image_url2;
        $prevImg3 = $prevImg->image_url3;
        $prevImg4 = $prevImg->image_url4;

        $input = $request->all();
        if ($image = $request->file('image_url1')) {
            $input['image_url1'] = $this->handleImage($image);
            if(File::exists($prevImg1)) {
                File::delete($prevImg1);
            }
        }else{
            $input['image_url1'] = $prevImg1;
        }
        if ($image = $request->file('image_url2')) {
            $input['image_url2'] = $this->handleImage($image);
            if(File::exists($prevImg2)) {
                File::delete($prevImg2);
            }
        }else{
            $input['image_url2'] = $prevImg2;
        }
        if ($image = $request->file('image_url3')) {
            $input['image_url3'] = $this->handleImage($image);
            if(File::exists($prevImg3)) {
                File::delete($prevImg3);
            }
        }else{
            $input['image_url3'] = $prevImg3;
        }
        if ($image = $request->file('image_url4')) {
            $input['image_url4'] = $this->handleImage($image);
            if(File::exists($prevImg4)) {
                File::delete($prevImg4);
            }
        }else{
            $input['image_url4'] = $prevImg4;
        }

        $product = Product::findOrFail($id);
        $product->name = $input['name'];
        $product->price = $input['price'];
        $product->discount = $input['discount'];
        $product->category_id = $input['category_id'];
        $product->discount = $input['discount'];
        $product->description = $input['description'];
        $product->image_url1 = $input['image_url1'];
        $product->image_url2 = $input['image_url2'];
        $product->image_url3 = $input['image_url3'];
        $product->image_url4 = $input['image_url4'];
        if($product->save()){
            Session::flash('message','Product updated Successfully!');
        }
        return redirect()->to('products');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($product->delete()){
            Session::flash('message','Product deleted Successfully!');
        }
        return redirect()->to('products');
    }
}
