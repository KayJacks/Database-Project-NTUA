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
      body {
  background-image: url('sea.jpeg');
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

    <h2><em>What Whoul'd You Like To Know?</em></h2>
    <form class="" action="" method="post">
        <p>Give the ID of the service you whould like to use: <input type = 'text' name = "serviceid" value = "">
        <input type = 'submit' name = 'submit' value = 'Submit'></p>
        <p> Give the date that interestes you (insert date in form yyyy-mm-dd): <input type = 'text' name = 'dateofuse' value = ''>
        <input type = 'submit' name = 'submit' value = 'Submit'></p>
        <p> Give the minimum price of the service you are interested in: <input type = 'text' name = 'minimum' value = ''></p>
        <p> Give the maximum price of the service you are interested in: <input type = 'text' name = 'maximum' value = ''></p>
        <input type = 'submit' name = 'submit' value = 'Submit'></p>
        <p> Not all above options are required to be filled </p>
      </form>


        <?php

       $query = "
       SELECT firstname, lastname, arrivaldate, arrivaltime, departuredate, departuretime
       FROM customers
       NATURAL JOIN visit
       NATURAL JOIN places
       NATURAL JOIN providedby
       NATURAL JOIN services
       WHERE serviceid = '{$_POST['serviceid']}'";

       $result = mysqli_query($conn, $query);

       ?>
       <?php
       while($rows_data = mysqli_fetch_assoc($result))
       {
         ?>
         <tr>
           <p>
           <td> Firstname: <?php echo $rows_data['firstname'] ?></td>
           <td>  |  </td>
           <td> Lastname: <?php echo $rows_data['lastname'] ?></td>
           <td>  |  </td>
           <td> Arrival Date: <?php echo $rows_data['arrivaldate'] ?></td>
           <td>  |  </td>
           <td> Departure Date: <?php echo $rows_data['departuredate'] ?></td>
           <td>  |  </td>
           <td> Arrival Time: <?php echo $rows_data['arrivaltime'] ?></td>
           <td>  |  </td>
           <td> Departure Time: <?php echo $rows_data['departuretime'] ?></td>
         </p>
         </tr>
         <?php
       }
       ?>

      <?php
      $query = "
       SELECT firstname, lastname, dateofuse, description
       FROM customers
       NATURAL JOIN useservices
       NATURAL JOIN services
       WHERE dateofuse = '{$_POST['dateofuse']}'";

       $result = mysqli_query($conn, $query);

       ?>
       <?php
       while($rows_data = mysqli_fetch_assoc($result))
       {
         ?>
         <tr>
           <p>
           <td> Firstname: <?php echo $rows_data['firstname'] ?></td>
           <td>  |  </td>
           <td> Lastname: <?php echo $rows_data['lastname'] ?></td>
           <td>  |  </td>
           <td> Date and Time: <?php echo $rows_data['dateofuse'] ?></td>
           <td>  |  </td>
           <td> Location: <?php echo $rows_data['description'] ?></td>
         </p>
         </tr>
         <?php
       }
       ?>
       <?php
       $minimum = $_POST['minimum'];
       $maximum = $_POST['maximum'];
       $query = "
       SELECT serviceid, chargeofsubscription, generaldescription
       FROM services
       WHERE (($minimum < chargeofsubscription) and (chargeofsubscription < $maximum))
       ";
       $result = mysqli_query($conn, $query);

       ?>

       <?php
       while($rows_data = mysqli_fetch_assoc($result))
       {
        ?>
         <tr>
           <p>
           <td> Service id: <?php echo $rows_data['serviceid'] ?></td>
           <td>  |  </td>
           <td> Charge of Subscription: <?php echo $rows_data['chargeofsubscription'] ?></td>
           <td>  |  </td>
           <td> General Subscription: <?php echo $rows_data['generaldescription'] ?></td>
          </p>
         </tr>
        <?php
      }

        ?>
  </body>
