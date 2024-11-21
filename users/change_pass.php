<?php
   if (!isset($_SESSION)) {
    session_start();
 }

   include('../connection/gateway.php');

  $conn = connection();
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $otp = $_POST['otp'];
    $new_password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);

    // Check if the OTP is valid
    $sql = "SELECT * FROM password_reset_tokens WHERE email='$email' AND token='$otp' AND expiration_time >= " . date("U");
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Update the user's password in the database
        $sql = "UPDATE vehicle_users SET password='$new_password' WHERE email='$email'";
        if ($conn->query($sql) === TRUE) {
            echo "Your password has been reset successfully.";
            
            // Delete the used OTP
            $sql = "DELETE FROM password_reset_tokens WHERE email='$email' AND token='$otp'";
            $conn->query($sql);
            header("Location: log.php");
exit();
        } else {
            echo "There was an error resetting your password.";
        }
    } else {
        echo "Invalid OTP or OTP has expired.";
    }
}

$conn->close();
?>