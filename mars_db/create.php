<?php

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "mars_db";

  // Create connection
  $connection = new mysqli($servername, $username, $password, $database);


  $first_name = "";
  $last_name = "";
  $base_id = "";
  $super_id = "";

  $errorMessage = "";
  $successMessage = "";

  if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $base_id = $_POST["base_id"];
    $supre_id = $_POST["super_id"];

    do {
      if ( empty($first_name) || empty($last_name) || empty($base_id) || empty($supre_id) ) {
        $errorMessage = "All the fields are required";
        break;
      }

        // add new client to database
        $sql = "INSERT INTO martian (first_name, last_name, base_id, super_id) " . "VALUES ('$first_name', '$last_name', '$base_id', '$super_id')";

        $result = $connection->query($sql);

        if (!$result) {
          $errorMessage = "Invalid query: " . $connection->error;
          break;
        }

        $first_name = "";
        $last_name = "";
        $base_id = "";
        $super_id = "";

        $successMessage = "Client added correctly";

        header("Location: /mars_db/index.php");
        exit;

    } while (false);
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mars_db</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
  <div class="container my-5">
    <h2>Add</h2>

    <?php
      if ( !empty($errorMessage) ) {
        echo "
          <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>
        ";
      }
    ?>

    <form method="post">

      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Firstname</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="first_name" value="<?php echo $first_name; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Lastname</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="last_name" value="<?php echo $last_name; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Base ID</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="base_id" value="<?php echo $base_id; ?>">
        </div>
      </div>
      <div class="row mb-3">
        <label class="col-sm-3 col-form-label">Super ID</label>
        <div class="col-sm-6">
          <input type="text" class="form-control" name="super_id" value="<?php echo $super_id; ?>">
        </div>
      </div>

      <?php
        if ( !empty($successMessage) ) {
          echo "
            <div class='row mb-3'>
              <div class='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                  <sreong>$successMessage</strong>
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
              </div>
            </div>
          ";
        }
      ?>

      <div class="row mb-3">
        <div class="offset-sm-3 col-sm-3 d-grid">
          <button type="submit" class="btn btn-primary" href="/mars_db/index.php">Submit</button>
        </div>
        <div class="col-sm-3 d-grid">
          <a class="btn btn-outline-primary" href="/mars_db/index.php" role="button">Cancel</a>
        </div>
      </div>

    </form>
  </div>
</body>
</html>