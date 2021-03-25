@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Post List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active">Post List</li>
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
                                    <h3 class="card-title">Post List</h3>
                                    <a href="{{route('post.create')}}" class="btn btn-primary">Create post</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Author</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if($posts->count())
                                        @foreach($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    <div style="max-width: 70px; max-height: 70px; overflow:hidden;">
                                                        <img src=" {{ $post->image }}" alt="" class="img-fluid">
                                                    </div>
                                                </td>
                                                <td>{{ $post->title}}</td>
                                                <td>{{ $post->category->name}}</td>
                                                <td>
                                                    @foreach($post->tags as $tag)
                                                      <span class="btn btn-sm btn-primary">{{$tag->name}}</span>
                                                    @endforeach

                                                </td>
                                                <td>{{ $post->user->name }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('post.destroy',[$post->id]) }}" class="mr-1" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm  btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>

                                                    <a href="{{ route('post.show',[$post->id]) }}" class="btn btn-sm  btn-success  mr-1"><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td colspan="5">
                                            <h3 class="text-center">No posts available </h3>
                                        </td>
                                    @endif

                                    </tbody>
                                </table>
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