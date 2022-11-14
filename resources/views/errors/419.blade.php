@php
  $pageConfigs=[
    'theme'=>'dark',
];
@endphp


@extends('layouts/fullLayoutMaster')

@section('title', 'Request Failed')

@section('page-style')
<link rel="stylesheet" href="{{asset('css/base/pages/page-misc.css')}}">
@endsection

@section('content')
<!-- Not authorized-->
<div class="misc-wrapper">

  <div class="misc-inner p-2 p-sm-3">
    <div class="w-100 text-center">
      <h2 class="mb-1">Facing some trouble? 🔐</h2>
      <h6>You dont have to worry. Click refresh button to get you going. It happens sometimes when invalidated information gets passed to the system and fails to verify the request.</h6>
     <div>
        <a class="btn btn-primary mb-1 btn-sm-block" href="{{route('home')}}">Refresh</a>
     </div>

   <div>
    <img class="img-fluid" src="{{asset('images/pages/not-authorized-dark.svg')}}" alt="Not authorized page" />

   </div>
    </div>
  </div>
</div>
<!-- / Not authorized-->
</section>
<!-- maintenance end -->
@endsection
