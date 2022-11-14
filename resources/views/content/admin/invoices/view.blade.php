@extends('layouts/contentLayoutMaster')

@section('title', 'Invoice Preview')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection
@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/pages/app-invoice.css') }}">
@endsection

@section('content')
    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">
                    <div class="card-body invoice-padding pb-0">
                        <!-- Header starts -->
                        <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
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
                        <!-- Header ends -->
                    </div>

                    <hr class="invoice-spacing" />

                    <!-- Address and Contact starts -->
                    <div class="card-body invoice-padding pt-0">
                        <div class="row invoice-spacing">
                            <div class="col-xl-8 p-0">
                                <h6 class="mb-2">Invoice To:</h6>
                                <h6 class="mb-25">{{$invoice->tenant->name}}</h6>
                                <p class="card-text mb-25">Contact: {{$invoice->tenant->mobile}}</p>
                                <p class="card-text mb-25">Room:{{$invoice->tenant->room->name}}</p>
                                <p class="card-text mb-25">Property:{{$invoice->tenant->room->property->name}}</p>
                                
                            </div>
                            <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                <h6 class="mb-2">Payment Details:</h6>
                                <table>
                                    <tbody>
                                        <tr>
                                            <td class="pr-1">--</td>
                                            {{-- <td><span class="font-weight-bold">$12,110.55</span></td> --}}
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Address and Contact ends -->

                    <!-- Invoice Description starts -->
                    <div class="table-responsive">
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

                    <div class="card-body invoice-padding pb-0">
                        <div class="row invoice-sales-total-wrapper">
                            <div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
                                <p class="card-text mb-0">
                                    <span class="font-weight-bold">Salesperson:</span> <span class="ml-75">{{auth()->user()->name}}</span>
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
                    </div>
                    
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card">
                    <div class="card-body">
                        {{-- <button class="btn btn-primary btn-block mb-75" data-toggle="modal"
                            data-target="#send-invoice-sidebar">
                            Send Invoice
                        </button> --}}
                        {{-- <button class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">Download</button> --}}
                        <a class="btn btn-outline-secondary btn-block mb-75" href="/print-invoice/{{ $invoice->id }}"
                            target="_blank">
                            Print
                        </a>
                      
                        {{-- <button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment-sidebar">
                            Add Payment
                        </button> --}}
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </section>

    <!-- Send Invoice Sidebar -->
    <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
        <div class="modal-dialog sidebar-lg">
            <div class="modal-content p-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
                <div class="modal-header mb-1">
                    <h5 class="modal-title">
                        <span class="align-middle">Send Invoice</span>
                    </h5>
                </div>
                <div class="modal-body flex-grow-1">
                    <form>
                        <div class="form-group">
                            <label for="invoice-from" class="form-label">From</label>
                            <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com"
                                placeholder="company@email.com" />
                        </div>
                        <div class="form-group">
                            <label for="invoice-to" class="form-label">To</label>
                            <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com"
                                placeholder="company@email.com" />
                        </div>
                        <div class="form-group">
                            <label for="invoice-subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="invoice-subject"
                                value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                        </div>
                        <div class="form-group">
                            <label for="invoice-message" class="form-label">Message</label>
                            <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="11"
                                placeholder="Message...">
Dear Queen Consolidated,

Thank you for your business, always a pleasure to work with you!

We have generated a new invoice in the amount of $95.59

We would appreciate payment of this invoice by 05/11/2019</textarea
            >
          </div>
          <div class="form-group">
            <span class="badge badge-light-primary">
              <i data-feather="link" class="mr-25"></i>
              <span class="align-middle">Invoice Attached</span>
            </span>
          </div>
          <div class="form-group d-flex flex-wrap mt-2">
            <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /Send Invoice Sidebar -->

<!-- Add Payment Sidebar -->
<div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
  <div class="modal-dialog sidebar-lg">
    <div class="modal-content p-0">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
      <div class="modal-header mb-1">
        <h5 class="modal-title">
          <span class="align-middle">Add Payment</span>
        </h5>
      </div>
      <div class="modal-body flex-grow-1">
        <form>
          <div class="form-group">
            <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
          </div>
          <div class="form-group">
            <label class="form-label" for="amount">Payment Amount</label>
            <input id="amount" class="form-control" type="number" placeholder="$1000" />
          </div>
          <div class="form-group">
            <label class="form-label" for="payment-date">Payment Date</label>
            <input id="payment-date" class="form-control date-picker" type="text" />
          </div>
          <div class="form-group">
            <label class="form-label" for="payment-method">Payment Method</label>
            <select class="form-control" id="payment-method">
              <option value="" selected disabled>Select payment method</option>
              <option value="Cash">Cash</option>
              <option value="Bank Transfer">Bank Transfer</option>
              <option value="Debit">Debit</option>
              <option value="Credit">Credit</option>
              <option value="Paypal">Paypal</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="payment-note">Internal Payment Note</label>
            <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
                        </div>
                        <div class="form-group d-flex flex-wrap mb-0">
                            <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Payment Sidebar -->
@endsection

@section('vendor-script')
    <script src="{{ asset('vendors/js/forms/repeater/jquery.repeater.min.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('js/scripts/pages/app-invoice.js') }}"></script>
@endsection
