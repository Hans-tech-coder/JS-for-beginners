<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>mars_db</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
      <h2>Martian</h2>
      <a class="btn btn-primary" href="/mars_db/create.php" role="button">Add</a>
      <br>
      <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Base ID</th>
            <th>Super ID</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>

          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "mars_db";

            // Create connection
            $connection = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($connection->connect_error) {
              die("Connection failed: ". $connection->connect_error);
            }

            // Read all row from databae table
            $sql = "SELECT * FROM martian";
            $result = $connection->query($sql);

            if (!$result) {
              die("Incalid query: ". $connection->error);
            }

            // Read data of each row
            while($row = $result->fetch_assoc()) {
              echo "
              <tr>
              <td>$row[martian_id]</td>
              <td>$row[first_name]</td>
              <td>$row[last_name]</td>
              <td>$row[base_id]</td>
              <td>$row[super_id]</td>
              <td>
                <a class='btn btn-primary btn-sm' href='/mars_db/edit.php?martian_id=$row[martian_id]'>Edit</a>
                <a class='btn btn-danger btn-sm' href='/mars_db/delete.php?martian_id=$row[martian_id]'>Delete</a>
              </td>
            </tr>
              ";
            }
          ?>

          
        </tbody>
      </table>
    </div>

</body>
</html>