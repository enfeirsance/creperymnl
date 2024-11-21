<?php

  session_start();
  include('../connection/gateway.php');
  $con = connection();

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
      if (isset($_POST['btnRegister'])) 

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $stmt = $con->prepare("INSERT INTO admin (fullname, email, password, access) VALUES (?, ?, ?, 'admin')");
        $stmt->bind_param("sss", $fullname, $email, $password);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "
            <script>alert('Successfully Registered');
            window.location = 'login.php';
            </script>";
            exit; 
        } 
        else {
            echo "<script>alert('Error: Unable to register.');</script>";
        }

        $stmt->close();
     }  else {
        echo "<script>alert('may kulang mi.');</script>";
    }
}

  $con->close();

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
        text-transform: capitalize;
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
        margin-top: 10px;
        text-align: center;
        font-size: 13px;
       }
       form p a {
        text-decoration: solid;
        color: deepskyblue;
       }
       .btn-field {
        width: 100%;
        display: flex;
        justify-content: space-between;
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
       .input-group {
        height: 250px;
       }
  </style>
</head>

<body>
    <div class="container">
        <div class="form-box">
              <h1>Sign up</h1>
            <form action="reg.php" method="POST">
                <div class="input-group">
                   <div class="input-field">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="fullname" placeholder="Fullname" required/>
                   </div>

                   <div class="input-field">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="Email" required/>
                   </div>

                   <div class="input-field">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="pass" placeholder="password" required/>
                   </div>
                  </div>
                  <div class="btn-field">
                    <button type="submit" name="btnRegister" >Get Started</button>
                  </div>
                  <p>Already have an account? <a href="login.php">Sign in</a></p>
            </form>
        </div>
    </div> 
</body>
</html>
