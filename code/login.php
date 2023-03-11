<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login Form
            </div>
</div>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: index.html");
        } elseif($username=='admin'){
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: admin.html");
        }
        else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<div class="form-inner">
    <form class="form" method="post" name="login">
        <div class="field">
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/>
        </div>
        <div class="field">
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        </div>
        <div class="field btn">
        <div class="btn-layer"></div>
        <input type="submit" value="Login" name="submit" class="login-button" />
        </div>
        <br>
        <p class="link">Don't have an account? <a href="registration.php">Registration Now</a></p>
  </form>
    </div>
<?php
    }
?>
</body>
</html>
