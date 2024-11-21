  <?php

  session_start(); 
  
  include ('../connection/gateway.php'); 


  if(isset($_SESSION['UserLogin'])) {
    header('Location: dashboardd.php');
    exit;
  }

  if(isset($_POST['btnLogin'])) { 
    
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $sqlLogin = "SELECT * FROM vehicle_users WHERE username = '$username' AND password = '$password'";
    $resultLogin = mysqli_query($con, $sqlLogin);

  if ($resultLogin) {
        $total = mysqli_num_rows($resultLogin);

        if ($total > 0) {
            $row = mysqli_fetch_assoc($resultLogin);
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['UserAccess'] = $row['access']; 

            header('Location: dashboardd.php'); 
            exit; 
        } else {
            echo "<script>alert ('wrong username or password')</script>";
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
      <title>Login</title>
      <script src="https://kit.fontawesome.com/a5fe06324f.js" crossorigin="anonymous"></script>
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
    min-height: 100vh;
    background-color: #f1f1f1;
    background-size: cover;  

 }
 .container {
    background: darkgrey;
    width: 420px;
    border: 2px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    color: #fff;
    border-radius: 10px;
    padding: 30px 40px;
    margin-left: 380px;
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

  .container .register-link {
    font-size: 14.5px;
    text-align: center;
    margin: 20px 0px 20px;
 }
  .input-box input[type="text"] {
    color: black;
 }
  .input-box input[type="password"] {
    color: black;
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
  .input-box input::placeholder {
    color: black;
  }
  </style>
   </head>
     <body>
        <h2> contenthere </h2>
      <div class="container">
          <form action ="log.php" method="POST">
          <h1>LOGIN</h1>

     <div class="input-box">
          <i class="fa-solid fa-user"></i>
          <input type="text" name="username" placeholder="Username" required />
        </div>

     <div class="input-box">
          <i class="fa-solid fa-lock"></i>
          <input type="password" name="pass" placeholder="Password" required />
          </div>
     <div class="remember-forgot">
          <label><input type="checkbox" /> Remember Me</label>
          <a href="#" >Forgot Password?</a> 
     </div>

         <button type="submit" name="btnLogin" class="btn">Log in</button>

      <div class="register-link">
          <p>Don't have an account? <a href="register.php">Sign up</a></p>
        </div>
        </form>
      </div>

     </body>
   </html>


   