
@extends('layouts/contentLayoutMaster')

@section('title', 'Pricing')

@section('page-style')
{{-- Page Css files --}}
<link rel="stylesheet" type="text/css" href="{{asset('css/base/pages/page-pricing.css')}}">
@endsection

@section('content')
<section id="pricing-plan">
  <!-- title text and switch button -->
  <div class="text-center">
    <h1 class="mt-5">Pricing Plans</h1>
    <p class="mb-2 pb-75">
      All plans include advanced tools and features to boost your product. Choose the best plan to fit your needs.
    </p>
    <div class="d-flex align-items-center justify-content-center mb-5 pb-50">
      <h6 class="mr-1 mb-0">Monthly</h6>
      <div class="custom-control custom-switch">
        <input type="checkbox" class="custom-control-input" id="priceSwitch" />
        <label class="custom-control-label" for="priceSwitch"></label>
      </div>
      <h6 class="ml-50 mb-0">Annually</h6>
    </div>
  </div>
  <!--/ title text and switch button -->

  <!-- pricing plan cards -->
  <div class="row pricing-card">
    <div class="col-12 col-sm-offset-2 col-sm-10 col-md-12 col-lg-offset-2 col-lg-10 mx-auto">
      <div class="row">
        <!-- basic plan -->
        <div class="col-12 col-md-4">
          <div class="card basic-pricing text-center">
            <div class="card-body">
              <img src="{{asset('images/illustration/Pot1.svg')}}" class="mb-2 mt-5" alt="svg img" />
              <h3>Starter</h3>
              <p class="card-text">A simple start for everyone</p>
              <div class="annual-plan">
                <div class="plan-price mt-2">
                  <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                  <span class="pricing-basic-value font-weight-bolder text-primary">10</span>
                  <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/month</sub>
                </div>
                <small class="annual-pricing d-none text-muted"></small>
              </div>
              <ul class="list-group list-group-circle text-left">
                <li class="list-group-item"> Manage Up to 1 Property</li>
                <li class="list-group-item"> Unlimited Units Management</li>
                <li class="list-group-item"> Unlimited System Users</li>
                <li class="list-group-item"> Document Management</li>
                <li class="list-group-item"> Debt Control</li>
                <li class="list-group-item"> Data Security</li>
                <li class="list-group-item"> 24/7 Support</li>

              </ul>
              <button class="btn btn-block btn-outline-success mt-2">Subscribe Now</button>
            </div>
          </div>
        </div>
        <!--/ basic plan -->

        <!-- standard plan -->
        <div class="col-12 col-md-4">
          <div class="card standard-pricing popular text-center">
            <div class="card-body">
              <div class="pricing-badge text-right">
                <div class="badge badge-pill badge-light-primary">Most Popular</div>
              </div>
              <img src="{{asset('images/illustration/Pot2.svg')}}" class="mb-1" alt="svg img" />
              <h3>Business</h3>
              <p class="card-text">For small to medium businesses</p>
              <div class="annual-plan">
                <div class="plan-price mt-2">
                  <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                  <span class="pricing-standard-value font-weight-bolder text-primary">20</span>
                  <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/month</sub>
                </div>
                <small class="annual-pricing d-none text-muted"></small>
              </div>
              <ul class="list-group list-group-circle text-left">
                <li class="list-group-item"> Manage Upto 5 Properties</li>
                <li class="list-group-item"> Unlimited units management</li>
                <li class="list-group-item"> Unlimited System Users</li>
                <li class="list-group-item"> Document Management</li>
                <li class="list-group-item"> Debt Control</li>
                <li class="list-group-item"> Data Security</li>
                <li class="list-group-item"> 24/7 User Support</li>
                <li class="list-group-item"> Bulk Sms & Email</li>
                <li class="list-group-item"> E-Payments Mpesa/Bank integrations</li>
                <li class="list-group-item"> Receipting</li>
                <li class="list-group-item"> Marketing</li>
                <li class="list-group-item"> Tenant & Landlord Portal</li>

                
              </ul>
              <button class="btn btn-block btn-primary mt-2">Current Plan</button>
            </div>
          </div>
        </div>
        <!--/ standard plan -->

        <!-- enterprise plan -->
        <div class="col-12 col-md-4">
          <div class="card enterprise-pricing text-center">
            <div class="card-body">
              <img src="{{asset('images/illustration/Pot3.svg')}}" class="mb-2" alt="svg img" />
              <h3>Enterprise</h3>
              <p class="card-text">Solution for big organizations</p>
              <div class="annual-plan">
                <div class="plan-price mt-2">
                  <sup class="font-medium-1 font-weight-bold text-primary">$</sup>
                  <span class="pricing-enterprise-value font-weight-bolder text-primary">50</span>
                  <sub class="pricing-duration text-body font-medium-1 font-weight-bold">/month</sub>
                </div>
                <small class="annual-pricing d-none text-muted"></small>
              </div>
              <ul class="list-group list-group-circle text-left">
                <li class="list-group-item"> Unlimited Properties</li>
                <li class="list-group-item"> Unlimited units management</li>
                <li class="list-group-item"> Unlimited System Users Users</li>
                <li class="list-group-item"> Document Management</li>
                <li class="list-group-item"> Debt Control</li>
                <li class="list-group-item"> Data Security</li>
                <li class="list-group-item"> 24/7 User Support</li>
                <li class="list-group-item"> Bulk Sms & Email</li>
                <li class="list-group-item"> E-Payments Mpesa/Bank integrations</li>
                <li class="list-group-item"> Receipting</li>
                <li class="list-group-item"> Marketing</li>
                <li class="list-group-item"> Tenant & Landlord Portal</li>
                <li class="list-group-item"> Accounting</li>
              </ul>
              <button class="btn btn-block btn-outline-primary mt-2">Upgrade</button>
            </div>
          </div>
        </div>
        <!--/ enterprise plan -->
      </div>
    </div>
  </div>
  <!--/ pricing plan cards -->

  <!-- pricing free trial -->
  <div class="pricing-free-trial">
    <div class="row">
      <div class="col-12 col-lg-10 col-lg-offset-3 mx-auto">
        <div class="pricing-trial-content d-flex justify-content-between">
          <div class="text-center text-md-left mt-3">
            <h3 class="text-primary">Still not convinced? Contact us for more!</h3>
            <h5>We offer standardized plans that suits even small business and agree on the subscription plans.</h5>
            <button class="btn btn-primary mt-2 mt-lg-3">Request New Plan</button>
          </div>

          <!-- image -->
          <img
            src="{{asset('images/illustration/pricing-Illustration.svg')}}"
            class="pricing-trial-img img-fluid"
            alt="svg img"
          />
        </div>
      </div>
    </div>
  </div>
  <!--/ pricing free trial -->

  <!--/ pricing faq -->
</section>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{asset('js/scripts/pages/page-pricing.js')}}"></script>
@endsection
