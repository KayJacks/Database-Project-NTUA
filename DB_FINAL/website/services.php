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
<img src="resortbar.jpg" width="500" height="333">
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
  background-color: lightgreen;
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
<h2 style = "color:brown;">Our hotel offers a variety of restaurants, bars, gyms, shaunas and so much more services you can enjoy by the sea!!</h2>
    <table class="content1">
    <thead>
      <caption><b><em>Our current available services/locations</em></b></caption>
    </thead>

    <?php
        $query = "
        SELECT generaldescription, roomname
        FROM places NATURAL JOIN providedby NATURAL JOIN services";

        $result = mysqli_query($conn, $query);
        ?>
        <?php
        while($rows_data = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
            <td><?php echo $rows_data['generaldescription'] ?></td>
            <td>/</td>
            <td><?php echo $rows_data['roomname'] ?></td>
       </tr>
        <?php
        }
        ?>

  <table class="content">
    <thead>
      <caption><b>Sales per Service</b></caption>
      <tr>
        <th> Type of Service </th>
        <th> Earnings in euros</th>
      </tr>
    </thead>

        <?php
        $query = "
        SELECT generaldescription, (sum(charge) + sum(chargeofsubscription)) as overallcharge
        FROM useservices NATURAL JOIN services
        group by generaldescription";

        $result = mysqli_query($conn, $query);
        ?>
        <?php
        while($rows_data = mysqli_fetch_assoc($result))
        {
        ?>
        <tr>
            <td><?php echo $rows_data['generaldescription'] ?></td>
            <td><?php echo $rows_data['overallcharge'] ?></td>
        </tr>
        <?php
        }
        ?>

<html>
<body>
