<div class="modal fade" id="edit_driver_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Edit Driver</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <div class="form-group">
            <input type="hidden" name = "edit_id" class="form-control" id="lbl_id">       
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="lbl_first_name">First name</label>
                <input type="text" name="edit_first_name"class="form-control" id="lbl_first_name" placeholder="First name">    
              </div>
              <div class="col-md-4">
                <label for="lbl_middle_name">Middle name</label>
                <input type="text" name="edit_middle_name" class="form-control" id="lbl_middle_name" placeholder="Middle name">    
              </div>
              <div class="col-md-4">
                <label for="lbl_last_name">Last name</label>
                <input type="text" name="edit_last_name" class="form-control" id="lbl_last_name" placeholder="Last name">    
              </div>
            </div>
          </div>
           <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="lbl_email_address">Email Address</label>
                <input type="text" name="edit_email_address" class="form-control" id="lbl_email_address" placeholder="Email Address">    
              </div>
              <div class="col-md-8">
                <label for="lbl_complete_address">Complete address</label>
               <input type="text" name="edit_complete_address" class="form-control" id="lbl_complete_address" placeholder="Unit number/Street/Barangay/Town/City/Province"> 
              </div>
            </div> 
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="lbl_contact_number">Contact number</label>
                <input type="text" class="form-control" name="edit_contact_number"id="lbl_contact_number" placeholder="First name">    
              </div>
              <div class="col-md-4">
                <label for="lbl_emergency_number">Emergency number</label>
                <input type="text" name="edit_emergency_number" class="form-control" id="lbl_emergency_number" placeholder="Middle name">
              </div>
              <div class="col-md-4">
                <label for="lbl_license_number">License number</label>
                <input type="text" name="edit_license_number" class="form-control" id="lbl_license_number" placeholder="Last name">    
              </div>
            </div>
          </div>
        </form>    
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" id="btn_edit_driver" class="btn btn-success" data-dismiss="modal" onclick="javascript:window.location.reload()">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>