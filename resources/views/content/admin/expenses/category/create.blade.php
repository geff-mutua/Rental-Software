<div class="modal fade text-left" id="payment-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">New Expenditure Class</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('expenditure.catstore')}}" method="POST">
                @csrf
                <div class="modal-body">
                
                    
                    <label> Category Name </label>
                    <div class="form-group">
                        <input type="text" placeholder="Expense Name" name="name" required   class="form-control" />
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save </button>
                </div>
            </form>
        </div>
    </div>
</div>