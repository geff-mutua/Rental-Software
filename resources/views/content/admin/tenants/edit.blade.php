
@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Tenants')

@section('vendor-style')

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
              <a href="{{route('tenants.index')}}" class="btn btn-sm btn-primary">Go Back</a>
            </div>
          </div>
          <div class="card-body">
            <form action="{{route('tenants.update',['tenant'=>$tenant->id])}}" method="post" >
                @csrf
                @method('put')
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label> Name</label>
                    <input
                    type="text"
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{$tenant->name}}"
                    name="name"
                    placeholder="Tenant Name"
                    aria-describedby="name"
                    tabindex="1"
                    
                    autofocus
                  />
                  @error('name')
                  <span class="invalid-feedback" role="alert">
                     <p style="font-size: 10px">{{ $message }}</p>
                 </span>
                 @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="last-name-column">Email Address (optional)</label>
                    <input type="text" name="email" value="{{$tenant->email}}" placeholder="User Email Address @error('email') is-invalid @enderror""   class="form-control" />
                   
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="city-column">Mobile</label>
                    <input type="text" name="mobile" value="{{$tenant->mobile}}" required  placeholder="Enter Mobile Number" class="form-control @error('mobile') is-invalid @enderror" />
                    @error('mobile')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="last-name-column">Nation ID (optional)</label>
                    <input type="text" name="naid" value="{{$tenant->naid}}" placeholder="National ID"  class="form-control @error('naid') is-invalid @enderror"" />
                  </div>
                </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country-floating">Gender</label>
                    <select name="gender" class="form-control @error('gender') is-invalid @enderror" required id="">
                        <option value="{{$tenant->gender}}">{{$tenant->gender}}</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="form-group">
                      <label for="country-floating">Tenant Status</label>
                      <select name="status" class="form-control @error('status') is-invalid @enderror" required id="">
                         @if($tenant->status == '0')
                            <option value="0">Tenant Out</option>
                            @else
                            <option value="1">Tenant In</option>
                            
                            @endif
                          <option value="1">Tenant In</option>
                          <option value="0">Tenant Out</option>
                      </select>
                      @error('status')
                      <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                     @enderror
                    </div>
                  </div>

                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country-floating">Room Assigned</label>
                    <select name="room" class="form-control @error('room') is-invalid @enderror" required id="">
                        <option selected value="{{$tenant->room_id ? $tenant->room->id : null}}">{{$tenant->room_id ? $tenant->room->name : 'No Room Assinged'}}</option>
                        @forelse ($rooms as $item)
                            <option value="{{$item->id}}">{{config('settings.default_property')->name}} - {{$item->name}}</option>
                        @empty
                            
                        @endforelse
                    </select>
                    @error('room')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
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

