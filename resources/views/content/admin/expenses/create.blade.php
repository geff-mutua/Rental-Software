<div class="modal fade text-left" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">New Expenditure</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('expenditure.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Choose Expenditure Type </label>
                    <div class="form-group">
                        <select name="category" class="form-control" id="">
                            <option value="">-- Select Option --</option>
                            @forelse ($categories as $value)
                                <option value="{{$value->id}}">{{$value->description}}</option>
                            @empty
                                
                            @endforelse
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Select Month</label>
                        <select name="month" class="form-control" id="" required >
                            <option value="">--Select--</option>
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

                    <label> Cost Amount </label>
                    <div class="form-group">
                        <input type="number" placeholder="Cost Amount" name="amount" required   class="form-control" />
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>