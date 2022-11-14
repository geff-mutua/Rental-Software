
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Manage Users')
  
  @section('vendor-style')
    {{-- vendor css files --}}
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
  @endsection
  
  @section('page-style')
  {{-- Page Css files --}}
  <link rel="stylesheet" type="text/css" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
  @endsection
  
  
  @section('content')
  
  
  <!--/ Column Search -->
  <div class="card">
    <div class="card-header border-bottom">
      <h4 class="card-title">@yield('title')</h4>
      <div class="pull-right">
        <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">Add User</a>
      </div>
    </div>
    <div class="card-body">
      @if(Session::has('message'))
      <div class="alert alert-info p-2">
          <p>{{Session::get('message')}}</p>
      </div>
      @endif
      <table class="table table-bordered table-responsive-sm mt-1 table-hover">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            
            <th>Role</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @forelse($users as $value)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->mobile}}</td>
              <td>{{$value->role}}</td>
              <td>
                <span data-toggle="modal" data-target="#inlineForm{{$value->id}}" class="cursor-pointer" data-feather="edit"></span>
                <a href="{{route('users.destroy',['user'=>$value->id])}}" onclick="return confirm('You are about to remove the selected user from the system')" data-feather="trash" class="text-danger cursor-pointer"></a>
              </td>
              @include('content.admin.users.includes.edit-users')
            </tr>
          @empty
            
          @endforelse
          <tr>
       
          </tr>
          
        </tbody>
       
      </table>
    </div>
  </div>
  @include('content.admin.users.includes.add-user')
  
  @endsection
  
  
  @section('vendor-script')
  {{-- vendor files --}}
    <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
  @endsection
  
  @section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/tables/table-datatables-advanced.js') }}"></script>
    <script src="{{ asset('js/scripts/components/components-modals.js') }}"></script>
  @endsection
  

  