<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Include PHPMailer autoloader
include('../connection/gateway.php');

$conn = connection();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM vehicle_users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate OTP
        $otp = rand(100000, 999999);
        $expirationTime = date('Y-m-d H:i:s', strtotime('+10 minutes'));
        $sql = "INSERT INTO password_reset_tokens (email, token, expiration_time) VALUES ('$email', '$otp', '$expirationTime')";
      

        $conn->query($sql);
        // Create a PHPMailer instance
        $mail = new PHPMailer();

        // Set mailer to use SMTP
        $mail->isSMTP();

        // Specify SMTP server settings
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'parkinglotmontalban@gmail.com'; 
        $mail->Password = 'ckgp xngt rzlf fppj'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Email headers
        $mail->setFrom('pnoreply@yourdomain.com', 'Your Name');
        $mail->addAddress($email);
        $mail->Subject = "Your OTP for Password Reset";
        $mail->Body = "Your OTP for password reset is: $otp";

        // Send the email
        if ($mail->send()) {
            echo "An OTP has been sent to your email address.";
            header("Location: verify.php?email=" . urlencode($email));
            exit();
           
            
        } else {
            echo "There was an error sending the email: " . $mail->ErrorInfo;
        }
    } else {
        echo "No account found with that email address.";
        header("Location: password_recovery.php");
    }
} else {
    echo "No account found with that email address.";
    header("Location: password_recovery.php");
exit();
   
  
}

$conn->close();

?>
