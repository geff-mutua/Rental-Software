<div class="modal fade text-left" id="createRent" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Create Rent For {{date('F')}}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{route('save-rent')}}" method="POST">
                @csrf
                <div class="form-group">
                    
                    <input type="hidden" name="tenant" value="{{$tenant->id}}" id="">
                </div>
                <div class="form-group">
                    <label for="">Room Rent</label>
                    <input type="number" class="form-control"  value="{{$room_details->rent}}" name="rent" id="">
                </div>
                <div class="form-group">
                    <label for="">Rent Month</label>
                    <select class="form-control" name="month" id="">
                        <option value="{{date('F')}}">{{date('F')}}</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Balance BF</label>
                    <select class="form-control" required name="bf" id="">
                        <option value="" selected>--Choose--</option>
                        <option value="<?=$bf ==null ? '0' : $bf['balance']?>"><?=$bf ==null ? '0' : $bf['balance']?></option>

                    </select>
                </div>
            
            <div class="align-right">
                <button type="submit" class="btn btn-primary">Post Rent</button>
            </div>
        </form>
            </div>
        </div>
    </div>
</div>