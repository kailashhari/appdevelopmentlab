<!DOCTYPE html>
<html lang="en">

<head>
    <title>Email Signup</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container col-md-4 col-md-offset-4">
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require_once "vendor/autoload.php";
        $mail = new PHPMailer(TRUE);
        if (!isset($mysqli)) {
            $mysqli = new mysqli("localhost", "root", "", "week6");
        }
        if (isset($_POST['name']) && !empty($_POST['name']) and isset($_POST['email']) && !empty($_POST['email'])) {
            $name = $mysqli->real_escape_string($_POST['name']);
            $email = $mysqli->real_escape_string($_POST['email']);
            if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)) {
                $msg = 'The email you have entered is invalid, please try again.';
            } else {
                $msg = 'Your account has been made, <br /> please verify it by clicking the activation link that has been send to your email.';
                $hash = md5(rand(0, 1000));
                $password = rand(1000, 5000);
                mysqli_query($mysqli, "INSERT INTO users (username, password, email, hash) VALUES('" . $mysqli->real_escape_string($name) . "', '" . $mysqli->real_escape_string(password_hash($password, 1)) . "', '" . $mysqli->real_escape_string($email) . "', '" . $mysqli->real_escape_string($hash) . "') ");
                $to      = $email; // Send email to our user
                $subject = 'Signup | Verification'; // Give the email a subject 
                $message = '
  
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
  
------------------------
Username: ' . $name . '
Password: ' . $password . '
------------------------
  
Please click this link to activate your account:
http://localhost/appdevweek6/verify.php?email=' . $email . '&hash=' . $hash . '
  
'; // Our message above including the link

                $mail->setFrom('h.kailash1501@gmail.com', 'Kailash Hari');
                $mail->addAddress($email, $name);
                $mail->Subject = $subject;
                $mail->Body = $message;

                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = TRUE;
                $mail->SMTPSecure = 'tls';
                $mail->Username = 'h.kailash1501@gmail.com';
                $mail->Password = 'xutnwxqqlzanurtr';
                $mail->Port = 587;
                
                /* Disable some SSL checks. */
                $mail->SMTPOptions = array(
                   'ssl' => array(
                   'verify_peer' => false,
                   'verify_peer_name' => false,
                   'allow_self_signed' => true
                   )
                );

                if (!$mail->send()) {
                    /* PHPMailer error. */
                    echo $mail->ErrorInfo;
                }
            }
        }

        ?>
        <form action="" method="post">
            <h1>Signup</h1>
            <h4>Register with your name and email address.</h4>
            <?php
            if (isset($msg)) {  // Check if $msg is not empty
                echo '<div class="statusmsg">' . $msg . '</div>'; // Display our message and wrap it with a div with the class "statusmsg".
            }
            ?>
            <div class="form-group">
                <label for="nameInput">Name</label>
                <input type="text" class="form-control" id="nameInput" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <label for="emailInput">Email Address</label>
                <input type="email" class="form-control" id="emailInput" placeholder="Email" name="email">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>