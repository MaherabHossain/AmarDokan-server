@extends('layout.app')

@section('tittle','Catagories')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h3>Order List</h3>	
	</div>
	<div class="col-md-6 text-right">
    
	</div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
    	<h6 class="m-0 font-weight-bold text-primary">Orders</h6>
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
                    <th>Order ID</th>
                    <th>Product Name</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Address</th>
                        <th>User Phone</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>User cash app tag</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                    <th>Order ID</th>
                   
                        <th>Product Name</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User Address</th>
                        <th>User Phone</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Payment Method</th>
                        <th>User cash app tag</th>
                        <th>Payment Status</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                 	@foreach($orders as $order)
                     {{-- <div style="display:none">
                      {{$imgURL = "image/".$product->image_url1;}}
                     </div> --}}
                    <tr>
                        <td>MOR{{ $order->id }}</td>
                        @php
        $product = App\Models\Product::find($order->product_id);
    @endphp
                        <td>{{ $product->name }}</td>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->email }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone_number }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->amount }}</td>
                        
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->cash_app_tag }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->order_status }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td class="text-right">
                        {!! Form::open(['url' => 'orders/'.$order->id,'method'=>'delete']) !!}
                           <!-- <a href="{{ route('orders.show',['id'=>$order->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a> -->
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
