
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Payments')
  
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
        <a href="javascript:void(0)" data-target="#filterPayments" data-toggle="modal" class="btn btn-sm btn-secondary">Filter Payments</a>
      <div class="pull-right">
        <button data-toggle="modal" data-target="#payment-modal" class="btn btn-sm btn-primary">Post Payment</button>
        <a href="{{route('payments.print',['month'=>$month,'year'=>$year])}}" class="btn btn-sm btn-info">Print Payments</a>
        <a href="{{route('payments.receipts',['month'=>$month,'year'=>$year])}}" class="btn btn-sm btn-success">Print Receipts</a>
       
        
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
            <th>Tenant Name</th>
            <th>Amount</th>
            <th>Mode</th>
            <th>Reference</th>
            <th>Date Paid</th>
            <th>Month</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
            @forelse ($payments as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->tenant->name}}</td>
                  <td>{{number_format($item->amount)}}</td>
                  <td>{{$item->mode}}</td>
                  <td>{{$item->reference}}</td>
                  <td>{{Carbon\Carbon::Parse($item->date)->format('d-m-Y')}}</td>
                  <th>{{$item->month}}</th>
                  <td>
                   
                    <span class="text-danger cursor-pointer" data-feather="trash"></span>
                  </td>
                </tr>
            @empty
               
            @endforelse
        </tbody>
       
      </table>
    </div>
  </div>
  @include('content.admin.payments.create')
  @include('content.admin.payments.filter')
  
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
  

  