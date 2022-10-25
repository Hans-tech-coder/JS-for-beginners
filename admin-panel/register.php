<?php
  include('includes/header.php');
  include('includes/navbar.php');
?>

<!-- Modal -->
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <form action="code.php" method="POST"></form>
      <div class="modal-body">

        <div class="form-group">
          <label>Username</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Username">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Email">
        </div>
        <div class="form-group">
          <label>Password</label>
          <input type="text" name="username" class="form-control" placeholder="Enter Password">
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input type="text" name="username" class="form-control" placeholder="Re-type Password">
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
      </div>
  </form>

    </div>
  </div>
</div>

<div class="container-fluid">

<!-- DataTables Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">Add Admin Profile</button>
  </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Martian ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Base ID</th>
            <th>Suped ID</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</div>

  
</div>
<!-- /.container-fluid -->

<?php
  include('includes/script.php');
  include('includes/footer.php');
  ?>