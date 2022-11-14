
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Expenses Categories')
  
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
      
        <button data-toggle="modal" data-target="#payment-modal" class="btn btn-sm btn-primary">New Category</button>
  
      
    </div>
    <div class="card-body">
      @if(Session::has('message'))
      <div class="alert alert-info p-2">
          <p>{{Session::get('message')}}</p>
      </div>
      @endif

      <table class="dt-responsive table">
        <thead>
          <tr>
            <th>#</th>
            <th>Expense Description</th>  
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
            @forelse ($categories as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->description}}</td>
                    <td><a href="{{route('expenditure.catdel',['id'=>$item->id])}}" class="text-danger"> <span class="text-danger cursor-pointer" data-feather="trash"></span> Remove</a></td>
                </tr>
            @empty
                <tr class="text-center">
                    <td colspan="3">No Category Registered</td>
                </tr>
            @endforelse
        </tbody>
      </table>
      
    </div>
  </div>
  @include('content.admin.expenses.category.create')
 
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
  

  