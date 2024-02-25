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
      background-color: cyan;
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
    <style>
    body {
  background-image: url('hotel.jpg');
}
</style>


<h2 style="color:white;"> Welcome to the Hotel California!! &#9992</h2>
    <h3><em>We hope you have a wonderful stay!</em></h3>
    <p>Feel free to contact us if you have any questions or concerns</p>
    <p>Email: hotelcalifornia@gmail.com, Phone Number: 6908128735</p>
    </body>
</html>
