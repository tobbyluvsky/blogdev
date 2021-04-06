@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User List</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item active">User List</li>
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
                                    <h3 class="card-title">User List</h3>
                                    <a href="{{route('user.create')}}" class="btn btn-primary">Create User</a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th style="width: 40px">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>
                                                    <div style="max-width: 70px; max-height: 70px; overflow:hidden;">
                                                        <img src=" {{ $user->image }}" alt="" class="img-fluid">
                                                    </div>
                                                </td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email}}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('user.edit',[$user->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                                                    <form action="{{ route('user.destroy',[$user->id]) }}" class="mr-1" method="POST">
                                                       @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-sm  btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                                                    </form>

                                                    {{--<a href="{{ route('user.show',[$user->id]) }}" class="btn btn-sm  btn-success  mr-1"><i class="fas fa-eye"></i></a>--}}
                                                </td>
                                            </tr>
                                         @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="text-center d-flex justify-content-center mt-2">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>



    </div><!-- /.container-fluid -->

@endsection