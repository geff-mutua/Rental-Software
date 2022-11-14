
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Manage Property')
  
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
        <a href="{{route('property.create')}}" class="btn btn-sm btn-primary">Add New</a>
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
            <th>#</th>
            <th>Name</th>
            <th>Location</th>
            <th>House Type</th>
            <th>Location Desc</th>
            
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
         @forelse ($property as $item)
         <tr>
          <td>{{$loop->iteration}}</td>
          <td>{{$item->name}}</td>
          <td>{{$item->location}}</td>
          <td>{{$item->type}}</td>
           <td>{{$item->location_description}}</td>
           <td>
            <span class="text-danger" data-feather="trash"></span>
            <span class="pr-2"></span>
            <a href="{{route('property.edit',['property'=>$item->id])}}"><span class="text-warning" data-feather="edit"></span></a>
           </td>
        </tr>
         @empty
             <tr class="text-center">
                  <td colspan="6">No Registered property found</td>
             </tr>
         @endforelse

          
        </tbody>
       
      </table>
    </div>
  </div>
  {{-- @include('content.admin.users.includes.add-user') --}}
  
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
  

  