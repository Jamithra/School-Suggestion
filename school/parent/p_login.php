<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign-in User</title>

    <!-- Bootstrap -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/4.1/examples/cover/cover.css" rel="stylesheet">
  <style type="text/css">
     .form-signin {
      max-width: 330px;
      padding: 15px;
      margin: 0 auto;
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin .checkbox {
        font-weight: normal;
      }
      .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }

      .form-signin input[type="email"] {
        margin-bottom: 10px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
  </style>
  </head>

  <body class="text-center">

   <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <h3 class="masthead-brand">Parents</h3>
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            
            <a class="nav-link" href="p_login.php" id="login">Login</a>
            <a class="nav-link" href="p_register.php" id="register">Register</a>
            <a class="nav-link" href="#" id="contact">Contact Us</a>
          </nav>
        </div>
      </header>
    
      <main role="main" class="inner cover" id="Main">
        <div id="display">
            <form class="form-signin" method="post" action="">
              <img src="">
              <h1 class="h3 mb-3 font-weight-normal">Please sign in:</h1>
              <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>
            </form>
        </div>
      </main>
    </div>
  </body>
</html>

<?php


include "../sql_access.php";

IF(ISSET($_POST['login'])){
$email = $_POST['email'];
$password = $_POST['password'];
$cek = mysqli_num_rows(mysqli_query($connect,"SELECT * FROM parent WHERE parent_uname='$email' AND parent_password='$password' "));
$data = mysqli_fetch_array(mysqli_query($connect,"SELECT * FROM parent WHERE parent_uname='$email' AND parent_password='$password'"));
echo $cek;
IF($cek > 0)
{
 session_start();
 $_SESSION['parent_id'] = $data['parent_id'];
 $_SESSION['child_id'] = $data['child_id'];
 echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='parent_menu.php';</script>";
}
else{
 echo "<script language=\"javascript\">alert(\"Invalid username or password\");document.location.href='p_login.php';</script>";
}
}

?>