<div>
    @section('title', 'Dashboard')
    @section('vendor-style')
        {{-- vendor css files --}}
        <link rel="stylesheet" href="{{ asset('vendors/css/charts/apexcharts.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/extensions/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css') }}">
    @endsection
    @section('page-style')
        {{-- Page css files --}}
        <link rel="stylesheet" href="{{ asset('css/base/pages/dashboard-ecommerce.css') }}">
        <link rel="stylesheet" href="{{ asset('css/base/plugins/charts/chart-apex.css') }}">
    @endsection

    <section id="dashboard-ecommerce">

        <div  class="row match-height">
            <!-- Medal Card -->
            <div class="col-xl-4 col-md-6 col-12">
                <div class="card card-congratulation-medal">
                    <div class="card-body">
                        <h5>Hello 🎉 {{ auth()->user()->name }}!</h5>
                        <p class="card-text font-small-3">Have a look at your Incomes</p>
                        <h3 class="mb-75 mt-2 pt-50">
                            <a href="javascript:void(0);">Ksh {{ number_format($data['paid']) }}</a>
                        </h3>
                        <a href="{{ route('payments.index') }}" class="btn btn-primary">Received Payments</a>
                        <img src="{{ asset('images/illustration/badge.svg') }}" class="congratulation-medal"
                            alt="Medal Pic" />
                    </div>
                </div>
            </div>
            <!--/ Medal Card -->

            <!-- Statistics Card -->
            <div class="col-xl-8 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">Rental Performance</h4>
                        <div class="d-flex align-items-center">
                            <p class="card-text font-small-2 mr-25 mb-0">Results for {{ $month }}</p>
                        </div>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="media">
                                    <div class="avatar bg-light-primary mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="trending-up" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{ number_format($data['expected']) }}</h4>
                                        <p class="card-text font-small-3 mb-0">Expected</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="media">
                                    <div class="avatar bg-light-info mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="user" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{ number_format($data['arrears']) }}</h4>
                                        <p class="card-text font-small-3 mb-0">Arrears</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12 mb-2 mb-sm-0">
                                <div class="media">
                                    <div class="avatar bg-light-danger mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="box" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0"> {{ number_format($data['paid']) }}</h4>
                                        <p class="card-text font-small-3 mb-0">Paid</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 col-12">
                                <div class="media">
                                    <div class="avatar bg-light-success mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="dollar-sign" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">{{ number_format($data['balance']) }}</h4>
                                        <p class="card-text font-small-3 mb-0">Balance</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Statistics Card -->
        </div>

        {{-- PHASE 2 --}}

        <div class="row match-height">
            <div class="col-lg-4 col-12">
                <div class="row match-height">
                    <!-- Bar Chart - Orders -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card">
                            <div class="card-body pb-50">
                                <h6>Total Tenants</h6>
                                <h2 class="font-weight-bolder mb-1">{{ $data['tenants'] }}</h2>
                                <div id="statistics-order-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Bar Chart - Orders -->

                    <!-- Line Chart - Profit -->
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6>Properties</h6>
                                <h2 class="font-weight-bolder mb-1">{{ $data['properties'] }}</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6 class="text-success">Occupied Rooms</h6>
                                <h2 class="font-weight-bolder mb-1 text-success">{{ $data['occupied'] }}</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-3 col-6">
                        <div class="card card-tiny-line-stats">
                            <div class="card-body pb-50">
                                <h6 class="text-danger">Vacant Rooms</h6>
                                <h2 class="font-weight-bolder mb-1 text-danger">{{ $data['vacant'] }}</h2>
                                <div id="statistics-profit-chart"></div>
                            </div>
                        </div>
                    </div>
                    <!--/ Line Chart - Profit -->

                    <!-- Earnings Card -->
                    <div class="col-lg-12 col-md-6 col-12">
                        <div class="card earnings-card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 class="card-title mb-1">Property Earning</h4>
                                        <div class="font-small-2">Cumulatively</div>
                                        <h5 class="mb-1">Ksh {{ number_format($data['property_earning']) }}</h5>
                                        <p class="card-text text-muted font-small-2">
                                            <span class="font-weight-bolder">{{ $data['per_income'] }}%</span><span>
                                                Performance rate from all incomes.</span>
                                        </p>
                                    </div>
                                    <div class="col-6">
                                        <div id="earnings-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ Earnings Card -->
                </div>
            </div>

            <!-- Revenue Report Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-revenue-budget">
                    <div class="row mx-0">
                        <div class="col-md-8 col-12 revenue-report-wrapper">
                            <div class="d-sm-flex justify-content-between align-items-center mb-3">
                                <h4 class="card-title mb-50 mb-sm-0">Comprehensive Analysis</h4>
                                <div class="d-flex align-items-center">
                                    <div class="d-flex align-items-center mr-2">
                                        <span class="bullet bullet-primary font-small-3 mr-50 cursor-pointer"></span>
                                        <span>Earning</span>
                                    </div>
                                    <div class="d-flex align-items-center ml-75">
                                        <span class="bullet bullet-warning font-small-3 mr-50 cursor-pointer"></span>
                                        <span>Expense</span>
                                    </div>
                                </div>
                            </div>
                            <div id="revenue-report-chart"></div>
                        </div>
                        <div class="col-md-4 col-12 budget-wrapper">
                            <div class="btn-group">

                                <select wire:model="month"
                                    class="btn btn-outline-primary btn-sm dropdown-toggle budget-dropdown"
                                    id="" required>
                                    
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>

                                </select>


                            </div>
                            <h2 class="mb-25">Received: {{ number_format($data['paid']) }}</h2>
                            <div class="d-flex justify-content-center">
                                <span class="font-weight-bolder mr-25">Expected</span>
                                <span>{{ number_format($data['expected']) }}</span>
                            </div>
                            <div id="budget-chart"></div>
                            <a href="" type="button" class="btn btn-primary">View Performance</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Revenue Report Card -->
        </div>

        {{-- PHASE 3 --}}

        <div class="row match-height">
            <!-- Company Table Card -->
            <div class="col-lg-8 col-12">
                <div class="card card-company-table">
                    <div class="card-body p-2">
                        <div class="table-responsive">
                            <table class="table dt-responsive" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Tenant</th>
                                        <th>Rent Expected</th>
                                        <th>Month Rent</th>
                                        <th>Paid</th>
                                        <th>% Value</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($data['recents'] as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar rounded">
                                                        <div class="avatar-content">

                                                            <img width="30"
                                                                src="{{ Avatar::create($item->tenant->name)->toBase64() }}"
                                                                alt="Toolbar svg" />
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div class="font-weight-bolder">{{ $item->tenant->name }}
                                                        </div>
                                                        <div class="font-small-2 text-muted">
                                                            {{ $item->tenant->room->name }}</div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar bg-light-primary mr-1">
                                                        <div class="avatar-content">
                                                            <i data-feather="database" class="font-medium-3"></i>
                                                        </div>
                                                    </div>
                                                    <span>{{ number_format($item->total) }}</span>
                                                </div>
                                            </td>
                                            <td class="text-nowrap">
                                                <div class="d-flex flex-column">
                                                    <span
                                                        class="font-weight-bolder mb-25">{{ number_format($item->rent) }}</span>
                                                    <span
                                                        class="font-small-2 text-info">(Arrears) {{ number_format($item->bf) }}</span>
                                                </div>
                                            </td>
                                            <td>{{ number_format($item->paid) }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <span class="font-weight-bolder mr-1">

                                                        @php
                                                            $value = (int) $item->paid == 0 ? '0' : ($item->paid / (int) $item->total) * 100;
                                                            echo '' . number_format($value, 0) . '';
                                                            
                                                        @endphp

                                                        %</span>
                                                    <i data-feather="trending-up"
                                                        class="text-success font-medium-1"></i>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Company Table Card -->


            <!-- Transaction Card -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-transaction">
                    <div class="card-header">
                        <h4 class="card-title">Unmapped Payments from API</h4>
                        <div class="dropdown chart-dropdown">
                            <i data-feather="more-vertical" class="font-medium-3 cursor-pointer"
                            data-toggle="dropdown"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{ route('payments.unmapped') }}">View All</a>
                                
                            </div>
                        </div>
                    </div>
                   
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table dt-responsive" id="myTable2">
                                <thead>
                                    <tr>
                                        <th>Tenant</th>
                                      
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data['unmapped'] as $key => $value)
                                    <tr>
                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-bolder mb-25">
                                                    {{ ucwords(strtolower($value->first_name)) . ' ' . $value->middle_name . ' ' . ucwords(strtolower($value->last_name)) }}
                                                </span>
                                                <span
                                                    class="font-small-2 text-info">{{ $value->bill_ref_number }}</span>
                                            </div>
                                        </td>

                                        <td class="text-nowrap">
                                            <div class="d-flex flex-column">
                                                <span class="font-weight-bolder mb-25">
                                                    Ksh {{ number_format($value->transaction_amount) }}
                                                </span>
                                                <span
                                                    class="font-small-2 text-info"> {{\Carbon\Carbon::parse($value->created_at)->format('d-m-Y H:i:s A') }}</span>
                                            </div>
                                        </td>
                                        
                                        
                                    </tr>
                                    @empty
                                    <tr class="transaction-item justify-content-center align-items-center">
                                        <td colspan="2">No records available</td>
                                        
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                            {{-- <div class="transaction-item">
                                <div class="media">
                                    <div class="avatar bg-light-primary rounded">
                                        <div class="avatar-content">
                                            <img width="30"
                                                src="{{ Avatar::create($value->first_name . ' ' . $value->last_name)->toBase64() }}"
                                                alt="Toolbar svg" />
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="transaction-title">
                                            {{ ucwords(strtolower($value->first_name)) . ' ' . $value->middle_name . ' ' . ucwords(strtolower($value->last_name)) }}
                                        </h6>
                                        <small>Account <strong
                                                class="text-info">{{ $value->bill_ref_number }}</strong></small>
                                    </div>
                                </div>
                                <div class="font-weight-bolder text-warning">
                                    {{ number_format($value->transaction_amount) }}</div>
                            </div> --}}


                    </div>
                </div>
            </div>
            <!--/ Transaction Card -->
        </div>


    </section>
    @section('vendor-script')
        {{-- vendor files --}}
        <script src="{{ asset('vendors/js/charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
        <script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
    @endsection
    @section('page-script')
        @include('utils.scripts')
        <script src="{{ asset('js/scripts/tables/table-datatables-advanced.js') }}"></script>-}}
    @endsection
</div>
