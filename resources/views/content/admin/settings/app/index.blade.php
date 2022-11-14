@extends('layouts/contentLayoutMaster')
@section('title', 'Update Settings')


@section('content')

<!--/ Column Search -->
<div class="card">
    <div class="card-header border-bottom">
        <h4 class="card-title">@yield('title')</h4>
    </div>
    <div class="card-body justify-content-center mt-1">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible">
            <p class="p-2">{{Session::get('message')}}</p>
        </div>
        @endif
        <form action="{{route('app-settings.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Company Logo</label>
                <input type="file" name="logo" class="form-control col-md-8 @error('logo')is-valid @enderror">
                @error('logo') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
            @if(!is_null($settings))
            @if(!is_null($settings->logo))
            <div>
                <img src="{{asset('logo/'.$settings->logo)}}" alt="">
            </div>
            @endif
            @endif

            <div class="form-group">
                <label for="">Currency</label>
                <select class="form-control @error('currency')is-valid @enderror col-md-8" id="" name="currency"
                    required>

                    <option value="Ksh">Ksh</option>
                    {{-- <option value="Food">Food and Beverages</option> --}}
                </select>
                @error('currency') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="form-group">
                <label for="">System Type</label>
                <select class="form-control col-md-8 @error('type')is-valid @enderror" id="" name="type" required>

                    <option value="Rental">Rental</option>
                   
                </select>
                @error('type') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Language</label>
                <select class="form-control @error('language')is-valid @enderror col-md-8" id="" name="language"
                    required>

                    <option value="Retail">English</option>
                    {{-- <option value="Food">Food and Beverages</option> --}}
                </select>
            </div>
            <div class="form-group">
                <label for="">System Sidebar</label>
                <select class="form-control @error('sidebar')is-valid @enderror col-md-8" id="" name="sidebar" required>

                    @if(!is_null($settings))
                    @if($settings->sidebarCollapsed==1)
                    <option selected value="1">Collapsed</option>
                    <option value="0">Expanded</option>
                    @else
                    <option selected value="0">Expanded</option>
                    <option value="1">Collapsed</option>
                    @endif
                    @else
                    <option value="">--Select Option--</option>
                    <option value="1">Collapsed</option>
                    <option value="0">Expanded</option>
                    @endif

                </select>
                @error('sidebar') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Breadcrumb Settings</label>
                <select class="form-control @error('header')is-valid @enderror col-md-8" id="" name="header" required>
                    @if(!is_null($settings))
                    @if($settings->pageHeader==1)
                    <option selected value="1">Show Page Headers</option>
                    <option value="0">Hide Page Headers</option>
                    @else

                    <option selected value="0">Hide Page Headers</option>>
                    <option value="1">Show Page Headers</option>
                    @endif
                    @else
                    <option value="">--Select header Style--</option>
                    <option value="1">Show Page Headers</option>
                    <option value="0">Hide Page Headers</option>
                    @endif


                    {{-- <option value="Food">Food and Beverages</option> --}}
                </select>
                @error('header') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Theme Settings</label>
                <select class="form-control @error('theme')is-valid @enderror col-md-8" id="" name="theme" required>
                    @if(!is_null($settings))
                    @if(!is_null($settings->theme))
                    @if($settings->theme=='dark')
                    <option selected value="dark">Dark Theme</option>
                    <option value="light">Light Theme</option>
                    <option value="semi-dark">Semi Dark</option>
                    <option value="bordered">Bordered</option>
                    @elseif($settings->theme=='light')
                    <option selected value="light">Light Theme</option>
                    <option value="dark">Dark Theme</option>
                    <option value="semi-dark">Semi Dark</option>
                    <option value="bordered">Bordered</option>
                    @elseif($settings->theme=='semi-dark')
                    <option selected value="semi-dark">Semi Dark</option>
                    <option value="dark">Dark Theme</option>
                    <option value="light">Light Theme</option>
                    <option value="bordered">Bordered</option>
                    @else
                    <option selected value="bordered">Bordered</option>
                    <option value="semi-dark">Semi Dark</option>
                    <option value="dark">Dark Theme</option>
                    <option value="light">Light Theme</option>
                    @endif
                    @endif
                    @else
                    <option value="">-- Preffered theme --</option>
                    <option value="light">Light Theme</option>
                    <option value="dark">Dark Theme</option>
                    <option value="semi-dark">Semi Dark</option>
                    <option value="bordered">Bordered</option>
                    @endif


                    {{-- <option value="Food">Food and Beverages</option> --}}
                </select>
                @error('theme') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="">Navbar Settings (on top of the page)</label>
                <select class="form-control @error('navbar')is-valid @enderror col-md-8" id="" name="navbar" required>

                    @if(!is_null($settings))
                    @if(!is_null($settings->navbar))
                    @if($settings->navbar=='floating')
                    <option selected value="floating">Floating Navbar</option>
                    <option value="static">Static Navbar</option>
                    <option value="hidden">Hidden Navbar</option>
                    <option value="sticky">Sticky Navbar</option>
                    @elseif($settings->navbar=='static')
                    <option value="floating">Floating Navbar</option>
                    <option selected value="static">Static Navbar</option>
                    <option value="hidden">Hidden Navbar</option>
                    <option value="sticky">Sticky Navbar</option>
                    @elseif($settings->navbar=='hidden')
                    <option value="floating">Floating Navbar</option>
                    <option value="static">Static Navbar</option>
                    <option selected value="hidden">Hidden Navbar</option>
                    <option value="sticky">Sticky Navbar</option>
                    @else
                    <option value="floating">Floating Navbar</option>
                    <option value="static">Static Navbar</option>
                    <option value="hidden">Hidden Navbar</option>
                    <option selected value="sticky">Sticky Navbar</option>

                    @endif
                    @endif
                    @else
                    <option value="">-- Select --</option>
                    <option value="floating">Floating Navbar</option>
                    <option value="static">Static Navbar</option>
                    <option value="hidden">Hidden Navbar</option>
                    <option value="sticky">Sticky Navbar</option>
                    @endif

                </select>
                @error('navbar') <span class="text-danger text-xs">{{ $message }}</span> @enderror
            </div>
            <button class="btn btn-primary" type="submit">Save Changes</button>
        </form>

    </div>
</div>
@endsection


@section('vendor-script')
{{-- vendor files --}}
<script src="{{ asset('vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/js/tables/datatable/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('vendors/js/tables/datatable/responsive.bootstrap4.js') }}"></script>
<script src="{{ asset('vendors/js/pickers/flatpickr/flatpickr.min.js') }}"></script>
@endsection

@section('page-script')
{{-- Page js files --}}
<script src="{{ asset('js/scripts/tables/table-datatables-advanced.js') }}"></script>
@endsection