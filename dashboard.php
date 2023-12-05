<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>ADMIN</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  table h2{
    color: #F4DFC8;
}

table th{
    color: #31393c;
    background: #3e96f4;
}

table td{
    color: #191717;
    text-align: center;
    vertical-align: middle;
}
#ed{
    border: 1px solid #4283e8;
    background-color: #4283e8;
    padding: 1vh 1vw;
    color: #F1EFEF;
}
#del{
    border: 1px solid #bc1b22;
    background-color: #bc1b22;
    padding: 1vh 1vw;
    color: #F1EFEF;
}

#del:hover{
    background-color: #F1EFEF;
    color: #bc1b22;
}
#ed:hover{
    background-color: #F1EFEF;
    color: #4283e8;
}
</style>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="bg-dark p-4">
          <h2 class="text-white">Navigation</h2>
          <div class="border-bottom border-2 border-danger"><br></div>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link text-white fw-bold" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fw-bold" href="#">News</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fw-bold" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white fw-bold" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-md-9">
        <!-- Your main content goes here -->
        <h1>ADMINISTRATION SECTION!</h1>
        <p>use it more caution! to prevent distruction of files you may ask your database adminstration first.</p>
        
        <table cellspacing="5" cellpadding="5" border  = "1" id = "customer" class="table thead-dark">
            <tr>
            <th>Full Name</th>
            <th>Phone Number</th>
            <th>Reservation Date</th>
            <th>Reservation Time</th>
            <th>Party Size</th>
            <th>Customer Request </th>
            <th>Action</th>
            </tr>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "sad";

                $connection = new mysqli($servername,$username,$password,$database);

                // check connection
                if($connection->connect_error){
                    die("Connection : ERROR " . $connection->connect_error);
                }

                //read data
                $sql = "SELECT * FROM customer";
                $result = $connection->query($sql);

                if(!$result){
                    die("INVALID query " . $connection->error);
                }

                
        while ($row = $result->fetch_assoc()) {
            echo "
            <tr>
                <td>{$row['name']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['r_date']}</td>
                <td>{$row['r_time']}</td>
                <td>{$row['p_size']}</td>
                <td>{$row['c_order']}</td>
                <td>
                    <a href='delete.php?phone={$row['phone']}'><button id='del'>delete</button></a>
                </td>
            </tr>
            ";
        }

            ?>
        </table>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
