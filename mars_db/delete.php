<?php

  if ( isset($_GET["martiab_id"]) ) {
    $martian_id = $_GET["martian_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "mars_db";

    // Create connection
    $connection = new mysqli($servername, $username, $password, $database);

    $sql = "DELETE FROM martian WHERE martian_id=$martian_id";
    $connection->query($sql);
  }

  header("Location: /mars_db/index.php");
  exit;

?>