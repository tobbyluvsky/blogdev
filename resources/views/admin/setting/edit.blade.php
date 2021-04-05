@extends('layouts.admin')

@section('content')

    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Edit Settings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('setting.index') }}">setting List</a></li>
                    <li class="breadcrumb-item active">Edit Settings</li>
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
                                    <h3 class="card-title">Edit Settings</h3>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-8 offset-lg-2 col-md-8 offset-md-2">
                                     <form action="{{route('setting.update')}}" method="POST" enctype="multipart/form-data">

                                         @csrf
                                        <div class="card-body">
                                            @include('includes.error')

                                            <div class="form-group">
                                                <label for="name">setting Title</label>
                                                <input type="text" name="name" value="{{$setting->name}}" class="form-control" id="title" placeholder="Enter setting Title">
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Facebook</label>
                                                        <input type="text" name="facebook" value="{{$setting->facebook}}" class="form-control" id="title" placeholder="Enter setting Title">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Twitter</label>
                                                        <input type="text" name="twitter" value="{{$setting->twitter}}" class="form-control" id="title" placeholder="Enter setting Title">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Instagram</label>
                                                        <input type="text" name="instagram" value="{{$setting->instagram}}" class="form-control" id="title" placeholder="Enter setting Title">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Reddit</label>
                                                        <input type="text" name="reddit" value="{{$setting->reddit}}" class="form-control" id="title" placeholder="Enter setting Title">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Email</label>
                                                        <input type="text" name="email" value="{{$setting->email}}" class="form-control" id="title" placeholder="Enter setting Title">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Phone Number</label>
                                                        <input type="text" name="phone_no" value="{{$setting->phone_no}}" class="form-control" id="title" placeholder="Enter setting Title">
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Address</label>
                                                        <textarea class="form-control" name="address" >{!! $setting->address !!}</textarea>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="name">Copyright</label>
                                                        <input type="text" name="copyright" value="{{$setting->copyright}}" class="form-control" id="title" placeholder="Enter setting Title">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <!-- <label for="customFile">Custom File</label> -->
                                                        <label for="description">Site Logo</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="site_logo" class="custom-file-input" id="image">
                                                            <label class="custom-file-label" for="image">Choose file</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-4">
                                                        <div style="max-width: 100px; max-height: 100px; overflow:hidden; margin-left: auto;">
                                                            <img src=" {{ $setting->site_logo }}" alt="" class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="form-group">
                                                <label for="description">setting Description</label>
                                                <textarea class="form-control"  name="description" id="description" cols="5">{{$setting->description}}</textarea>
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