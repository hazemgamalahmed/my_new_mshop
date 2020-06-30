@extends('layouts.app')

@section('title', 'All Products')

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
                            <li class="breadcrumb-item active">All Categories</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col">
                                <form class="form-group">
                                <input type="nubmer" name="limit"  required/>
                                <button type="submit" class="btn btn-primary" >Limit</button>
                                </form>
                            </div>
                            
                        <div class="col">
                        <form class="form-group" method="get">
                        <input type="text" name="search" class="form-control" placeholder="search"/>
                        <button class="btn btn-info" type="submit">Search</button>
                        <a href="{{route('admin.products.index')}}" class="btn btn-primary">Reset</a>
                        </form>
                        </div>
                        <div class="col">
                        <a href="{{route('admin.products.create')}}" class="btn btn-success"> <i class="fa fa-plus"></i>Add Product</a>
                        </div>
                        </div>



                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                            <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->name}}</td>
                            <td>
                            <a href="{{route('admin.categories.show', $product->category->id)}}">
                            {{$product->category->name}}</a></td>
                            <td>{{$product->users->name}}</td>
                            <td>
                            <a href="{{route('admin.products.show', $product)}}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i> Show</a>
                            <a href="{{route('admin.products.edit', $product)}}" class="btn btn-primary"><i class="fa fa-edit"></i>Edit</a>
                            <form style="display:inline-block" method = "POST" action="{{route('admin.products.destroy', $product)}}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fa fa-eraser" aria-hidden="true"></i> Delete</button>
                            </form>
                            </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="text-center">
                        {!! $products->links() !!}
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection