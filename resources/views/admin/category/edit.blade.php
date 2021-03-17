@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between align-content-center">
                                    <h3 class="card-title">Edit Category - {{ $category->name }}</h3>
                                    <a href="{{route('category.index')}}" class="btn btn-primary">Back to Category List </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                     <form action="{{route('category.update',[$category->id])}}" method="post">
                                         @method('PUT')
                                         @csrf
                                        <div class="card-body">
                                            @include('includes.error')
                                            <div class="form-group">
                                                <label for="name">Category Name</label>
                                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="name" placeholder="Enter Category Name">
                                            </div>


                                                <div class="form-group">
                                                    <label for="description">Category Description</label>
                                                    <textarea class="form-control"  name="description" id="description" cols="5">{!!  $category->description !!}</textarea>
                                                </div>
                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



    </div><!-- /.container-fluid -->

@endsection