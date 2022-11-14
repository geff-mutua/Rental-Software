
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Room Management')
  
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
        <a data-toggle="modal" data-target="#add" href="javascript:void(0)" class="btn btn-sm btn-primary">Add Room</a>

      </div>
    </div>
    <div class="card-body">
      @if(Session::has('message'))
      <div class="alert alert-info p-2">
          <p>{{Session::get('message')}}</p>
      </div>
      @endif
      <table class="dt-responsive table" id="myTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Room Code</th>
            <th>Name</th>
            <th>Rent Amount</th>
            <th>Room Status</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
        
         @forelse ($rooms as $item)
             <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{number_format($item->rent)}}</td>
              <td>{{$item->status}}</td>
              <td>
                <a href="#" data-toggle="modal" data-target="#edit{{$item->id}}"><span class="text-warning cursor-pointer" >Edit</span></a>
                {{-- <span class="pl-2"></span> --}}
                {{-- <span class="text-success cursor-pointer" data-feather="eye"></span> --}}
                <span class="pl-2"></span>
                <span class="text-danger cursor-pointer">Delete</span>
              </td>
               @include('content.admin.rooms.edit')
             </tr>
         @empty
             <tr class="text-center">
              <td colspan="5">No Rooms Registered</td>
             </tr>
         @endforelse
          
        </tbody>
       
      </table>
    </div>
  </div>
  @include('content.admin.rooms.create')
  
  @endsection
  
  
  @section('page-script')
    {{-- Page js files --}}
    {{-- <script src="{{ asset('js/scripts/tables/table-datatables-a/dvanced.js') }}"></script> --}}
    <script src="{{ asset('js/scripts/components/components-modals.js') }}"></script>
  @endsection
  

  