@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                    <li class="breadcrumb-item active">Edit Post</li>
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
                                    <h3 class="card-title">Edit Post - {{ $post->title }}</h3>
                                    <a href="{{route('post.index')}}" class="btn btn-primary">Back to Post List </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                     <form action="{{route('post.update',[$post->id])}}" method="post" enctype="multipart/form-data">
                                         @method('PUT')
                                         @csrf
                                        <div class="card-body">
                                            @include('includes.error')

                                            <div class="form-group">
                                                <label for="name">Post Title</label>
                                                <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="Enter Post Title">
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Post Category</label>

                                                <select name="category" id="category" class="form-control">
                                                    <option value="" selected>Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}" @if($post->category_id === $category->id) selected  @endif> {{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>


                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <!-- <label for="customFile">Custom File</label> -->
                                                        <label for="description">Post Image</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="image" class="custom-file-input" id="image">
                                                            <label class="custom-file-label" for="image">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div style="max-width: 100px; max-height: 100px; overflow:hidden; margin-left: auto;">
                                                            <img src=" {{ $post->image }}" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="Post tag">Post Tag</label>
                                                <div class="d-flex flex-wrap">
                                                @foreach($tags as $tag)
                                                    <div class="custom-control custom-checkbox" style="margin-right: 20px">
                                                        <input class="custom-control-input" name="tags[]" type="checkbox" id="tag{{$tag->id}}" value="{{ $tag->id }}"

                                                        @foreach($post->tags as $t)
                                                            @if($tag->id == $t->id) checked @endif
                                                        @endforeach
                                                        >
                                                        <label for="tag{{$tag->id}}" class="custom-control-label">
                                                            {{ $tag->name }}
                                                        </label>
                                                    </div>

                                                @endforeach
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Post Description</label>
                                                <textarea class="form-control"  name="description" id="description" cols="5">{{$post->description}}</textarea>
                                            </div>

                                        </div>

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
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