<div class="modal fade text-left" id="addcompany" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Create New Company</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('company.store')}}" method="POST">
                @csrf
                <div class="modal-body">
                    <label>Company Name </label>
                    <div class="form-group">
                        <input type="text" name="name" required placeholder="Email Address" class="form-control" />
                    </div>

                    <label>Company Email </label>
                    <div class="form-group">
                        <input type="text" name="email" required  class="form-control" />
                    </div>

                    <label>Company Address </label>
                    <div class="form-group">
                        <input type="text" name="address" required   class="form-control" />
                    </div>

                    <label>Company Mobile </label>
                    <div class="form-group">
                        <input type="text+" name="mobile" required   class="form-control" />
                    </div>

                    <label>Company Website </label>
                    <div class="form-group">
                        <input type="text" name="website" class="form-control" />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>