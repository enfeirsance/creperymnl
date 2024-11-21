<?php
 if (!isset($_SESSION)) {
    session_start();
 }
  include('../connection/gateway.php');
 $con = connection();

  if (isset($_POST['btnBooking'])) {
    $errors = [];

    $requiredFields = ['firstname', 'lastname', 'email', 'vehicle_type', 'platenumber', 'parking_in', 'paymentMethod'];
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "The $field field is required.";
        }
    }
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        exit; 
    }

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $vehicle_type = $_POST['vehicle_type'];
    $platenumber = $_POST['platenumber'];
    $parkingIn = $_POST['parking_in'];
    $dateBooked = $_POST['dateBooked'];

    $parkingOut = !empty($_POST['parking_out']) ? $_POST['parking_out'] : null;
    $paymentMethod = $_POST['paymentMethod'];

    $sql = "INSERT INTO booking_form (firstname, lastname, email, vehicle_type, platenumber, parking_in, parking_out, paymentMethod)
            VALUES ('$firstname', '$lastname', '$email', '$vehicle_type', '$platenumber', '$parkingIn', '$parkingOut', '$paymentMethod')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script> alert('Successful! Wait for approval');
            window.location = 'dashboardd.php';
            </script>";
    } else {
        echo "Error: " . mysqli_error($con);
    }
}
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
            height: 100%;
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
    0% {
        color: red;
    }
    25% {
        color: orange;
    }
    50% {
        color: yellow;
    }
    75% {
        color: green;
    }
    100% {
        color: blue;
    }
}

#welcome-text {
    animation: fadeIn 2s forwards, colorChange 5s infinite;
}


#welcome-text {
    animation: fadeIn 2s forwards, colorChange 3s infinite;
}
       .booking-box {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(189, 183, 107, 0.8);
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            margin-top: 15Px;
            margin-left: 300px;
        }

        .booking-box h2 {
            text-align: center;
            margin-bottom: 50px;
            color: darkred;
        }

        .booking-box form {
            width: 100%;
         
        }

        .mb-3 {
            margin-bottom: 15px;
        }

        .custom-select {
            position: relative;
            margin-bottom: 20px;
        }

        .custom-select label {
            display: block;
            margin-bottom: 5px;
        }

        .custom-select select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            cursor: pointer;
            padding-right: 30px;
            position: relative;
        }

        .custom-select .arrow {
            position: absolute;
            top: 68%;
            right: 10px;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid gray;
            pointer-events: none;
        }

        button {
            width: 100%;
        }
       
        #reserve-now {
            background: url('montalban.jpg') no-repeat center center fixed;
            background-size: cover;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            width: 100vw;
            margin-left: -0px; 
        }
        #reserve-now {
         background: url('montalban.jpg') no-repeat center center fixed;
         background-size: cover;
         padding: 20px;
         display: flex;
         justify-content: center;
    }

       #reserve-now .booking-box {
    background-color: rgba(189, 183, 107, 0.8);
    width: 100%;
    max-width: 800px; 
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    #home h2 {
       margin-bottom: 60px;
   }

    </style>
</head>
<body>
<div class="sidebar">
    <h2 id="welcome-text">Welcome!</h2>
    <ul>
        <li><a href="#home" onclick="showContent('home')"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="#reserve-now" onclick="showContent('reserve-now')"><i class="fas fa-calendar-plus"></i> Reserve Now</a></li>
        <li><a href="#my-profile" onclick="showContent('my-profile')"><i class="fas fa-user"></i> My Profile</a></li>
        <li><a href="#notif" onclick="showContent('notif')"><i class="fas fa-bell"></i> Notification</a></li>
        <li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
    </ul>
</div>
        <div class="content">
            
            <div id="home" class="content-section">
                <h2>Parking Rates</h2>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-4">
                            <input type="text" class="form-control" id="carRate" value="[Four Wheels Rate] - Php 40 per hour" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-4">
                            <input type="text" class="form-control" id="motorcycleRate" value="[Two Wheels Rate] - Php 20 per hour" readonly>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div id="reserve-now" class="content-section">
                <div class="booking-box">
                    <h2>Reserve your spot</h2>
                    <form action="dashboardd.php"  method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="f_name" class="form-label">First Name</label>
                                    <input type="text" name="firstname" class="form-control" id="f_name" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="l_name" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" class="form-control" id="l_name" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="platenum" class="form-label">Plate Number</label>
                                    <input type="text" name="platenumber" class="form-control" id="platenum" aria-describedby="emailHelp" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="parking-in" class="form-label">Time In</label>
                                    <input type="time" name="parking_in" class="form-control" id="parking-in" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="parking-out" class="form-label">Time Out</label>
                                    <input type="time" name="parking_out" class="form-control" id="parking-out">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="custom-select">
                                    <label for="vehicleType" class="form-label">Vehicle Type</label>
                                    <select name="vehicle_type" id="vehicleType" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="Car">Car</option>
                                        <option value="Motorcycle">Motorcycle</option>
                                        <option value="Truck">Bicycle</option>
                                        <option value="e-Bike">e-Bike</option>
                                    </select>
                                    <div class="arrow"></div>
                                </div>
                            <div class="col-md-12">
                                <div class="custom-select">
                                    <label for="paymentMethod" class="form-label">Payment Method</label>
                                    <select name="paymentMethod" id="paymentMethod" class="form-control" required>
                                        <option value="">Select</option>
                                        <option value="GCASH">GCASH</option>
                                        <option value="COA">Cash on Arrival</option>
                                    </select>
                                    <div class="arrow"></div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <button type="submit" name="btnBooking" class="btn btn-danger" >Book</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            </div>
            <div id="my-profile" class="content-section">
                
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

