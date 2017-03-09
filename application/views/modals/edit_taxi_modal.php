<div class="modal fade" id="edit_taxi_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Taxi</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
       <form>
          <div class="form-group">
            <input type="hidden" name = "edit_id" class="form-control" id="lbl_id">    
            <label for="lbl_plate_number">Plate number</label>
            <input type="text" name = "edit_plate_number"  class="form-control" id="lbl_plate_number" placeholder="Plate number">    
            <label for="lbl_brand">Brand</label>
            <input type="text" name = "edit_brand" class="form-control" id="lbl_brand" placeholder="Brand">    
            <label for="lbl_body_number">Body number</label>
            <input type="text" name = "edit_body_number" class="form-control" id="lbl_body_number" placeholder="Body number">    
            <label for="lbl_last_change_oil_date">Last change oil date</label>
            <input type="date" name = "edit_last_change_oil_date" class="form-control" id="lbl_last_change_oil_date" placeholder="Last change oil date">    
          </div>
        </form>    
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" id="btn_edit_taxi" class="btn btn-success" data-dismiss="modal" onclick="javascript:window.location.reload()">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>