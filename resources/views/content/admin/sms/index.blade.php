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
                            <span class="font-weight-bold">Sms Configuration</span>
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

                            <!-- change password -->
                            <div class="tab-pane active" id="account-vertical-password" role="tabpanel"
                                aria-labelledby="account-pill-password" aria-expanded="false">
                                <!-- form -->
                                <form action="/update-sms" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-old-password">Preffered Gateway</label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <select name="gateway"
                                                        class="form-control @error('gateway') is-invalid @enderror"
                                                        id="">
                                                        {{-- <option value="">--Select--</option> --}}
                                                        <option value="AfricasTalking">AfricasTalking</option>
                                                    </select>
                                                    @error('gateway')
                                                        <span class="invalid-feedback" role="alert">
                                                            <p style="font-size: 10px">{{ $message }}</p>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-old-password">Sender ID</label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input type="text"
                                                        class="form-control @error('sender_id') is-invalid @enderror"
                                                        id="account-old-password" name="sender_id"
                                                        value="{{ $settings['sender_id'] }}" placeholder="Sender Id" />
                                                    @error('sender_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <p style="font-size: 10px">{{ $message }}</p>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-new-password">Username|App Key</label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input type="text" id="account-new-password" name="app_key"
                                                        value="{{ $settings['app_key'] }}"
                                                        class="form-control @error('app_key') is-invalid @enderror"
                                                        placeholder="App Key" />
                                                    @error('app_key')
                                                        <span class="invalid-feedback" role="alert">
                                                            <p style="font-size: 10px">{{ $message }}</p>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <div class="form-group">
                                                <label for="account-retype-new-password">Secret Key</label>
                                                <div class="input-group form-password-toggle input-group-merge">
                                                    <input type="password"
                                                        class="form-control @error('secret_key') is-invalid @enderror"
                                                        id="account-retype-new-password" name="secret_key"
                                                        value="{{ $settings['secret_key'] }}" placeholder="Secret Key" />
                                                    @error('secret_key')
                                                        <span class="invalid-feedback" role="alert">
                                                            <p style="font-size: 10px">{{ $message }}</p>
                                                        </span>
                                                    @enderror

                                                </div>
                                            </div>
                                        </div>

                                    
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary mr-1 mt-1">Update</button>

                                        </div>
                                    </div>
                                </form>
                                <!--/ form -->
                            </div>
                            <!--/ change password -->


                            <!-- notifications -->
                            <div class="tab-pane fade" id="account-vertical-notifications" role="tabpanel"
                                aria-labelledby="account-pill-notifications" aria-expanded="false">
                                <div class="row">
                                    <h6 class="section-label mx-1 mb-2">Payments</h6>
                                    <div class="col-12 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" checked
                                                id="accountSwitch1" />
                                            <label class="custom-control-label" for="accountSwitch1">
                                                Email me once payment is received via endpoint
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" checked
                                                id="accountSwitch2" />
                                            <label class="custom-control-label" for="accountSwitch2">
                                                Email me when new property is registered
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="accountSwitch3" />
                                            <label class="custom-control-label" for="accountSwitch3">Email me when tenant
                                                is onboarded</label>
                                        </div>
                                    </div>
                                    <h6 class="section-label mx-1 mt-2">Application</h6>
                                    <div class="col-12 mt-1 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" checked
                                                id="accountSwitch4" />
                                            <label class="custom-control-label" for="accountSwitch4">When Invoices are
                                                created</label>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" checked
                                                id="accountSwitch6" />
                                            <label class="custom-control-label" for="accountSwitch6">When Payments failed
                                                to be mapped</label>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Save changes</button>

                                    </div>
                                </div>
                            </div>
                            <!--/ notifications -->
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
