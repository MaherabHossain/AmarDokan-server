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
                        <th>Order ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Order ID</th>
                        <th>User Name</th>
                        <th>User Email</th>
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
                        <td>DOKAN{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->created_at->format('d M Y') }}</td>
                        <td class="text-right">
                        {!! Form::open(['url' => 'orders/'.$order->id,'method'=>'delete']) !!}
                           <a href="{{ route('orders.show',['id'=>$order->id]) }}" class="btn btn-success btn-sm"><i class="fa fa-eye"></i></a>
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
