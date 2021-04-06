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
                                    <a href="{{route('contact.index')}}" class="btn btn-primary">Back to Contact List </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered table-hover">
                                    <tbody>

                                      <tr>
                                          <th style="width: 300px;">Name</th>
                                          <td>{{ $contact->name }}</td>
                                      </tr>


                                    <tr>
                                        <th style="width: 300px;">Email</th>
                                        <td>{{ $contact->email }}</td>
                                    </tr>

                                      <tr>
                                          <th style="width: 300px;">Subject</th>
                                          <td>{{ $contact->subject }}</td>
                                      </tr>


                                      <tr>
                                        <th style="width: 300px;">Message</th>
                                          <td ><p>{!! $contact->message !!}</p></td>
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
