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
  body {
  background-image: url('sea3.jpg');
}
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
  background-color: yellow;
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
    </nav>
    <h1 style="color:sienna;"><em>Our Customers At The Moment</em></h1> 
    

    
  <table class="content-table">
    <thead>
      <caption><b>Information About Our Customers</b></caption>
      <tr>
        <th> NFC ID </th> 
        <th> First Name </th>
        <th> Last Name </th>
        <th> Date of Birth </th>
        <th> Email </th>
        <th> Phone Number </th>
        <th> Paper Type </th>
        <th> Paper ID </th>
        <th> Issue Date </th>
      </tr>
    </thead>

    <?php
    $query = "
    SELECT nfcid,firstname,lastname,birthdate,typeofpaper,issuedate,idpapernumber,email,phonenumber
    FROM customers
    NATURAL JOIN email NATURAL JOIN phonenumber";

    $result = mysqli_query($conn, $query);
    ?>
    <?php
    while($rows_data = mysqli_fetch_assoc($result))
    {
      ?>
      <tr>
        <td><?php echo $rows_data['nfcid'] ?></td>
        <td><?php echo $rows_data['firstname'] ?></td>
        <td><?php echo $rows_data['lastname'] ?></td>
        <td><?php echo $rows_data['birthdate'] ?></td>
        <td><?php echo $rows_data['email'] ?></td>  
        <td><?php echo $rows_data['phonenumber'] ?></td>
        <td><?php echo $rows_data['typeofpaper'] ?></td>
        <td><?php echo $rows_data['idpapernumber'] ?></td>
        <td><?php echo $rows_data['issuedate'] ?></td>      
      </tr>
      <?php
    }
    ?>       
  
</body>
</html>