
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Statement')
  
  
  @section('content')
  
  
  <!--/ Column Search -->
  <div class="card">
    <div class="card-header border-bottom">
        <a href="javascript:void(0)" data-target="#filterPayments" data-toggle="modal" class="btn btn-sm btn-secondary">Filter Statement</a>
      <div class="pull-right">
       
        <a href="{{route('print.statements',['month'=>$month,'year'=>$year])}}" class="btn btn-sm btn-info">Print Statement</a>
        {{-- <a href="{{route('payments.receipts',['month'=>'September','year'=>'2022'])}}" class="btn btn-sm btn-success">Import</a> --}}
       
        
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
                <th>Tenant</th>
                
                <th>Rent</th>
               
                <th>bf</th>
                <th>Total</th>
                <th>Paid</th>
                <th>Balance</th>
                <th>Month</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($statements as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->tenant->name}}</td>
                    <td>{{number_format($item->rent)}}</td>
                    <td>{{number_format($item->bf)}}</td>
                    <td>{{number_format($item->total)}}</td>
                    <td>{{number_format($item->paid)}}</td>
                    <td>{{number_format($item->balance)}}</td>
                    <td>{{$item->month}}-{{$item->year}}</td>
                    <td>
                        {{-- <a href="{{route('tenants.edit',['tenant'=>$item->id])}}"><span class="text-warning cursor-pointer" data-feather="edit"></span></a> --}}
                        <span class="pl-2"></span>
                        <a href="{{route('tenant.profile',['tenant'=>$item->tenant->id])}}"><span class="text-success cursor-pointer" >View</span></a>
                        <span class="pl-2"></span>
                        <span class="text-danger cursor-pointer">Delete</span>
                    </td>
                </tr>
            
            @empty
                <tr class="text-center">
                  <td colspan="8">No Record found found</td>
                </tr>
            @endforelse
        </tbody>
       
      </table>
    </div>
  </div>
  @include('content.admin.statement.filter')
  
  @endsection
  
  @section('page-script')
    {{-- Page js files --}}
    <script src="{{ asset('js/scripts/tables/table-datatables-advanced.js') }}"></script>
    <script src="{{ asset('js/scripts/components/components-modals.js') }}"></script>
  @endsection
  

  