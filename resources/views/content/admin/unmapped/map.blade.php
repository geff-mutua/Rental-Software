<div class="modal-size-lg d-inline-block">
    <!-- Modal -->
    <div wire:ignore.self  class="modal fade text-left" id="map{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">{{ucwords(strtolower($value->first_name)).' '.$value->middle_name.' '.ucwords(strtolower($value->last_name))}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/map" method="POST">
                    @csrf
                    <div class="modal-body">
                       @if(Session::has('message'))
                       <div class="alert alert-warning p-2 alert-dismissible">
                        <p>{{Session::get("message")}}</p>
                    </div>
                       @endif
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="transaction" value="{{$value->id}}" id="">
                                <label for="">Payment Name</label>
                                <input type="text" class="form-control" readonly value="{{ucwords(strtolower($value->first_name)).' '.$value->middle_name.' '.ucwords(strtolower($value->last_name))}}" id="">
                            </div>
                            <div class="col-md-3">
                                <label for="">Inputted Account Number</label>
                                <input type="text" class="form-control" readonly value="{{$value->bill_ref_number}}" id="">
                            </div>
                            <div class="col-md-3">
                                <label for="">Paid Amount</label>
                                <input type="text" class="form-control" readonly value="{{number_format($value->transaction_amount)}}" id="">
                            </div>
                            <div class="col-md-2">
                                <label for="">Api Mode</label>
                                <input type="text" class="form-control" readonly value="Mpesa Api" id="">
                            </div>
                            <div class="col-md-4">
                                <label for="">Transaction Code</label>
                                <input type="text" class="form-control" readonly value="{{$value->transaction_id}}" id="">
                            </div>
                            <div class="col-md-4">
                                <label for="">Transaction Date</label>
                                <input type="text" class="form-control" readonly value="{{Carbon\Carbon::parse($value->created_at)->toDayDateTimeString()}}" id="">
                            </div>
                            <div class="col-md-4">
                                <label for="">Transaction Mobile</label>
                                <input type="text" class="form-control" readonly value="{{$value->msisdn}}" id="">
                            </div>
                            <div class="col-md-12">
                                <hr>
                                    <h6>CHOOSE TENANT TO MAP</h6>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <label for="">Choose Tenant To Map Payment</label>
                                  <select class="form-control" name="tenant" >
                                    <option value="">--Choose--</option>
                                    @forelse ($tenants as $item)
                                        <option value="{{$item->id}}">
                                        {{$item->name}} [ {{$item->room->name}} ]
                                        </option>
                                    @empty
                                        
                                    @endforelse
                                  </select>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Proceed To Map</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
