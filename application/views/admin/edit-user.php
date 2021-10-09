<!-- Modal -->
<div class="modal fade" id="editModal-<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update user</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url() ?>update-user" method="post">
        <div class="modal-body">

          <div class="form-group">
            <label>Names*</label>
            <input type="text" name="full_name" class="form-control" required value="<?= $user['full_name'] ?>">
          </div>


          <div class="form-group">
            <label>Email*</label>
            <input type="email" name="email" class="form-control" required value="<?= $user['email'] ?>">
          </div>


          <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>">
          </div>


          <div class="form-group">
            <label>Role</label>
            <select class="custom-select" name="role">
                <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
            </select>
          </div>

          <div class="form-group">
             <input type="checkbox" name="reset_password" class="" id="reset_password_<?= $user['id'] ?>">
             <label for="reset_password_<?= $user['id'] ?>">Reset password</label>
          </div>
            
        </div>
        <div class="modal-footer">
          <input type="hidden" name="id" value="<?= $user['id'] ?>">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button class="btn btn-primary" type="submit">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>