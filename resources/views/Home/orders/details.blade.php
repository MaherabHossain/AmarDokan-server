@extends('layout.app')

@section('tittle','sale invoice')

@section('content')
<div class="row clearfix mb-4" >
	<div class="col-md-4">
	<h3 >Order details</h3>	
	</div>

	<div class="col-md-8 text-right">
		<a href="#" class="btn btn-info btn-sm"><i class="fa fa-save"> print invoice</i></a>
	</div>
</div>


    <div class="col-md-9">
    	<div class="card shadow mb-4">
			@if(Session::has('message'))
    <div class="alert alert-success">
        <p>{{ Session::get('message') }}</p>
    <div>
        </div>
        </div>
@endif
@if(Session::has('error'))
    <div class="alert alert-success">
        <p>{{ Session::get('error') }}</p>
    <div>
@endif

            <div class="card shadow mb-4">
			    </div>
			    <div class="card-body">
			    	<div class="row clearfix justify-content-md">
			    		<div class="col-md-6 ">
			    			<p><strong>customer : </strong>{{ $order->name }}</p>
			    			<p> <strong>Email :</strong> </strong>{{ $order->email }}</p>
			    			<p> <strong>Phone : </strong>{{ $order->phone_number }}</p>
			    			<p> <strong>Address : </strong>{{ $order->address }}</p>
			    		</div>

			    		<div class="col-md-6 ">
			    			<p><strong>Date : </strong>{{ $order->created_at->format('d M Y') }}</p>
			    			<p> <strong>Payment from : </strong>{{ $order->paymentNumber }}</p>
			    			<p> <strong>Transaction ID : </strong>{{ $order->trxId }}</p>
			    			<p> 
                                <div class="container">
                                    <div class="row">
                                        <strong class="mr-2">Status : </strong>
                                        <form action="{{ route('orders.edit', ['id'=>$order->id]) }}" class="mr-2" method="post" >
                                            @method("PUT")
                                            @csrf
                                            
                                            <select id="status" name="status" class="form-control">
                                                
                                                <option value="pending" {{ $order->status=="pending"?"selected":""}}>pending</option>
                                                <option value="accepted"{{ $order->status=="accepted"?"selected":""}}>accepted</option>
                                                <option value="shipping"{{ $order->status=="shipping"?"selected":""}}>shipping</option>
                                                <option value="delivery complete"{{ $order->status=="delivery complete"?"selected":""}}>delivery complete</option>
                                              </select>           
                                              <button class="btn btn-success mt-2" >Update</button>
                                         </form>
                                    
                                      
                                    </div>
                                  </div>
                               
                        
                        
                        </p>
			    		</div>
			    	</div>	
			    	<table class="table table-borderless">
			    		<thead>
			    			<th>SL</th>
			    			<th>Product</th>
			    			<th>Quantity</th>
			    			<th>Price</th>
			    			<th>Total</th>
			    			<th></th>
			    		</thead>
			    		<tfoot>
			    		</tfoot>

			    		<tbody>
							<?php $i=0; $total = 0;?>
			    			@foreach ($cart as $cart)							
			    			<tr>
			    				<td>{{ $cart->id }}</td>
			    				<td>{{ $cart->name }}</td>
			    				<td>{{ $cart->quantity }}</td>
			    				<td>{{ $cart->price }}</td>
			    				<td>{{ $cart->total }}</td>
							
			    			
			    				<td>
			    				<form action="#" method="post" >
			                        @csrf
									@method('delete')  
									<button onclick="return  confirm('Are you sure?')"  type="submit" class="btn btn-danger btn-sm"> 
			                            <i class="fa fa-trash"></i>  
			                          </button> 
									</form>
			    				</td>
			    			</tr>
							@endforeach		    						    		
			    			<th>
			    			</th>
			    			<th colspan="3" class="text-right">Total : </th>
			    			<th>{{ $order->total }} $</th>
			    			<th></th>
			    			<tr>
			    				<td colspan="4" class="text-right"><strong> Pay : </strong></td>
			    			
			    			</tr>
			    			<tr>
			    				<td colspan="4" class="text-right"><strong> Due : </strong></td>
			    				<td  class="text-left"><strong> 
                                   
                                    </strong></td>
			    			</tr>

			    		</tbody>
			    	</table>
			    </div>
			  </div>                 
		</div>
    </div>
</div>
@stop

