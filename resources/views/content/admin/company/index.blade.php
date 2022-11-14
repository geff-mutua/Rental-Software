
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Manage Company')
  
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
      <h4 class="card-title">Manage Company</h4>
      <div class="pull-right">
       
        @if(count($company)==0)
        <button  data-toggle="modal" data-target="#addcompany" class="btn btn-sm btn-primary">Add Company</button>
        
        @endif
      </div>
    </div>
    <div class="card-body">
      <table class="table table-bordered table-responsive-sm mt-1 table-striped">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Website</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
          @forelse($company as $value)
            <tr>
              <td>{{$loop->iteration}}</td>
              <td>{{$value->name}}</td>
              <td>{{$value->address}}</td>
              <td>{{$value->mobile}}</td>
              <td>{{$value->email}}</td>
              <td>{{$value->website}}</td>
              <td>
                <span data-toggle="modal" data-target="#inlineForm" class="cursor-pointer" data-feather="edit"></span>
                {{-- <a href="{{route('company.destroy',['company'=>$value->id])}}" onclick="return confirm('Removing this company will remove all data associated with it')" data-feather="trash" class="text-danger cursor-pointer"></a> --}}
              </td>
              @include('content.admin.company.includes.edit-company')
            </tr>
          @empty
            
          @endforelse
          <tr>
       
          </tr>
          
        </tbody>
       
      </table>
    </div>
  </div>
  @include('content.admin.company.includes.add-company')
  
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
  

  