<?php


include('../connection/gateway.php');
$con = connection();

if (isset($_POST['forgot_password'])) {
    $email = $_POST['email']; 
   
    $sql = "SELECT * FROM vehicle_users WHERE email = '$email'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);
    if ($user) {
       
        $token = bin2hex(random_bytes(32)); 
        $user_id = $user['id']; 

       
        $sql = "INSERT INTO password_reset_tokens (user_id, token, expiration_time) VALUES ('$user_id', '$token', NOW() + INTERVAL 1 HOUR)";
        mysqli_query($con, $sql);

       
        $reset_link = "http://example.com/reset_password.php?token=$token";
        $to = $email;
        $subject = "Password Reset Request";
        $message = "Click the link below to reset your password:\n$reset_link";
        $headers = "From: your@example.com";
        mail($to, $subject, $message, $headers);

        echo "Password reset link has been sent to your email.";
    } else {
        echo "No user found with that email address.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
</head>
<body>
    <h2>Forgot Password</h2>
    <form action="forgot_password.php" method="POST">
        <label for="email">Enter your email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <button type="submit" name="forgot_password">Reset Password</button>
    </form>
</body>
</html>
