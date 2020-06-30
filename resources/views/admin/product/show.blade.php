@extends('layouts.app')
@section('title', 'Single Product')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">product Name : {{$product->name}}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Added By : {{$product->users->name}}</a></li>
                            <li class="breadcrumb-item active">Product Category : 
                            <a href = "{{route('admin.categories.show', $product->category->id)}}">{{$product->category->name}}
                            </a>
                            </li>
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
                    
                    </div>
                    </div>
                    <h1>
                    {{$product->name}}
                    </h1>
                    <p>
                    {{$product->description}}
                    </p>
                    <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-primary form-control">Edit</a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection