<div class="modal fade" id="add_rental_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Rental</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="lbl_driver">Driver</label>
                <select class="form-control" id="lbl_driver" name = "add_select_driver">
                </select> 
              </div>
            <div class="col-md-6">
              <label for="lbl_taxi">Taxi</label>
                <select class="form-control" id="lbl_taxi" name = "add_select_taxi">
                </select> 
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
                <div class="col-md-6">
                  <label for="lbl_date_from">Date from</label>
                  <input type="date" name = "add_date_from" class="form-control" id="lbl_date_from" placeholder="Date from">
              </div>
              <div class="col-md-6">
                <label for="lbl_date_to">Date to</label>
                <input type="date" name = add_date_to" class="form-control" id="lbl_date_to" placeholder="Date to">
              </div>
            </div>
          </div>
        </form> 
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" id="btn_add_rental" class="btn btn-success" data-dismiss="modal" onclick="javascript:window.location.reload()">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>