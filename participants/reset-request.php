<?php

if (isset($_POST['reset-request-submit'])) {

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/wushu-society/participants/?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require '../admin/db_connect.php';

    $userEmail = $_POST['email'];
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There Is An Error!!!";
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail,pwdResetSelector,pwdResetToken, pwdResetExpires) VALUES (?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There Is An Error!!!";
        exit();
    } else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }
    mysqli_stmt_close($stmt);

    require "../vendor/autoload.php"; 

    // Use statements for clarity (optional)
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true); // true enables SMTP

    $mail->IsSMTP();                           // Fixed.
    $mail->Host      = 'ssl://smtp.gmail.com'; // Fixed.
    $mail->Port      = '465';                  // Fixed.
    $mail->SMTPAuth  = true;                   // Fixed.
    $mail->Username  = 'dinjun0802@gmail.com';   // Your Gmail account name.
    $mail->Password  = 'Weedj0802';         // Your Gmail password.

    try {
        // Mail details.
        $mail->SetFrom('dinjun0802@gmail.com', 'noreplyuser'); // Your Gmail address.
        $mail->AddAddress($to);
        $mail->Subject  = $subject;
        $mail->Body     = $message;
    
        $mail->Send();
        echo '<p class="ok">Message successfully sent!</p>';
    } catch (Exception $e) {
        echo '<p class="error">' . $e->getMessage() . '</p>';
    }


    $to = $userEmail;
    $subject = "Reset your password !!!";
    $message = "<p>We received a password reset request. The link to reset your password is below. If you did not make this request, you can ignore this email</p>";
    $message .= "<p>Here is your password reset link: </br></p>";
    $message .= '<p><a href="' . $url . '">' . $url . '</a></p>';
    header('location: forget-password.php');

} else {
    header('location:intro.php');
}