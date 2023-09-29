<!-- Modal for editing -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit User</h5>
      </div>
      <div class="modal-body">
        <form id="editForm" method="post">
          <input type="hidden" id="editUserId" name="id" value="">
          <input type="text" id="editUserName" name="name" class="form-control">
          <input type="email" id="editUserEmail" name="email" class="form-control">
          <input type="text" id="editUserMobile" name="mobile" class="form-control">
          <input type="password" id="editUserPassword" name="password" class="form-control">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="saveChangesButton">Save changes</button>
      </div>
    </div>
  </div>
</div>