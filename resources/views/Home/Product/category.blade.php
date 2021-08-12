@extends('layout.app')

@section('tittle','Catagories')

@section('content')
<div class="row clearfix mb-4">
	<div class="col-md-6">
	<h3>Category List</h3>	
	</div>
	<div class="col-md-6 text-right">
    <div>
        
        <a href="{{ route('categories.create') }}" class="btn btn-primary"><b>+</b> Add Categories</a>
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
                        <th>Category tittle</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Category tittle</th>
                        <th class="text-right">Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                 	@foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name}}</td>
                        <td class="text-right">
                        {!! Form::open(['url' => 'categories/'.$category->id,'method'=>'delete']) !!}
                           <a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
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
