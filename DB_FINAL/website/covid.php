<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "HOTEL_DB";
// Create connection
$conn = new mysqli($servername, $username, $password, $database_name) or die("Unable to connect");

//Check connection
if ($conn->connect_error) {
  die("Η σύνδεση με την βάση δεδομένων απέτυχε: " . $conn->connect_error);
}
?>

<!DOCTYPE html>

<html>
<body>

  <header>
  <style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a, .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
  display: block;
}

</style>
</head>
<body>
<img src="mask.jpeg" width="500" height="333">
<ul>
  <li><a href="example.php">Home Page</a></li>
  <li><a href="customers.php">Our Customers</a></li>
  <li><a href="services.php">Our Services</a></li>
  <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">More</a>
    <div class="dropdown-content">
      <a href="info.php">Information</a>
      <a href="covid.php">Covid Positive</a>
    </div>
  </li>
</ul>
    <h1> Did Someone Test Positive to Covid-19?</h1>
    <form class="" action="" method="post">
      <p> Submit the NFC-ID of the tested positive customer: <input type = 'text' name = "nfcid" value = ""></p>
      <input type = 'submit' name = 'submit' value = 'Submit'>


      <?php
      $query = "
       SELECT nfcid,firstname, lastname, roomname, arrivaldate, arrivaltime, departuredate, departuretime
       FROM customers
       NATURAL JOIN visit
       NATURAL JOIN places
       WHERE nfcid = '{$_POST['nfcid']}'";

       $result = mysqli_query($conn, $query);

       ?>
       <?php
       while($rows_data = mysqli_fetch_assoc($result))
       {
         ?>
         <tr>
           <p>
           <td> NFC-ID: <?php echo $rows_data['nfcid'] ?></td>
           <td>  |  </td>
           <td> Firstname: <?php echo $rows_data['firstname'] ?></td>
           <td>  |  </td>
           <td> Lastname: <?php echo $rows_data['lastname'] ?></td>
           <td>  |  </td>
           <td> Roomname: <?php echo $rows_data['roomname'] ?></td>
           <td>  |  </td>
           <td> Arrivaldate: <?php echo $rows_data['arrivaldate'] ?></td>
           <td>  |  </td>
           <td> Arrivatime: <?php echo $rows_data['arrivaltime'] ?></td>
           <td>  |  </td>
           <td> Departuredate: <?php echo $rows_data['departuredate'] ?></td>
           <td>  |  </td>
           <td> Departuretime: <?php echo $rows_data['departuretime'] ?></td>
         </p>
         </tr>
         <?php
       }
       ?>
    </form>
