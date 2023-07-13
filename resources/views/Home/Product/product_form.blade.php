@extends('layout.app')

@section('tittle','Create Products')

@section('content')

<h3>{{ $headline }}</h3>
  <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Product</h6>
    </div>
    <div class="card-body">
      <div class="row justify-content-md-center">
	       <div class="col-md-6"> 
		    	@if ($errors->any())
		    		<div class="alert alert-danger">
		    			<ul>
		    				@foreach ($errors->all() as $error)
		    					<li>{{ $error }}</li>
		    				@endforeach
		    			</ul>
		    		</div>
		    	@endif
		   			@if (isset($products))
		   				{!! Form::model($products, [ 'route' => ['products.update', $products->id], 'method' => 'put','enctype'=>"multipart/form-data" ]) !!}
		   			@else
		   				{!! Form::open(['route' => 'products.store','method'=>'post','enctype'=>"multipart/form-data"]) !!}
		   			@endif
					   <div class="form-group">
					    <label for="title">Product name<i class="text-danger">*</i></labesl>
					    {{ Form::text('name',NULL,['class' => 'form-control','id'=> 'title', 'placeholder'=> 'Enter Products name'])}}
					  </div>
                      <div class="form-group">
					    <label for="title">Product price<i class="text-danger">*</i></label>
					    {{ Form::text('price',NULL,['class' => 'form-control','id'=> 'title', 'placeholder'=> 'Enter Products price'])}}
					  </div>
                     
                      <div class="form-group">
                      <div class="form-group">
                      
					  
                            
                        </select>
					  <!-- </div>
					    <label for="title">Product description<i class="text-danger">*</i></label>
					    {{ Form::textarea('description',NULL,['class' => 'form-control','id'=> 'title', 'placeholder'=> 'Enter Products description'])}}
					  </div> -->
                      <div class="form-group">
						  @if(isset($products->image_url1))
								<?php $url = "image/".$products->image_url1?>
								<img src="{{ asset($url) }}" alt="" style="height: 200px;display:block;margin-bottom: 10px;">
						  @endif
					   <label for="title">Product image 1<i class="text-danger">*</i></label>
					    {{ Form::file('image_url1',NULL,['class' => 'form-control','id'=> 'title', 'placeholder'=> 'Add Products image'])}}
					  </div>
                       <!-- <div class="form-group">
					  @if(isset($products->image_url2))
								<?php $url = "image/".$products->image_url2?>
								<img src="{{ asset($url) }}" alt="" style="height: 200px;display:block;margin-bottom: 10px;">
						  @endif
					    <label for="title">Product image 2<i class="text-danger">*</i></label>
					    {{ Form::file('image_url2',NULL,['class' => 'form-control','id'=> 'title', 'placeholder'=> 'Add Products image'])}}
					  </div>
                      <div class="form-group">
					  @if(isset($products->image_url3))
								<?php $url = "image/".$products->image_url3?>
								<img src="{{ asset($url) }}" alt="" style="height: 200px;display:block;margin-bottom: 10px;">
						  @endif
					    <label for="title">Product image 3<i class="text-danger">*</i></label>
					    {{ Form::file('image_url3',NULL,['class' => 'form-control','id'=> 'title', 'placeholder'=> 'Add Products image'])}}
					  </div>
                      <div class="form-group">
					  @if(isset($products->image_url4))
								<?php $url = "image/".$products->image_url4?>
								<img src="{{ asset($url) }}" alt="" style="height: 200px;display:block;margin-bottom: 10px;">
						  @endif
					    <label for="title">Product image 4<i class="text-danger">*</i></label>
					    {{ Form::file('image_url4',NULL,['class' => 'form-control','id'=> 'title', 'placeholder'=> 'Add Products image'])}}
					  </div> -->
					  <div class="text-right">
					  	<button type="submit" class="btn btn-primary">{{ $button }}</button>
					  </div>
				{!! Form::close() !!}
			  </div>
		 </div>
    </div>
 </div>

@stop