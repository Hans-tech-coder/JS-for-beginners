<?php
  session_start();
  require 'dbcon.php';

  if(isset($_POST['save_martian'])){

    $firstname = mysqli_real_escape_string($con, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($con, $_POST['lastname']);
    $base_id = mysqli_real_escape_string($con, $_POST['base_id']);
    $super_id = mysqli_real_escape_string($con, $_POST['super_id']);

    $query = "INSERT INTO martian (firstname,lastname,base_id,super_id)VALUES ('$firstname','$lastname','base_id','super_id')";

    $query_run = mysqli_query($con, $query);
    if($query_run){

      $_SESSION['message'] = "Martian Created Successfully";
      header("Location: martian-create.php");
      exit(0);

    } else {

      $_SESSION['message'] = "Martian NOT Created";
      header("Location: martian-create.php");
      exit(0);

    }

  }

?>