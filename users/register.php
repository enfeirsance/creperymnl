<?php
   if (!isset($_SESSION)) {
    session_start();
 }

   include('../connection/gateway.php');

  $con = connection();

  if (isset($_POST['btnRegister'])) {
    $fname = $_POST['fname'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $access = "user";

    $sql = "INSERT INTO vehicle_users (fname, email, age, username, password, access)
            VALUES ('$fname', '$email', '$age', '$username', '$pass', '$access')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        echo "<script>alert('welcome');
        window.location = 'log.php';
        </script>";
    } else {
        echo "Invalid Registration";
    }
 }
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Registration</title>
    <script src="https://kit.fontawesome.com/a5fe06324f.js" crossorigin="anonymous"></script>
  </head>
 </head>
 <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Times New Roman', Times, serif;
   }

   body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      background-color: #f1f1f1;

     }
      .container {
      background: darkgrey;
      width: 420px;
      border: 2px solid rgba(255, 255, 255, 0.1);
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      color: #fff;
      border-radius: 10px;
      padding: 30px 40px;
      margin-left: 700px;
   }
     .container h1 {
      font-size: 36px;
      text-align: center;
      color: cyan;
  }

 .container .input-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0px;

  }
 .input-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    font-size: 16px;
    color: #fff;
    padding: 20px 45px 20px 20px;   
  }
 .input-box input::placeholder {
    color: #fff;
  }

 .container .remember-forgot {
    display: flex;
    justify-content: space-between;
    font-size: 14.5px;
    margin: -15px 0px 15px;
  }

 .remember-forgot label input {
    color: #fff;
    margin-right: 3px;
  }

 .remember-forgot a {
    color: #fff;
    text-decoration: none;
  }
 .remember-forgot a:hover {
    text-decoration: underline;
  }
     .container .btn {
       width: 100%;
        height: 45px;
        background: lime;
        border: none;
        outline: none;
        border-radius: 5px;
        box-decoration-break: 0px 0px 10px rgba(0, 0, 0, 0.1);
        cursor: pointer;
        font-size: 16px;
        font-weight: 400;
        color: #333;
  }
    .input-box {
    background: gainsboro;
        margin: 15px 0;
        border-radius: 3px;
        display: flex;
        align-items: center;
  }
 .input-box i {
    margin-left: 15px;
    margin-right: 15px;
        color: #999;
   }
 .container .register-link {
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0px 20px;
 }

 .register-link p a {
    color: #fff;
    text-decoration: none;
 }

 .register-link p a:hover {
    text-decoration: underline;
    color: blue;
 }
  h2 {
    font-size: 56px;
    margin-left: 100px;
    margin-bottom: 500px;
    font-style: italic;
 }
 .input-box input::placeholder {
    color: black;
 }
 .input-box input[type="text"] {
    color: black;
 }
 .input-box input[type="email"] {
    color: black;
 }
 .input-box input[type="password"] {
    color: black;
 }
 </style>
     <body>
         <div class="container">
             <form action ="register.php" method="POST">
             <h1>REGISTER</h1>
         <div class="input-box">
             <i class="fa-solid fa-user"></i>
             <input type="text" name="fname"placeholder="Fullname" required />
         </div>
         <div class="input-box">
             <i class="fa-solid fa-envelope"></i>
             <input type="email" name="email"placeholder="Email" required />
         </div>
         <div class="input-box">
             <i class="fa-solid fa-user"></i>
             <input type="text" name="age"placeholder="Age" required />
         </div>
         <div class="input-box">
             <i class="fa-solid fa-user"></i>
             <input type="text" name="username"placeholder="Username" required />
         </div>
         <div class="input-box">
             <i class="fa-solid fa-lock"></i>
             <input type="password" name="pass" placeholder="Password" required />
             </div>
     <div class="remember-forgot">
             <label><input type="checkbox" /> Remember Me</label>
             <a href="password_recovery.php" >Forgot Password?</a> 
          </div>

         <button type="submit" name="btnRegister" class="btn">Get Started</button>

         <div class="register-link">
            <p>Already have an account? <a href="log.php">Sign in</a></p>
          </div>
           </form>
        </div>
     </body>

   </html>