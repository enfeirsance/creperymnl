<?php
include('../connection/gateway.php'); 
$con = connection(); 


   if(isset($_GET['delete'])) {
         $id = mysqli_real_escape_string($con, $_GET['delete']);
         mysqli_query($con, "DELETE FROM `booking_form` WHERE `user_id` = '$id'");
         header("location: dashboard.php");
         exit; 
  }


  if(isset($_GET['approve'])) {
    $a="approved";
       $id = mysqli_real_escape_string($con, $_GET['approve']);
       mysqli_query($con, "update booking_form set approved='$a'  WHERE `user_id` = '$id'");    
       header("location: dashboard.php");
   
  }

     $fetchdata = mysqli_query($con, "SELECT user_id,firstname,lastname,email,vehicle_type, platenumber,parking_in, parking_out, paymentMethod, dateBooked,approved  FROM booking_form WHERE approved=''   ");
     $ap = mysqli_query($con, "SELECT user_id,firstname,lastname,email,vehicle_type, platenumber,parking_in, parking_out, paymentMethod, dateBooked,approved  FROM booking_form WHERE approved='approved'   ");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        html, body {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }

        .container {
            display: flex;
            height: 100%;
        }

        .sidebar {
            width: 220px;
            background-color: #2c3e50;
            padding: 20px;
            box-sizing: border-box;
            color: white;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .sidebar h2 {
            margin-bottom: 40px;
            margin-left: 20px;
            color: #ecf0f1;
            font-size: 24px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
            width: 100%;
        }

        .sidebar ul li {
            margin: 15px 0;
            width: 100%;
            text-align: left;
            position: relative;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: flex;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            border-radius: 4px;
        }

        .sidebar ul li a:hover {
            background-color: #34495e;
            color: #ffeb3b;
        }

        .sidebar ul li a i {
            margin-right: 10px;
        }

        .content {
            margin-left: 220px;
            flex: 1;
            padding: 20px;
            box-sizing: border-box;
            overflow-y: auto;
            width: calc(100% - 220px);
        }

        .content-section {
            display: none;
        }

        .content-section h2 {
            margin-top: 0;
            text-align: center;
            color: mediumslateblue;
        }

        @keyframes colorChange {
            0% { color: red; }
            25% { color: orange; }
            50% { color: yellow; }
            75% { color: green; }
            100% { color: blue; }
        }

        #welcome-text {
            animation: fadeIn 2s forwards, colorChange 3s infinite;
        }

        table {
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            white-space: nowrap;
        }

        th {
            background-color: #f8f9fa;
        }

        .approve, .delete {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .approve {
            background-color: green;
        }

        .delete {
            background-color: red;
        }

        /* Added CSS for margin */
        .table-container {
            margin-left: 15px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h2 id="welcome-text">Welcome!</h2>
            <ul>
                <li><a href="dashboard.php" onclick="showContent('home')"><i class="fas fa-home"></i> Home</a></li>
                <li><a href="#manage-bookings" onclick="showContent('manage-bookings')"><i class="fas fa-tasks"></i> Manage Bookings</a></li>
                <li><a href="#view-bookings" onclick="showContent('view-bookings')"><i class="fas fa-history"></i> View Bookings</a></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
        <div class="content">
            <div id="manage-bookings" class="content-section">
                <h2>Bookings</h2>
                <div class="container table-container">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Vehicle type</th>
                                    <th scope="col">Plate Number</th>
                                    <th scope="col">Time in</th>
                                    <th scope="col">Time out</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Date Booked</th>
                                    <th scope="col">Actions</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_array($fetchdata)) {
                                ?>
                                <tr>
                                    <td><?php echo $row["user_id"]; ?></td>
                                    <td><?php echo $row["firstname"]; ?></td>
                                    <td><?php echo $row["lastname"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["vehicle_type"]; ?></td>
                                    <td><?php echo $row["platenumber"]; ?></td>
                                    <td><?php echo $row["parking_in"]; ?></td>
                                    <td><?php echo $row["parking_out"]; ?></td>
                                    <td><?php echo $row["paymentMethod"]; ?></td>
                                    <td><?php echo $row["dateBooked"]; ?></td>
                                    <td><a href="dashboard.php?approve=<?php echo $row['user_id'];?>" class="approve">Approve</a></td>
                                    <td><a href="dashboard.php?delete=<?php echo $row['user_id'];?>" class="delete">Decline</a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="view-bookings" class="content-section">
                <h2>Approved Bookings</h2>
                <div class="container table-container">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Vehicle type</th>
                                    <th scope="col">Plate Number</th>
                                    <th scope="col">Time in</th>
                                    <th scope="col">Time out</th>
                                    <th scope="col">Payment Method</th>
                                    <th scope="col">Date Booked</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while ($row = mysqli_fetch_array($ap)) {
                                ?>
                                <tr>
                                   
                                    <td><?php echo $row["user_id"]; ?></td>
                                    <td><?php echo $row["firstname"]; ?></td>
                                    <td><?php echo $row["lastname"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php echo $row["vehicle_type"]; ?></td>
                                    <td><?php echo $row["platenumber"]; ?></td>
                                    <td><?php echo $row["parking_in"]; ?></td>
                                    <td><?php echo $row["parking_out"]; ?></td>
                                    <td><?php echo $row["paymentMethod"]; ?></td>
                                    <td><?php echo $row["dateBooked"]; ?></td>
                                    <td><?php echo $row["approved"]; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function showContent(sectionId) {
            var sections = document.getElementsByClassName('content-section');
            for (var i = 0; i < sections.length; i++) {
                sections[i].style.display = 'none';
            }
            document.getElementById(sectionId).style.display = 'block';
        }

        showContent('home');

        document.addEventListener('DOMContentLoaded', function() {
            var welcomeText = document.getElementById('welcome-text');
            welcomeText.style.opacity = '1';
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-MX3sWbZj/5pKQ1byqOZz9Piwf/kA7TB1LzR4E/+6brZFoTC14eQnQwT/W/AUwEj" crossorigin="anonymous"></script>
</body>
</html>
