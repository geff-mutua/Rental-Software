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
        <!-- general -->
        <li class="nav-item">
          <a
            class="nav-link active"
            id="account-pill-general"
            data-toggle="pill"
            href="#account-vertical-general"
            aria-expanded="true"
          >
            <i data-feather="user" class="font-medium-3 mr-1"></i>
            <span class="font-weight-bold">Paybill Configuration</span>
          </a>
        </li>
 
       
        <!-- notification -->
        {{-- <li class="nav-item">
          <a
            class="nav-link"
            id="account-pill-notifications"
            data-toggle="pill"
            href="#account-vertical-notifications"
            aria-expanded="false"
          >
            <i data-feather="bell" class="font-medium-3 mr-1"></i>
            <span class="font-weight-bold">Notifications</span>
          </a>
        </li> --}}
      </ul>
    </div>
    <!--/ left menu section -->

    <!-- right content section -->
    <div class="col-md-9">
      <div class="card">
        <div class="card-body">
          <div class="tab-content">
            <!-- general tab -->
            <div
              role="tabpanel"
              class="tab-pane active"
              id="account-vertical-general"
              aria-labelledby="account-pill-general"
              aria-expanded="true"
            >

              <!-- form -->
              <form action="/register-shortcode" method="POST">
                @csrf
                <div class="row">
                   
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label for="account-username">Mpesa Short Code</label>
                      <input
                        type="number"
                        class="form-control @error('shortcode') is-invalid @enderror"
                        id="account-username"
                        name="shortcode"
                        placeholder="Shortcode"
                        value="{{old('shortcode')}}"
                      />
                      @error('shortcode')
                      <span class="invalid-feedback" role="alert">
                         <p style="font-size: 10px">{{ $message }}</p>
                     </span>
                     @enderror
                    </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label for="account-name">Shortcode Type</label>
                    <select class="form-control @error('shortcode_type') is-invalid @enderror"  name="shortcode_type" id="">
                      <option value="">--select--</option>
                      <option value="CustomerPayBillOnline">PayBill</option>
                      <option value="CustomerBuyGoodsOnline">Till Number</option>
                    </select>
                    @error('shortcode_type')
                    <span class="invalid-feedback" role="alert">
                       <p style="font-size: 10px">{{ $message }}</p>
                   </span>
                   @enderror
                    </div>
                  </div>
                  
                 
                  <div class="col-12 mt-75">
                    <div class="alert alert-warning mb-50 p-2" role="alert">
                      <p>Make sure you post valid shortcode integrated with safaricom with our confirmation and validation endpoint. emails info@geocadict.com for more details</p>
                      
                    </div>
                  </div>
                  <div class="col-12">
                    <button type="submit" class="btn btn-primary mt-2 mr-1">Add to list</button>
                    
                  </div>
                </div>
              </form>
              <br>
              <h4>Available Shortcodes</h4>
              <br>
              <!--/ form -->
              <table class="dt-responsive table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ShortCode</th>
                        <th>Shortcode Type</th>
                        <th>Action</th>
                        
                       
                    </tr>
                </thead>
                <tbody>
                  @forelse ($shortcodes as $item)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->shortcode}}</td>
                        <td>{{$item->shortcode_type}}</td>
                        <td>
                          <a href="/remove-shortcode/{{$item->id}}" onclick="return confirm('Do you want to remove this shortcode?')"><span class="text-danger cursor-pointer" data-feather="trash"></span></a>
                        </td>
                      </tr>
                  @empty
                      <tr class="text-center">
                        <td colspan="4">No Shortcodes Registered</td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!--/ general tab -->



            <!-- notifications -->
            <div
              class="tab-pane fade"
              id="account-vertical-notifications"
              role="tabpanel"
              aria-labelledby="account-pill-notifications"
              aria-expanded="false"
            >
              <div class="row">
                <h6 class="section-label mx-1 mb-2">Payments</h6>
                <div class="col-12 mb-2">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch1" />
                    <label class="custom-control-label" for="accountSwitch1">
                       Email me once payment is received via endpoint
                    </label>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch2" />
                    <label class="custom-control-label" for="accountSwitch2">
                      Email me when new property is registered
                    </label>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="accountSwitch3" />
                    <label class="custom-control-label" for="accountSwitch3">Email me when tenant is onboarded</label>
                  </div>
                </div>
                <h6 class="section-label mx-1 mt-2">Application</h6>
                <div class="col-12 mt-1 mb-2">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch4" />
                    <label class="custom-control-label" for="accountSwitch4">Email me When Invoices are created</label>
                  </div>
                </div>
                <div class="col-12 mb-2">
                  <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" checked id="accountSwitch6" />
                    <label class="custom-control-label" for="accountSwitch6">Email me When Payments failed to be mapped</label>
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
