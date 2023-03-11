<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<div class="wrapper">
         <div class="title-text">
            <div class="title signup">
               Signup Form
            </div>
         </div>
         
    <?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $location   = stripslashes($_REQUEST['location']);
        $query    = "INSERT into `users` (username, password, email, create_datetime,location)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime','$location')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="form-inner">
    <form class="form" action="" method="post">
    <div class="field">
        <input type="text" class="login-input" name="username" placeholder="Username" required />
    </div>
    <div class="field">
        <input type="text" class="login-input" name="email" placeholder="Email Adress">
    </div>
    <div class="field">
        <input type="password" class="login-input" name="password" placeholder="Password">
    </div>
    <div class="field">
        <input type="text" class="login-input" name="location" placeholder="Location">
    </div>
    <div class="field btn">
        <div class="btn-layer"></div>
        <input type="submit" name="submit" value="Register" class="login-button">
    </div>
        <p class="link">Already have an account? <a href="login.php">Login here</a></p>
    </form>
    </div>
<?php
    }
?>
</body>
</html>
