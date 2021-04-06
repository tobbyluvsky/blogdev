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
                                    <h3 class="card-title">Newsletter List</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Email</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @if($newsletter->count())
                                        @foreach($newsletter as $news)
                                            <tr>
                                                <td>{{ $news->id }}</td>
                                                <td>{{ $news->email }}</td>

                                                <td class="d-flex">


                                                    <form action="{{ route('newsletter.destroy',['id'=>$news->id]) }}" class="mr-1" method="POST">
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
                            <div class="text-center d-flex justify-content-center mt-2">
                                {{$newsletter->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



    </div><!-- /.container-fluid -->

@endsection