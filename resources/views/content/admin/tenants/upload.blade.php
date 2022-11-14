
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Upload Tenants')
  
  @section('vendor-style')
  <!-- vendor css files -->
  <link rel="stylesheet" href="{{ asset('vendors/css/file-uploaders/dropzone.min.css') }}">
@endsection
@section('page-style')
  <!-- Page css files -->
  <link rel="stylesheet" href="{{ asset('css/base/plugins/forms/form-file-uploader.css') }}">
@endsection
  
  
  @section('content')
  
  
  <!--/ Column Search -->
  <section id="dropzone-examples">
  <div class="card">
    <div class="card-header border-bottom">
      <h4 class="card-title">@yield('title')</h4>
      <div class="pull-right">
        <a href="{{route('tenants.create')}}" class="btn btn-sm btn-primary">Add Tenants</a>
        <a href="{{route('tenants-upload')}}" class="btn btn-sm btn-info">Import Tenants</a>
        <a href="{{route('tenants-left')}}" class="btn btn-sm btn-success">Left Tenants</a>
       
        
      </div>
    </div>
    <div class="card-body">
      @if(Session::has('message'))
      <div class="alert alert-warning p-2">
          <p>{{Session::get('message')}}</p>
      </div>
      @endif

      <div class="row mt-2">
        <div class="col-12">
          <div class="alert alert-primary" role="alert">
            <div class="alert-body">
              <strong>Info:</strong> Inorder to ensure the file you upload containing the user data is valid acording to system 
              structure, kindly get the templete here, populate it and upload.
            </div>
        </div>
        <div class="pull-right">
          <a href="{{asset('assets/templates/tenant-template.csv')}}" class="btn btn-primary">Get Template</a>
        </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Single File Upload</h4>
            </div>
            <div class="card-body">
              <p class="card-text">
                Ensure you populate your tenants according to the downloaded template.All fields are requires unless otherwise. Where you dont have information for that field,
                <code>Use N/A</code> for editting it later. <code>Only csv format is allowed for upload.</code>
                <code>maxFiles: 1</code> Only 1 File can be uploaded at a time.
                <code>Get the Room Code for tenant from the system on Rooms (This is the number of the room the tenants is being allocated)</code>
              </p>
              <form action="{{route('upload-tenants')}}" method="post" enctype="multipart/form-data" class="dropzone dropzone-area align-content-center align-items-center">
                @csrf
                <input type="file" class="form-control" name="file" id="">
                <button type="submit" class="btn btn-info mt-2">Process File</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
  </section>
  
  
  @endsection
  
  
  @section('vendor-script')
  <!-- vendor files -->
  <script src="{{ asset('vendors/js/file-uploaders/dropzone.min.js') }}"></script>
@endsection
@section('page-script')
  <!-- Page js files -->
  <script src="{{ asset('js/scripts/forms/form-file-uploader.js') }}"></script>
@endsection
  

  