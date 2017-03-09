<div class="modal fade" id="add_driver_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Driver</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
          <div class="form-group">
            <div class="row">
              <div class="col-md-12">  
              </div>
            </div> 
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="lbl_first_name">First name</label>
                <input type="text" name="first_name" class="form-control" id="lbl_first_name" placeholder="First name">    
              </div>
              <div class="col-md-4">
                <label for="lbl_middle_name">Middle name</label>
                <input type="text" name="middle_name" class="form-control" id="lbl_middle_name" placeholder="Middle name">    
              </div>
              <div class="col-md-4">
                <label for="lbl_last_name">Last name</label>
                <input type="text" name="last_name" class="form-control" id="lbl_last_name" placeholder="Last name">    
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="lbl_email_address">Email Address</label>
                <input type="text" name="email_address" class="form-control" id="lbl_email_address" placeholder="Email Address">    
              </div>
              <div class="col-md-8">
                <label for="lbl_complete_address">Complete address</label>
               <input type="text" name="complete_address" class="form-control" id="lbl_complete_address" placeholder="Unit number/Street/Barangay/Town/City/Province"> 
              </div>
            </div> 
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-4">
                <label for="lbl_contact_number">Contact number</label>
                <input type="text" name="contact_number" class="form-control" id="lbl_contact_number" placeholder="Contact number">    
              </div>
              <div class="col-md-4">
                <label for="lbl_emergency_number">Emergency number</label>
                <input type="text" name="emergency_number" class="form-control" id="lbl_emergency_number" placeholder="Emergency number">    
              </div>
              <div class="col-md-4">
                <label for="lbl_license_number">License number</label>
                <input type="text" name="license_number" class="form-control" id="lbl_license_number" placeholder="License number">    
              </div>
            </div>
          </div>  
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" id="btn_add_driver" class="btn btn-success" data-dismiss="modal" onclick="javascript:window.location.reload()">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
