<div class="modal fade text-left" id="inlineForm{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Edit User Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.update',['user'=>$value->id])}}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">
                    <label>Company Name </label>
                    <div class="form-group">
                        <input type="text" name="name" required value="{{$value->name}}" placeholder="Email Address" class="form-control" />
                    </div>

                    <label>Company Email </label>
                    <div class="form-group">
                        <input type="text" name="email" required value="{{$value->email}}" class="form-control" />
                    </div>

                    <label> Mobile </label>
                    <div class="form-group">
                        <input type="text+" name="mobile" required  value="{{$value->mobile}}" class="form-control" />
                    </div>

                    <label>Role </label>
                    <div class="form-group">
                        <select name="role" class="form-control" id="">
                            <option value="{{$value->role}}">{{$value->role}}</option>
                            <option value="Admin">Admin</option>
                            <option value="Cashier">Cashier</option>
                        </select>
                    </div>
   
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>