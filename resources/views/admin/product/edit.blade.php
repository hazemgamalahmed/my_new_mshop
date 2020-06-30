@extends('layouts.app')
@section('title', 'Edit Product')

@section('content')
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Edit Product</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/"></a></li>
                            <li class="breadcrumb-item active">Product Category : 
                            
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
                    <h1 class="text-center text-primary"> Edit Category</h1>
                   <form method="POST" action="{{route('admin.products.update', $product)}}">
                   @method('PUT')
                   @include('admin.product.form')
                   <div class="text-center">
                   <button type="submit" class="btn btn-primary form-control">Edit Category</button>
                   </div>
                   </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection