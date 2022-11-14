@extends('layouts/contentLayoutMaster')

@section('title', 'Invoices')


@section('content')

<section id="page-account-settings">
    <div class="card">
        <div class="card-header border-bottom">
            {{-- <a href="javascript:void(0)" data-target="#filterPayments" data-toggle="modal" class="btn btn-sm btn-secondary">Filter</a> --}}
            <h4>System Invoices</h4>
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
                    <th>Contacts</th>
                    <th>Total</th>
                    <th>Month</th>
                    <th>Status</th>
                    <th>Action</th>
                   
                </tr>
            </thead>
            <tbody>
               @forelse($invoices as $key => $value)
               <tr>
                <td>{{$key+=1}}</td>
                <td>{{$value->tenant->name}}</td>
                <td>{{$value->tenant->mobile}}</td>
                <td><strong>{{number_format($value->total)}}</strong></td>
                <td>{{$value->month}}</td>
                @include('content.admin.invoices.statuses')
                <td>
                    <a href="/invoices/print/{{$value->id}}"><span class="fa fa-file-pdf-o text-danger" title="Get the Invoice"><small class="px-2 text-success">Get Invoice</small></span></a>
                </td>

            </tr>
               @empty
                
               @endforelse
            </tbody>
           
          </table>
        </div>
      </div>
</section>

@endsection

