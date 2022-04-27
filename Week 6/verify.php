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
        $mysqli = new mysqli("localhost", "root", "", "week6");
        if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
            // Verify data
            $email = $mysqli->real_escape_string($_GET['email']); // Set email variable
            $hash = $mysqli->real_escape_string($_GET['hash']); // Set hash variable
            $search = mysqli_query($mysqli, "SELECT email, hash, active FROM users WHERE email='".$email."' AND hash='".$hash."' AND active='0'"); 
            $match  = mysqli_num_rows($search);
            if($match > 0){
                // We have a match, activate the account
                mysqli_query($mysqli, "UPDATE users SET active='1' WHERE email='".$email."' AND hash='".$hash."' AND active='0'");
                echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
            }else{
                // No match -> invalid url or account has already been activated.
                echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
            }
        } else {
            echo '<div class="statusmsg">Invalid approach, please use the link that has been send to your email.</div>';
        }
        ?>
    </div>
    
</body>

</html>