@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Create Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                    <li class="breadcrumb-item active">View Post</li>
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
                                    <h3 class="card-title">View Post  -  <strong>{{ $post->title }}</strong></h3>
                                    <a href="{{route('post.index')}}" class="btn btn-primary">Back to Post List </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tbody>

                                    <tr>
                                        <th style="width: 300px;">Post Image</th>
                                        <td>
                                            <div style="max-width: 500px; max-height: 500px; overflow:hidden;">
                                                <img src=" {{ $post->image }}" alt="" class="img-fluid">
                                            </div>
                                        </td>
                                    </tr>

                                      <tr>
                                          <th style="width: 300px;">Post Title</th>
                                          <td>{{ $post->title }}</td>
                                      </tr>


                                    <tr>
                                        <th style="width: 300px;">Post Category</th>
                                        <td>{{ $post->category->name }}</td>
                                    </tr>

                                    <tr>

                                        <th style="width: 300px;">Post Tags</th>
                                        <td>
                                            @foreach($post->tags as $tag)
                                                <span class="btn btn-sm btn-primary">{{$tag->name}}</span>
                                            @endforeach

                                        </td>
                                    </tr>

                                    <tr>
                                        <th style="width: 300px;">Author</th>
                                        <td>{{ $post->user->name }}</td>
                                    </tr>

                                    <tr>
                                        <th style="width: 300px;">Post Description</th>
                                        <td>{!!$post->description  !!} </td>
                                    </tr>


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
