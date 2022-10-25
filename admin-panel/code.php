<?php
  session_start();

  $connection = mysqli_connect("localhos","root", "", "mars_db");

  if(isset($_POST['registerbtn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $possword = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];

    if($cpassword === $cpassword); {

      $query = "INSERT INTO register (username,email,password) VALUES ('$username', 'email', 'password')";
    $query_run = mysqli_query($connection, $query);

    if($query_run) {
      echo "Saved";
      $_SESSION['success'] = "Admin Profile Added";
      header('Location: register.php');
    } else {
      echo "Not Save";
      $_SESSION['status'] = "Admin Profile NOT Added";
      header('Location: register.php');
    }

    }

  } else {
    $_SESSION['status'] = "Password and Confirm Password Does Not Match";
      header('Location: register.php');
  }


?>