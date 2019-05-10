<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign-in School</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">
  </head>

  <body>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <div class="container">
      <header class="masthead mb-auto">
        <h3 class="masthead-brand">Company name</h3>
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link" href="nav_home.php">Home</a>
            <a class="nav-link" href="u_login.php" id="login">Login</a>
            <a class="nav-link" href="user_signup.php" id="reg">Register</a>
            <a class="nav-link" href="#" id="contact">Contact Us</a>
          </nav>
        </div>
      </header>

      <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Please sign in:</h2>
        <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
      </form>

    </div>
  </div>
  </body>
</html>
<?php
include "../sql_access.php";

IF(ISSET($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
$cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM school WHERE school_username='$email' AND school_password='$password' "));
$data = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM school WHERE school_username='$email' AND school_password='$password'"));
echo $cek;
IF($cek > 0)
{
 session_start();
 $_SESSION['school_id'] = $data['school_id'];
 echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='school_menu.php';</script>";
}
else{
 echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='s_login.php';</script>";
}
}
?>