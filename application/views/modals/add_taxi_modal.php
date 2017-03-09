<div class="modal fade" id="add_taxi_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Taxi</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <div class="form-group">
            <label for="lbl_plate_number">Plate number</label>
            <input type="number" name="plate_number" class="form-control" id="lbl_plate_number" placeholder="Example (123 4567)">    
            <label for="lbl_brand">Brand</label>
            <input type="text" name="brand" class="form-control" id="lbl_brand" placeholder="Brand">    
            <label for="lbl_body_number">Body number</label>
            <input type="text" name="body_number" class="form-control" id="lbl_body_number" placeholder="Body number">    
            <label for="lbl_last_change_oil_date">Last change oil date</label>
            <input type="date" name="last_change_oil_date" class="form-control" id="lbl_last_change_oil_date" placeholder="Last change oil date" value = "<?php echo date('Y-m-d'); ?>">    
          </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" id="btn_add_taxi" class="btn btn-success" data-dismiss="modal" onclick="javascript:window.location.reload()">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>