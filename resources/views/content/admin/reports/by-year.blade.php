<div class="modal modal-slide-in fade" id="filter-year" aria-hidden="true">
    <div class="modal-dialog sidebar-lg">
      <div class="modal-content p-0">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
        <div class="modal-header mb-1">
          <h5 class="modal-title">
            <span class="align-middle">By Year</span>
          </h5>
        </div>
        <div class="modal-body flex-grow-1">
            <small>Filter Yearly</small>
            <hr>
            <form method="POST" action="/reporting-year">
              @csrf

              <div class="form-group">
                  <label>Choose Year</label>
                  <select name="year" class="form-control" id="" required >
                    <option value="{{date('Y')}}">{{date('Y')}}</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                  </select>
             </div>
            
              <button type="submit" class="btn btn-primary pull-left">Filter Report</button>

           </form>
        </div>
      </div>
    </div>
  </div>