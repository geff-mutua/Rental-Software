@extends('layouts/contentLayoutMaster')

@section('title', 'Account Settings')

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
    <!-- account setting page -->
    <section id="page-account-settings">
        <div class="row">
            <!-- left menu section -->
            <div class="col-md-3 mb-2 mb-md-0">
                <ul class="nav nav-pills flex-column nav-left">
                    <li class="nav-item">
                        <a class="nav-link active" id="account-pill-password" data-toggle="pill"
                            href="#account-vertical-password" aria-expanded="false">
                            <i data-feather="lock" class="font-medium-3 mr-1"></i>
                            <span class="font-weight-bold">Notifications</span>
                        </a>
                    </li>


                </ul>
            </div>
            <!--/ left menu section -->

            <!-- right content section -->
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="tab-pane active" id="account-vertical-notifications" role="tabpanel"
                                aria-labelledby="account-pill-notifications" aria-expanded="false">
                                <form action="/update-notifications" method="post">
                                    @csrf
                                
                                <div class="row">
                                    <h6 class="section-label mx-1 mb-2">System Notifications</h6>
                                    <div class="col-12 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="when_api_payment_received" class="custom-control-input" id="accountSwitch1"
                                                @if ($settings['when_api_payment_received'] == 1) checked @endif />
                                            <label class="custom-control-label" for="accountSwitch1">
                                                Email me when a payment has been received via endpoint
                                            </label>
                                        </div>
                                    </div>

                                    <h6 class="section-label mx-1 mt-2">Application</h6>
                                    <div class="col-12 mt-1 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="when_invoices_created" class="custom-control-input"
                                                @if ($settings['when_invoices_created'] == 1) checked @endif id="accountSwitch4" />
                                            <label class="custom-control-label" for="accountSwitch4">Email me when Invoices have been
                                                created</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" name="when_mapping_failed" class="custom-control-input"
                                                @if ($settings['when_mapping_failed'] == 1) checked @endif id="accountSwitch6" />
                                            <label class="custom-control-label" for="accountSwitch6">Email me when Payments have failed to be mapped</label>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-retype-new-password">Sms Notification Date</label>
                                            
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="date"
                                                    class="form-control @error('sms_date') is-invalid @enderror"
                                                    id="account-retype-new-password" name="sms_date"
                                                    value="{{ \Carbon\Carbon::parse($settings['sms_date'])->format('Y-m-d') }}" />
                                                @error('sms_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <p style="font-size: 10px">{{ $message }}</p>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="account-retype-new-password">Invoice Creation Date</label>
                                            <div class="input-group form-password-toggle input-group-merge">
                                                <input type="date"
                                                    class="form-control @error('invoice_date') is-invalid @enderror"
                                                    id="account-retype-new-password" name="invoice_date"
                                                    value="{{ \Carbon\Carbon::parse($settings['invoice_date'])->format('Y-m-d') }}" />
                                                @error('invoice_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <p style="font-size: 10px">{{ $message }}</p>
                                                    </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Update Changes</button>

                                    </div>
                                </div>
                            </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--/ right content section -->
        </div>
    </section>
    <!-- / account setting page -->
@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset('vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset('js/scripts/pages/page-account-settings.js') }}"></script>
@endsection
