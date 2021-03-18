@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Tag List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active">Tag List</li>
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
                                    <h3 class="card-title">Tag List</h3>
                                    <a href="{{route('tag.create')}}" class="btn btn-primary">Create Tag</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Post Count</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if($tags->count())
                                        @foreach($tags as $tag)
                                            <tr>
                                                <td>{{ $tag->id }}</td>
                                                <td>{{ $tag->name }}</td>
                                                <td>{{ $tag->slug}}</td>
                                                <td>{{ $tag->id }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('tag.edit',[$tag->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('tag.destroy',[$tag->id]) }}" class="mr-1" method="POST">
                                                       @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm  btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>

                                                    <a href="{{ route('tag.show',[$tag->id]) }}" class="btn btn-sm  btn-success  mr-1"><i class="fas fa-eye"></i></a>
                                                </td>
                                            </tr>
                                         @endforeach
                                        @else
                                           <td colspan="5">
                                              <h3 class="text-center">No tags available </h3>
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