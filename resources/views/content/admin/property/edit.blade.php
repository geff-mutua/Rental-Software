
@extends('layouts/contentLayoutMaster')

@section('title', 'Create Property')

@section('vendor-style')
<link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
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
            <form action="{{route('property.update',['property'=>$property->id])}}" method="post" >
              @method('put')
                @csrf
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="first-name-column"> Name</label>
                    <input type="text" name="name" required value="{{$property->name}}" class="form-control" />
                    @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="last-name-column">Location</label>
                    <select class="form-control" name="county">
                        <option selected value="{{$property->location}}">{{$property->location}}</option>
                         @include('utils.counties')
                    </select>
                    @error('county')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="city-column">Location Description</label>
                   <textarea name="location_desc" class="form-control" id="" cols="10" rows="1">{{$property->location_description}}</textarea>
                    @error('mobile')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country-floating">House Type</label>
                    <select name="type" class="form-control" id="">
                        <option value="{{$property->type}}">{{$property->type}}</option>
                        <option value="Rental Apartment">Rental Apartment</option>
                        <option value="Hotel">Hotel</option>
                        <option value="Guest House">Guest House</option>
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>

                {{-- <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="city-column">Google Map Location (Optional)</label>
                    //   <input type="text" class="form-control" value="{{$property->location_map}}" name="location_map" id="">
                    //   @error('mobile')
                    //   <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    //  @enderror
                    <input type="text" class="form-control" id="search_input" placeholder="Type address..." />
                    <input type="text" id="loc_lat" />
                    <input type="text" id="loc_long" />
                    <p><b>Latitude:</b> <span id="latitude_view"></span></p>
                    <p><b>Longitude:</b> <span id="longitude_view"></span></p>
                    </div>
                  </div> --}}

                  <div class="col-md-6 col-12">
                    <div class="form-group">
                    
                        <label for="">House Features (Optional)</label>
                        <select name="features[]" id="" class="select2 form-control" multiple>
                            @forelse (json_decode($property->features) as $key => $item)
                            <option selected value="{{$item}}">{{$item}}</option>
                              
                            @empty
                                
                            @endforelse

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
                  <button type="submit" class="btn btn-primary mr-1">Update</button>
                 
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
{{-- <script>
    var searchInput = 'search_input';

    $(document).ready(function () {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
        });
        
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var near_place = autocomplete.getPlace();
            document.getElementById('loc_lat').value = near_place.geometry.location.lat();
            document.getElementById('loc_long').value = near_place.geometry.location.lng();
            
            document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
            document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
        });
    });

    $(document).on('change', '#'+searchInput, function () {
        document.getElementById('latitude_input').value = '';
        document.getElementById('longitude_input').value = '';
        
        document.getElementById('latitude_view').innerHTML = '';
        document.getElementById('longitude_view').innerHTML = '';
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyAQJS45lUCPo5nY1gA9EYtmvtvbhuwm4AU"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
  <script src="{{ asset('js/scripts/forms/form-select2.js') }}"></script> 
@endsection

