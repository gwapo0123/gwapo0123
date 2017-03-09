<div class="modal fade" id="add_reminder_modal" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Reminder</h4>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="lbl_title">Title</label>
            <input type="text" name="title" class="form-control" id="lbl_title" placeholder="Title">    
            <label for="lbl_message">Message</label>
            <textarea id="lbl_message" name="message" class="form-control" rows="5"></textarea>
          </div>
        </form>    
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <div class="col-md-12">
            <button type="button" id="btn_add_reminder" class="btn btn-success" data-dismiss="modal" onclick="javascript:window.location.reload()">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>