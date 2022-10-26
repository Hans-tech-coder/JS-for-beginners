<?php

session_start();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>CRUD App</title>
  </head>
  <body>

    <div class="container mt-5">

      <?php include('message.php'); ?>

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <h4>Martian Add
                  <a href="index.php" class="btn btn-danger float-end">BACK</a>
                </h4>
            </div>
            <div class="card-body">
                <form action="code.php" method="post">

                  <div class="mb-3">
                    <label label>Firstname</label>
                    <input type="text" name="firstname" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label label>Lastname</label>
                    <input type="text" name="lastname" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label label>Base ID</label>
                    <input type="text" name="base_id" class="form-control">
                  </div>
                  <div class="mb-3">
                    <label label>Super ID</label>
                    <input type="text" name="super_id" class="form-control">
                  </div>
                  <div class="mb-3">
                    <button type="submit" name="save_martian" class="btn btn-primary">Save Martian</button>
                  </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>