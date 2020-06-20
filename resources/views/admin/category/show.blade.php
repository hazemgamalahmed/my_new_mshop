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
                            <li class="breadcrumb-item active">Show Category: {{ $category->name }}</li>
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
                        <h2>Title: <br> {{ $category->name }}</h2>
                        <p>Description: <br> {{ $category->description }}</p>
                        @if ($category->parent)
                            Parent: <a href="{{ route('admin.categories.show', $category->parent) }}">{{ $category->parent->name }}</a>
                        @endif
                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-primary">Edit</a>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
