
@extends('layouts/contentLayoutMaster')

@section('title', 'Create User')

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
              <a href="{{route('users.index')}}" class="btn btn-sm btn-primary">Manage Users</a>
            </div>
          </div>
          <div class="card-body">
            <form action="{{route('users.store')}}" method="post" >
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
                    <label for="last-name-column">Email Address</label>
                    <input type="text" name="email" placeholder="User Email Address" required  class="form-control" />
                    @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="city-column">Mobile</label>
                    <input type="text+" name="mobile" required  placeholder="Enter Mobile Number" class="form-control" />
                    @error('mobile')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-group">
                    <label for="country-floating">User Role</label>
                    <select name="role" class="form-control" id="">
                        <option value="">-- Select Role --</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                    @error('role')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                   @enderror
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

