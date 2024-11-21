<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Password Verification Recovery - Montalban Town Center Parking Reservation System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 40px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            text-align: center;
        }
        .header {
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            color: #666;
        }
        .form {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .form h2 {
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }

        .form .input-box {
            position: relative;
            margin-bottom: 20px;
        }

        .form .input-box i {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 10px;
            color: #777;
        }

        .form input[type="email"] {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            padding-left: 35px;
        }
        .form input[type="password"] {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            padding-left: 35px;
        }
        .form input[type="text"] {
            width: calc(100% - 30px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            padding-left: 35px;
        }

        .form button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>OTP Verification</h1>
        </div>
        
        <div class="form">
            <h2>Verify OTP</h2>
            <form method="POST" action="change_pass.php">
        <label for="email">Email:</label>
       
        <input type="email" id="email" name="email" required>
        <label for="otp">OTP:</label>
        <input type="text" id="otp" name="otp" required>
       <br>
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
       <br>
        <button type="submit">Reset Password</button>
    </form>
        </div>
        
</body>
</html>


