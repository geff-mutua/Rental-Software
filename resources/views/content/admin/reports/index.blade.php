@extends('layouts/contentLayoutMaster')

@section('title', 'Custom Reports')

@section('vendor-style')
    <!-- vendor css files -->
    <link rel='stylesheet' href="{{ asset('vendors/css/forms/select/select2.min.css') }}">
    <link rel='stylesheet' href="{{ asset('vendors/css/pickers/flatpickr/flatpickr.min.css') }}">
@endsection
@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/pickers/form-pickadate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/pickers/form-flat-pickr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/form-validation.css') }}">
@endsection

@section('content')

    <section class="invoice-preview-wrapper">
        <div class="row invoice-preview">
            <div class="col-xl-9 col-md-8 col-12">
                <div class="card invoice-preview-card">

                    <div class="card-body">
                        <div class="text-center">
                            <h2>Consolidated System Report</h2>
                            <small>Report</small>
                            <p>{{ $default['duration'] }}</p>
                        </div>
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <td><strong>MONTHLY OPERATING INCOME</strong></td>
                                    <td><strong>{{ strtoupper(config('settings.default_property')->name) }}</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Number Of Units</td>
                                    <td>{{ $default['incomes']['total_rooms'] }}</td>
                                </tr>
                                <tr>
                                    <td>Expected Rent Income</td>
                                    <td>{{ config('settings.currency') }}
                                        {{ number_format($default['incomes']['expected']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Income Received</td>
                                    <td>{{ config('settings.currency') }} {{ number_format($default['incomes']['paid']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Property Expenses</td>
                                    <td>{{ config('settings.currency') }}
                                        {{ number_format($default['expenses']['total']) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Gross Monthly Operating Income</strong></td>
                                    <td>
                                        <strong>
                                            {{ config('settings.currency') . ' ' . number_format(((float) $default['incomes']['paid']) - ((float) $default['expenses']['total'])) }}
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class=" text-center">
                            <h2>Recorded Expenses</h2>
                            <small>List of recorded expenses</small>
                            <p>{{ $default['duration'] }}</p>
                        </div>
                        <table class="table table-hover ">
                            <thead>
                                <tr>
                                    <td><strong>Descriptions</strong></td>
                                    <td><strong>Amount</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($default['expenses']['expenses'] as $item)
                                    <tr>
                                        <td>{{ $item->category->description }}</td>
                                        <td>{{ number_format($item->amount) }}</td>
                                    </tr>
                                @empty
                                @endforelse
                                <tr>
                                    <td><strong>TOTAL EXPENSES</strong></td>
                                    <td>
                                        <strong>
                                            {{ config('settings.currency') }}
                                            {{ number_format($default['expenses']['total']) }}
                                    </td>
                                    </strong>
                                </tr>

                            </tbody>
                        </table>
                        @if ($default['type'] == 'default')
                            <a href="/default-consolidate" class="btn btn-primary btn-sm">Print Report</a>
                        @elseif($default['type'] == 'date')
                            <a href="{{ route('print-date', ['start' => $default['start_date'], 'end' => $default['end_date']]) }}"
                                class="btn btn-primary">Print Report</a>
                        @elseif($default['type'] == 'month')
                            <a href="{{ route('print-month', ['month' => $default['month'], 'year' => $default['year']]) }}"
                                class="btn btn-primary">Print Report</a>
                        @else
                            <a href="{{ route('print-year', ['year' => $default['year']]) }}" class="btn btn-primary">Print
                                Report</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
                <div class="card">
                    <div class="card-body">
                       <h3>Filter Reports</h3>
                        <button data-toggle="modal" data-target="#filter-date" class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">By Dates</button>
                        <button data-toggle="modal" data-target="#filter-month" class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">By Month</button>
                      
                        <button class="btn btn-success btn-block" data-toggle="modal" data-target="#filter-year">
                            By Year
                        </button>
                    </div>
                </div>
                @include('content.admin.reports.by-year')
                @include('content.admin.reports.by-date')
                @include('content.admin.reports.by-month')
            </div>
        </div>
    </section>

@endsection

@section('vendor-script')

    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('js/scripts/pages/page-account-settings.js') }}"></script>
@endsection
