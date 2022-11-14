
  @extends('layouts.contentLayoutMaster')
  @section('title', 'Manage Tenants')
  
  @section('vendor-style')

  
@endsection
  
  @section('content')
  <div class="row">
    <div class="col-12">
      <p>Here is the list of all registered tenants.</p>
    </div>
  </div>
  
  <!--/ Column Search -->
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
      <div class="alert alert-info p-2">
          <p>{{Session::get('message')}}</p>
      </div>
      @endif
      <table class="dt-responsive table" id="myTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Room Number</th>
            <th>mobile</th>
            <th>National Id</th>
            <th>Gender</th>
            <th>Status</th>
            <th>Action</th>
            
          </tr>
        </thead>
        <tbody>
            @forelse ($tenants as $item)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$item->name}}</td>
                  <td>{{$item->room ? $item->room->name: '--'}}</td>
                  <td>{{$item->mobile}}</td>
                  <td>{{$item->naid}}</td>
                  <td>{{$item->gender}}</td>
                  <td>{{$item->status ? 'Tenant In' : 'Tenant Out'}}</td>
                  <td>
               
                    <a href="{{route('tenants.edit',['tenant'=>$item->id])}}"><span class="text-warning cursor-pointer">Edit</span></a>
                    <span class="pl-2"></span>
                    <a href="{{route('tenant.profile',['tenant'=>$item->id])}}"><span class="text-success cursor-pointer" >View</span></i></a>
                    <span class="pl-2"></span>
                    <span class="text-danger cursor-pointer" >Del</span>
                  </td>
                </tr>
            @empty
                <tr class="text-center">
                  <td colspan="8">No tenants found</td>
                </tr>
            @endforelse
        </tbody>
       
      </table>
    </div>
  </div>
  @include('content.admin.users.includes.add-user')
  
  @endsection
  
@section('page-script')


@endsection