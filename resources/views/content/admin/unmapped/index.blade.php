
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Unmapped Payments')

  @section('vendor-style')
      {{-- vendor css files --}}
      <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
      <link rel="stylesheet" href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
  @endsection

  @section('page-style')
      {{-- Page Css files --}}
      <link rel="stylesheet" type="text/css" href="{{ asset('css/base/plugins/forms/pickers/form-flat-pickr.css') }}">
  @endsection
  
@section('content')


    <!--/ Column Search -->
    <div class="card">
        <div class="card-header border-bottom">
            <h4>Unmapped Payments</h4>
        </div>
        <div class="card-body">
            @if (Session::has('message'))
                <div class="alert alert-info p-2">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif
            <table class="dt-responsive table" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>A/c No</th>
                        <th>Amount</th>
                        <th>Mode</th>
                        <th>Reference</th>
                        <th>Date Paid</th>
                        <th>Mobile</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($unmapped as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="cursor-pointer"><b data-toggle="modal"
                                data-target="#map{{ $value->id }}">{{ ucwords(strtolower($value->first_name)) . ' ' . $value->middle_name . ' ' . ucwords(strtolower($value->last_name)) }}</b>
                            </td>
                            <td>{{ $value->bill_ref_number }}</td>
                            <td>{{ number_format($value->transaction_amount) }}
                            <td>Mpesa Api</td>
                            <td>{{ $value->transaction_id }}</td>
                            <td>{{ Carbon\Carbon::parse($value->created_at)->toDayDateTimeString() }}</td>
                            <td>{{ $value->msisdn }}</td>
                            <td wire:ignore>
                                <span  class="text-success cursor-pointer" data-toggle="modal"
                                    data-target="#map{{ $value->id }}" >Map</span>
                                {{-- <a href=""><span class="text-danger cursor-pointer"
                                        data-feather="trash"></span></a> --}}
                            </td>
                            @include('content.admin.unmapped.map')
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="9">No Unmapped Payments</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>

    @section('page-script')

        <script src="{{ asset('js/scripts/components/components-modals.js') }}"></script>
    @endsection

    @endsection
