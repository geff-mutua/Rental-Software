<div class="modal fade text-left" id="filterPayments" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Filter Payments</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               
                <form action="{{route('payments.filter')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Choose Month</label>
                        <select name="month" class="form-control" id="" required >
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
                   <div class="form-group">
                       <label>Choose Year</label>
                       <select name="year" class="form-control" id="" required >
                           <option value="2018">2018</option>
                           <option value="2019">2019</option>
                           <option value="2020">2020</option>
                           <option value="2021">2021</option>
                           <option value="2022" selected>2022</option>
                           <option value="2023">2023</option>
                           <option value="2024">2024</option>
                           <option value="2025">2025</option>


                       </select>
                  </div>
                    <button class="btn btn-primary" type="submit">Filter Record</button>
                </form>

               
            </div>
        </div>
    </div>
</div>