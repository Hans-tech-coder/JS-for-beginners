<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "mars_db";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

  $martian_id = "";
  $first_name = "";
  $last_name = "";
  $base_id = "";
  $super_id = "";

  $errorMessage = "";
  $successMessage = "";

  if ( $_SERVER['REQUEST_METHOD'] == 'GET' ) {
    // GET method: Show the data of the client
    if ( !isset($_GET["martian_id"]) ) {
      header("Locarion: /mars_db/index.php");
      exit;
    }

    $martian_id = $_GET["martian_id"];

    //Read row of the selected client from database table
    $sql = "SELECT * FROM martian WHERE martian_id=$martian_id";

    $result = $connection->query($sql);
    $row = $result->fetch_assoc();

    if (!$row) {
      header("Location: /mars_db/index.php");
    }

    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $base_id = $row["base_id"];
    $super_id = $row["super_id"];

  } else {
    // POST method: Update the data of the client
    $martian_id = $_POST["martian_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $base_id = $_POST["base_id"];
    $super_id = $_POST["super_id"];

    do {
      if ( empty($martian_id) || empty($first_name) || empty($last_name) || empty($base_id) || empty($super_id) ) {
        $errorMessage = "All the fields are required";
        break;
    }

    $sql = "UPDATE martian " . "SET first_name = '$first_name', last_name = '$last_name', base_id = '$base_id', super_id = '$super_id'" . "WHERE martian_id = $martian_id";

    $result = $connection->query($sql);

    if (!$result) {
      $errorMessage = "Invalid query: " . $connection->error;
      break;
    }

    $successMessage = "Client Updated correctly";

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
    <h2>Edit</h2>

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

      <input type="hidden" name="martian_id" value="<?php echo $martian_id; ?>">
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