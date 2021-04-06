@extends('layouts.admin')

@section('content')


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">DASHBOARD</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
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
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$postsCount}}</h3>

                        <p>Posts</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$categoriesCount}}</h3>

                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$tagsCount}}</h3>

                        <p>Tags</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{$usersCount}}</h3>
                        <p>Users</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>

                </div>
            </div>
            <!-- ./col -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-content-center">
                            <h3 class="card-title">Post List</h3>
                            <a href="{{route('post.index')}}" class="btn btn-primary">Create post</a>
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
                                <th>Created at</th>
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
                                        <td>{{ $post->created_at->diffForHumans()}}</td>
                                        <td class="d-flex">

                                            <a href="{{ route('post.show',[$post->id]) }}" class="btn btn-sm  btn-success  mr-1"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                                            <form action="{{ route('post.destroy',[$post->id]) }}" class="mr-1" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-sm  btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                            </form>


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


    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->


@endsection
