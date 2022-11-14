<div class="modal fade text-left" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Create Tenant Payment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('payments.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Select Tenant </label>
                    <div class="form-group">
                        <select name="tenant" class="form-control" id="">
                            <option value="">-- Select Tenant --</option>
                            @forelse ($tenants as $value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Payment Method</label>
                        <select name="mode" class="form-control" id="">
                            <option value="">-- Select Payment Mode --</option>
                           @forelse ($options as $value)
                                <option value="{{$value}}">{{$value}}</option>
                           @empty
                               
                           @endforelse
                        </select>
                    </div>

                    <label> Amount Paid </label>
                    <div class="form-group">
                        <input type="number" placeholder="Amount Paid" name="amount" required   class="form-control" />
                    </div>
                    <label> Date Paid</label>
                    <div class="form-group">
                        <input type="date" name="date" required   class="form-control" />
                    </div>
                    <label> Reference Code </label>
                    <div class="form-group">
                        <input type="text" name="reference" placeholder="Reference code"   class="form-control" />
                    </div>
                   


                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>