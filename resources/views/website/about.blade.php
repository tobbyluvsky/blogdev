@extends('layouts.home')

@section('content')


  <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{asset('website/images/img_4.jpg')}});">
    <div class="container">
      <div class="row same-height justify-content-center">
        <div class="col-md-12 col-lg-10">
          <div class="post-entry text-center">
            <h1 class="">About Us</h1>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="site-section bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 order-md-2">
          <img src="@if($user->image){{asset($user->image)}} @else {{asset('website/images/avatar.png')}} @endif" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-5 mr-auto order-md-1">
          <h2>{{$user->name}}</h2>
          <p>{!! $user->description !!}</p>

        </div>
      </div>
    </div>
  </div>





  <div class="site-section bg-lightx">
    <div class="container">
      <div class="row justify-content-center text-center">
        <div class="col-md-5">
          <div class="subscribe-1 ">
            @if(Session::has('success'))
              <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            <h2>Subscribe to our newsletter</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit nesciunt error illum a explicabo, ipsam nostrum.</p>
            <form action="{{route('newsletter.store')}}" method="post" class="p-5 bg-white">
              @csrf
              @include('includes.error')
              <input type="email" name="email" class="form-control" placeholder="Enter your email address">
              <input type="submit" class="btn btn-primary" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection