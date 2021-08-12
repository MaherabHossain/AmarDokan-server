@extends('layout.app')

@section('tittle','Catagories')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h3>Category List</h3>	
	</div>
	<div class="col-md-6 text-right">
    <div>
        
        <a href="{{ route('products.create') }}" class="btn btn-primary"><b>+</b> Add Product</a>
    </div>
	</div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    	<h6 class="m-0 font-weight-bold text-primary">Users</h6>
    </div>
    <div class="card-body">
         @if(session('message'))
            <div class="alert alert-success" role="alert">
                <h5>{{ session('message') }}</h5>
            </div>
         @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>product name</th>
                        <th>product Category</th>
                        <th>Product price</th>
                        <th>Product discount</th>
                        <th>Main price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>product name</th>
                        <th>product Category</th>
                        <th>Product price</th>
                        <th>Product discount</th>
                        <th>Main price</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                 	@foreach($products as $product)
                     <div style="display:none">
                      {{$imgURL = "image/".$product->image_url1;}}
                     </div>
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><img src="{{asset($imgURL)}}" alt=""style="height:50px;"></td>
                        <td>{{ $product->name}}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>{{ $product->price}}</td>
                        <td>{{ $product->discount}}</td>
                        <td>{{ $product->price-(($product->discount*$product->price)/100) }}</td>
                        <td class="text-right">
                        {!! Form::open(['url' => 'products/'.$product->id,'method'=>'delete']) !!}
                           <a href="{{ route('products.edit',['product'=>$product->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                        	<button onclick="return confirm('Are you sure')" class="btn btn-danger mb-1 btn-sm"> <i class="fa fa-trash"></i> </button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@stop
