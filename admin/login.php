<?php
   session_start(); 
   include ('../connection/gateway.php'); 


   if(isset($_SESSION['UserLogin'])) {
     header('Location: dashboard.php');
     exit;
}

 if(isset($_POST['btnLogin'])) { 

    $email = $_POST['email'];
    $password = $_POST['pass'];
    $sqlLogin = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
    $resultLogin = mysqli_query($con, $sqlLogin);

    if ($resultLogin) {
        $total = mysqli_num_rows($resultLogin);

        if ($total > 0) {
            $row = mysqli_fetch_assoc($resultLogin);
            $_SESSION['UserLogin'] = $row['email'];
            $_SESSION['UserAccess'] = $row['access']; 
            header('Location: dashboard.php'); 
          exit; 

        } else {
            echo "<script> alert ('ulitin mo mi')</script>";
        }
    } else {
        echo "Error: " . mysqli_error($con);
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>admin</title>
    <script src="https://kit.fontawesome.com/a5fe06324f.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            box-sizing: border-box;
        }
        .container {
            height: 100vh;
            width: 100%;
            background: url('bgc.gif') no-repeat center center fixed;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        .form-box {
            width: 90%;
            max-width: 450px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background: grey;
            padding: 50px 60px 70px;
            text-align: center;
            border-radius: 10px;
        }
        .form-box h1 {
            font-size: 30px;
            margin-bottom: 60px;
            color: darkblue;
            position: relative;
            font-style: inherit;
        }
        .form-box h1::after {
            width: 30px;
            height: 4px;
            border-radius: 3px;
            background: none;
            position: absolute;
            bottom: -12px;
            left: 50px;
            transform: translateX(-50%);
        }
        .input-field {
            background: #eaeaea;
            margin: 15px 0;
            border-radius: 3px;
            display: flex;
            align-items: center;
        }
        input {
            width: 100%;
            background: transparent;
            border: 0;
            outline: 0;
            padding: 18px 15px;
        }
        .input-field i {
            margin-left: 15px;
            color: #999;
        }
        form p {
            text-align: center;
            font-size: 13px;
            margin-top: 15px; 
        }
        form p a {
            text-decoration: none;
            color: deepskyblue;
        }
        form p a:hover {
            text-decoration: underline;
        }
        .btn-field {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-top: 15px; 
        }
        .btn-field button {
            flex-basis: 100%;
            background: green;
            color: #fff;
            height: 40px;
            border-radius: 20px;
            border: 0;
            outline: 0;
            cursor: pointer;
            transition: background 1s;
        }
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: space-between;
            margin-top: 15px; 
            font-size: 12.5px;
        }
        .remember-forgot label {
            margin: 0;
            display: flex;
            align-items: center;
            color: #3c00a0; 
        }
        .remember-forgot label input {
            margin-right: 5px; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-box">
            <h1>LOGIN</h1>
            <form action="login.php" method="POST">
                <div class="input-group">
                    <div class="input-field">
                        <i class="fa-solid fa-envelope"></i>
                        <input type="email" name="email" placeholder="Email" required/>
                    </div>

                    <div class="input-field">
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="pass" placeholder="Password" required/>
                    </div>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox" name="remember"> Remember Me</label>
                    <a href="#">Forgot Password?</a> 
                </div>
                <div class="btn-field">
                    <button type="submit" name="btnLogin">Login</button>
                </div>
                <p>Don't have an account? <a href="reg.php">Sign up</a></p>
            </form>
        </div>
    </div> 
</body>
</html>

