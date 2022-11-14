<div class="modal fade text-left" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Create New User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('users.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Name </label>
                    <div class="form-group">
                        <input type="text" name="name" required placeholder="Enter Name" class="form-control" />
                    </div>

                    <label> Email </label>
                    <div class="form-group">
                        <input type="text" name="email" required  class="form-control" />
                    </div>

                    <label> Mobile </label>
                    <div class="form-group">
                        <input type="text+" name="mobile" required   class="form-control" />
                    </div>

                    <label>Role </label>
                    <div class="form-group">
                        <select name="role" class="form-control" id="">
                            <option value="">-- Select Role --</option>
                            <option value="Admin">Admin</option>
                            <option value="Cashier">Cashier</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>