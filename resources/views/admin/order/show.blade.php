@extends('layouts.app')

@section('title', 'All Categories')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Categories</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">admin</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">categories</a></li>
                            <li class="breadcrumb-item active">Show Category:</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-body">
                        <h2>Client Name: {{ $order->client->name }}<br> </h2>
                        
                     <table class="table table-bordered">
                      <thead>
                          <tr>
                              <td>product Name</td>
                              <td>quantity of the product</td>
                              <td>price of the product</td>
                          </tr>
                      </thead> 
                      <tbody>
                            @foreach($order->products as $product)
                          <tr>
                              <td>{{$product->name}}</td>
                              <td>{{$product->pivot->price}}</td>
                              <td>{{$product->pivot->quantity}}</td>
                              <td>{{$product->pivot->total}}</td>
                          </tr>
                          @endforeach
                      </tbody>  
                     </table>
                            
                       
                        <a href="{{route('admin.orders.edit', $order->id)}}" class="btn btn-primary" class="form-control">Edit</a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
