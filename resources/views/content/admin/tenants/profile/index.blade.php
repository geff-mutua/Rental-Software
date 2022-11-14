
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Tenant Profile')
  
  
  @section('content')
  
  
  <!--/ Column Search -->
  <section id="basic-tabs-components">
    <div class="row match-height">

  
      <!-- Tabs with Icon starts -->
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
                <h4 class="card-title">
                    Rent Profile For:<b> {{strtoupper($tenant->name)}}</b>
                </h4>
                @if($current_month_rent)
                <div class="pull-right">
                    <button data-toggle="modal" data-target="#createRent" class="btn btn-sm btn-primary">Add Tenant Rent</button>
                </div>
                @include('content.admin.tenants.profile.create-rent')
                @endif
                <div class="pull-right">
                  <a href="{{route('tenants.index')}}" class="btn btn-sm btn-primary">Go to tenants</a>
                </div>
            </div>

          
          <div class="card-body">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-item">
                <a
                  class="nav-link active"
                  id="homeIcon-tab"
                  data-toggle="tab"
                  href="#homeIcon"
                  aria-controls="home"
                  role="tab"
                  aria-selected="true"
                  ><i data-feather="home"></i> Statement</a
                >
              </li>
              <li class="nav-item">
                <a
                  class="nav-link"
                  id="profileIcon-tab"
                  data-toggle="tab"
                  href="#profileIcon"
                  aria-controls="profile"
                  role="tab"
                  aria-selected="false"
                  ><i data-feather="tool"></i> Payments</a
                >
              </li>
              
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="homeIcon" aria-labelledby="homeIcon-tab" role="tabpanel">
                @if(Session::has('success'))
                <div class="alert alert-success p-2">
                    <p>{{Session::get('success')}}</p>
                </div>
                @endif
                @if(Session::has('error'))
                <div class="alert alert-danger p-2">
                    <p>{{Session::get('error')}}</p>
                </div>
                @endif
                <table class="dt-responsive table" id="myTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Room Rent</th>
                            <th>BF</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Balance</th>
                            <th>Month</th>
                            {{-- <th>Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                     @forelse ($rent as $item)
                         <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{number_format($item->rent)}}</td>
                            <td>{{number_format($item->bf)}}</td>
                            <td>{{number_format($item->total)}}</td>
                            <td>{{number_format($item->paid)}}</td>
                            <td>{{number_format($item->balance)}}</td>
                            <td>{{$item->month}}-{{$item->year}}</td>

                         </tr>
                     @empty
                         <tr class="text-center">
                            <td colspan="8">No Record Found</td>
                         </tr>
                     @endforelse
                    </tbody>
                   
                  </table>
              </div>
              <div class="tab-pane" id="profileIcon" aria-labelledby="profileIcon-tab" role="tabpanel">
                <table class="dt-responsive table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Reference Code</th>
                        <th>Amount</th>
                        <th>Month</th>
                        <th>Year</th>
                        <th>Mode of Payment</th>
                        <th>Date Paid</th>
                        {{-- <th>Action</th> --}}
                        
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($payments as $item)
                          <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->reference}}</td>
                            <td>{{number_format($item->amount)}}</td>
                            <td>{{$item->month}}</td>
                            <td>{{$item->year}}</td>
                            <td>{{$item->mode}}</td>
                            <td>{{$item->date}}</td>
                          </tr>
                      @empty
                          
                      @endforelse
                    </tbody>
                   
                  </table>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <!-- Tabs with Icon ends -->
    </div>
  </section>

  
  @endsection
  
  
  
  @section('page-script')

    <script src="{{ asset('js/scripts/components/components-modals.js') }}"></script>
  @endsection
  

  