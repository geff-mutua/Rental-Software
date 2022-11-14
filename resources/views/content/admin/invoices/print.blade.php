@extends('layouts/fullLayoutMaster')

@section('title', 'Invoice Print')

@section('page-style')
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice-print.css')}}">
@endsection

@section('content')
<div class="invoice-print p-3">
  <div class="d-flex justify-content-between flex-md-row flex-column pb-2">
    <div>
        <div class="logo-wrapper">
            <img src="{{asset('logo/'.$logo)}}" alt="">
            
        </div>
        <p class="card-text mb-25">{{config( 'settings.company')[0]->name}} </p>
        <p class="card-text mb-25">{{config( 'settings.company')[0]->address}}</p>
        <p class="card-text mb-0">Contact: {{config( 'settings.company')[0]->mobile}}</p>
        <p class="card-text mb-0">Mail: {{config( 'settings.company')[0]->email}}</p>
    </div>
    <div class="mt-md-0 mt-2">
        <h4 class="invoice-title">
            Invoice
            <span class="invoice-number">HGMD67{{$invoice->id}}</span>
        </h4>
        <div class="invoice-date-wrapper">
            <p class="invoice-date-title">Date Created:</p>
            <p class="invoice-date">{{$invoice->created_at}}</p>
        </div>
        <div class="invoice-date-wrapper">
            <p class="invoice-date-title">Invoice Status:</p>
            <p class="invoice-date">{{$invoice->status}}</p>
        </div>
    </div>
  </div>

  <hr class="my-2" />

  <div class="row pb-2">
    <div class="col-sm-6">
        <h6 class="mb-2">Invoice To:</h6>
        <h6 class="mb-25">{{$invoice->tenant->name}}</h6>
        <p class="card-text mb-25">Contact: {{$invoice->tenant->mobile}}</p>
        <p class="card-text mb-25">Room:{{$invoice->tenant->room->name}}</p>
        <p class="card-text mb-25">Property:{{$invoice->tenant->room->property->name}}</p>
    </div>
    <div class="col-sm-6 mt-sm-0 mt-2">
      <h6 class="mb-1">Payment Details:</h6>
      <table>
        <tbody>
         
        </tbody>
      </table>
    </div>
  </div>

  <div class="table-responsive mt-2">
    <table class="table">
        <thead>
            <tr>
                <th class="py-1">Task Description</th>
                <th class="py-1">Rate</th>
                <th class="py-1">Qty</th>
                <th class="py-1">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="py-1">
                    <p class="card-text font-weight-bold mb-25">Rent Repayment</p>
                    <p class="card-text text-nowrap">
                        Monthly Rent Repayment for {{$invoice->month}}
                    </p>
                </td>
                
                <td class="py-1">
                    <span class="font-weight-bold">{{number_format($invoice->tenant->room->rent)}}</span>
                </td>
                <td class="py-1">
                    <span class="font-weight-bold">1</span>
                </td>
                <td class="py-1">
                    <span class="font-weight-bold">{{number_format($invoice->tenant->room->rent)}}</span>
                </td>
            </tr>
            @if($invoice->balance > 0)
            <tr class="border-bottom">
                <td class="py-1">
                    <p class="card-text font-weight-bold mb-25">Previous Balances</p>
                    <p class="card-text text-nowrap">Total Accumulated Balances from previous months</p>
                </td>
                <td class="py-1" colspan="2">
                    <span class="font-weight-bold">{{number_format($invoice->bf)}}</span>
                </td>
               
                <td class="py-1">
                    <span class="font-weight-bold">{{number_format($invoice->bf)}}</span>
                </td>
            </tr>
            @endif
            @if($invoice->paid > 0)
            <tr class="border-bottom">
                <td class="py-1">
                    <p class="card-text font-weight-bold mb-25">Less Received Payments</p>
                    <p class="card-text text-nowrap">Total Amount received so far.</p>
                </td>
                <td class="py-1" colspan="2">
                    <span class="font-weight-bold"> (-) {{number_format($invoice->paid)}}</span>
                </td>
               
                <td class="py-1">
                    <span class="font-weight-bold">(-){{number_format($invoice->paid)}}</span>
                </td>
            </tr>
            @endif
        </tbody>
    </table>
  </div>

  <div class="row invoice-sales-total-wrapper mt-3">
    <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
      <p class="card-text mb-0">
        <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">Alfie Solomons</span>
      </p>
    </div>
    <div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
      <div class="invoice-total-wrapper">
        <div class="invoice-total-item">
          <p class="invoice-total-title">Subtotal:</p>
          <p class="invoice-total-amount">{{number_format($invoice->balance)}}</p>
        </div>
        <div class="invoice-total-item">
          <p class="invoice-total-title">Discount:</p>
          <p class="invoice-total-amount">0</p>
        </div>
       
        <hr class="my-50" />
        <div class="invoice-total-item">
          <p class="invoice-total-title">Total:</p>
          <p class="invoice-total-amount">{{number_format($invoice->balance)}}</p>
        </div>
      </div>
      
    </div>
  </div>

  <hr class="my-2" />


</div>
@endsection

@section('page-script')
<script src="{{asset('js/scripts/pages/app-invoice-print.js')}}"></script>
@endsection