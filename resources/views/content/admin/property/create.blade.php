
@extends('layouts/contentLayoutMaster')

@section('title', 'Create Property')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
@endsection
@section('page-style')
  {{-- Page css files --}}

@endsection

@section('content')
<section >
    <div class="row">
      <div class="col-12">
          @if(Session::has('message'))
          <div class="alert alert-info p-2">
              <p>{{Session::get('message')}}</p>
          </div>
          @endif
        <div class="card">
          <div class="card-header">
            <h4 class="card-title">@yield('title')</h4>
            <div class="pull-right">
              <a href="{{route('property.index')}}" class="btn btn-sm btn-primary">Manage Property</a>
            </div>
          </div>
          <div class="card-body">
            <form action="{{route('property.store')}}" method="post" >
                @csrf
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="first-name-column"> Name</label>
                    <input type="text" name="name" required placeholder="Enter Name" class="form-control" />
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="last-name-column">Location</label>
                    <select class="form-control" name="location" id="">
                      @include('utils.counties')

                    </select>
                    @error('location')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="city-column">Location Description</label>
                   <textarea name="location_desc" class="form-control" id="" cols="10" rows="1"></textarea>
                    @error('location_desc')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country-floating">House Type</label>
                    <select name="type" class="form-control" id="">
                        <option value="">-- Select Property Type --</option>
                        <option value="Rental Apartment">Rental Apartment</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Guest House">Guest House</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="city-column">Google Map Location (Optional)</label>
                      <input type="text" class="form-control" name="location_map" id="">
                      @error('location_map')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                     @enderror
                    </div>
                  </div>

                  <div class="col-md-6 col-12">
                    <div class="form-group">
                    
                        <label for="">House Features (Optional)</label>
                        <select name="features[]" id="" class="select2 form-control" multiple>
                            <option value="Swimming Pool">Swimming Pool</option>
                            <option value="Air Conditioning">Air Conditioning</option>
                            <option value="Lawn">Lawn</option>
                            <option value="Outdoor">Outdoor</option>
                            <option value="Gym">Gym</option>
                            <option value="Window Covering">Window Covering</option>
                            <option value="Wireless Internet">Wireless Internet</option>
                            <option value="TV Cable">TV Cable</option>
                            <option value="Laundry">Laundry</option>
                            <option value="Back Yard">Back Yard</option>
                           
                          
                       </select>
                       </div>
                  </div>
                
                
                <div class="col-12">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                 
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset('js/scripts/forms/form-select2.js') }}"></script>
@endsection

