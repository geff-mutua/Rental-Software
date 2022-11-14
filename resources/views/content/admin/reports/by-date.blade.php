<div class="modal modal-slide-in fade" id="filter-date" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title">
            <span class="align-middle">By Year</span>
          </h5>
        </div>
        <div class="modal-body flex-grow-1">
            <small>Filter By Dates</small>
            <hr>
            <form method="POST" action="/reporting-date">
                @csrf
                <div class="form-group">
                    <label>Date From</label>
                    <input type="date" name="start_date" required class="form-control">
                </div>
                <div class="form-group">
                    <label>Date To</label>
                    <input type="date" name="end_date" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary pull-left">Filter Report</button>

            </form>
        </div>
      </div>
    </div>
  </div>