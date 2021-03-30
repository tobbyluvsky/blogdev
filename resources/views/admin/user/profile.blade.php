@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">User Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">user List</a></li>
                    <li class="breadcrumb-item active">User profile</li>
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
                                    <h3 class="card-title">Create User</h3>
                                    <a href="{{route('user.index')}}" class="btn btn-primary">Back to User List </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-9">
                                        <form action="{{route('user.profile.update')}}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            @include('includes.error')
                                            <div class="card-body">
                                               <div class="row">
                                                   <div class="col-6">
                                                       <div class="form-group">
                                                           <label for="name">User Name</label>
                                                           <input type="text" name="name" value="{{$user->name}}" class="form-control" id="name" placeholder="Enter user Name">
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="email">User Email</label>
                                                           <input type="email" value="{{$user->email}}" name="email" class="form-control" id="name" placeholder="Enter user Email">
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="password">User Password</label>
                                                           <input type="password" name="password" class="form-control" id="name" placeholder="Enter user Password">
                                                       </div>
                                                   </div>
                                                   <div class="col-6">
                                                       <div class="form-group">
                                                           <!-- <label for="customFile">Custom File</label> -->
                                                           <label for="description">Profile Image</label>
                                                           <div class="custom-file">
                                                               <input type="file" name="image" class="custom-file-input" id="image">
                                                               <label class="custom-file-label" for="image">Choose file</label>
                                                           </div>
                                                       </div>

                                                       <div class="form-group">
                                                           <label for="description"> Description</label>
                                                           <textarea class="form-control"  name="description" id="description" >{{$user->description}}</textarea>
                                                       </div>

                                                   </div>
                                               </div>


                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-lg btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="card">
                                            <div class="card-body text-center" >
                                                <div class=" m-auto" style="max-width: 300px; max-height: 300px; overflow:hidden;">
                                                    <img src=" {{ asset($user->image) }} " alt="{{$user->name}}" class="img-fluid rounded-circle img-rounded">
                                                </div>

                                                <div class="mt-2">
                                                    <h5>{{$user->name}}</h5>
                                                    <p>{{$user->email}}</p>
                                                </div>

                                            </div>

                                        </div>
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