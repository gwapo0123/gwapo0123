<div class="modal fade" id="edit_rental_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Rental</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form>
           <input type="hidden" name = "edit_id" class="form-control" id="edit_lbl_id">   
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="lbl_driver">Driver</label>
                <input type="text" class="form-control" id="edit_lbl_driver" placeholder="Driver" readonly>
              </div>
            <div class="col-md-6">
               <label for="lbl_taxi">Taxi</label>
                <input type="text" class="form-control" id="edit_lbl_taxi" placeholder="Taxi" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                  <label for="lbl_date_from">Date from</label>
                  <input type="text" class="form-control" id="edit_lbl_date_from" placeholder="Date from" readonly>
              </div>
              <div class="col-md-6">
                <label for="lbl_date_to">Date to</label>
                <input type="date" class="form-control" id="edit_lbl_date_to" placeholder="Date to">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="lbl_total_payment">Total Payment</label>
            <input type="text" class="form-control" id="edit_lbl_total_payment" placeholder="Total payment" readonly>
          </div>
        </form> 
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" id="btn_edit_rental" class="btn btn-success" data-dismiss="modal" onclick="javascript:window.location.reload()">Edit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>