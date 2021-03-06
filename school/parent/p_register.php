
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    

    <title>User Sign Up</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
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
      .form-signin input[type="name"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
      .form-signin input[type="text"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }

      .form-signin input[type="number"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>

  </head>

  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <h3 class="masthead-brand"> School Suggestion</h3>
        <div class="inner">
          <nav class="nav nav-masthead justify-content-center">
            
            <a class="nav-link" href="p_login.php" id="login">Login</a>
            <a class="nav-link" href="p_register" id="reg">Register</a>
            <a class="nav-link" href="#" id="contact">Contact Us</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover" id="Main">
        <div id="display">
            <form class="form-signin" action="" method="POST">
              <h1 class="h3 mb-3 font-weight-normal">Please sign up:</h1>

              <label for="Name" class="sr-only"> Name</label>
              <input type="name" id="name" class="form-control" name="name" placeholder="Enter your Name " required autofocus>


              <label for="address" class="sr-only">Address</label>
              <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address" required autofocus>


              <label for="inputEmail" class="sr-only">Email address</label>
              <input type="email" id="inputEmail" class="form-control" name="mail" placeholder="Enter Email address" required autofocus>

              <label for="phno" class="sr-only">Contact number</label>
              <input type="number" id="phno" class="form-control" name="phno" placeholder="Enter mobile number" required autofocus>

              <label for="password" class="sr-only">Password</label>
              <input type="password" id="passwd" class="form-control" name="passwd" placeholder="Please set your Password" required>
   
              <button class="btn btn-lg btn-primary btn-block" type="submit" name="sup">Sign up</button>
         
            </form>
          </div>
        </main>
    </div>
  </body>
</html>

<?php
/*
include "../sql_access.php";

IF(ISSET($_POST['sup'])){
$sql="INSERT INTO parent(parent_name,parent_passwd,parent_address,parent_uname,parent_phone) VALUES

('$_POST[name]','$_POST[passwd]','$_POST[address]','$_POST[mail]','$_POST[phno]')";

if (!mysqli_query($connect,$sql))
  {
  die('Error: ' . mysqli_error("could not signed in"));
  }
else
  echo "<script language=\"javascript\">alert(\"Successfully signed up\");document.location.href='p_login.php';</script>";

//mysqli_close($connect)
}
*/
include "../sql_access.php";

          
            IF(ISSET($_POST['sup']))
            {
              
            
            $sql="INSERT INTO parent(parent_name,parent_password,p_address,parent_uname,parent_phone)
            VALUES

            ('$_POST[name]','$_POST[passwd]','$_POST[address]','$_POST[mail]','$_POST[phno]')";


            if (!mysqli_query($connect,$sql))

              {

              die('Error: ' . mysqli_error($connect));

              }

              else
                echo "<script language=\"javascript\">alert(\"Successfully signed up\");document.location.href='p_login.php';</script>";


            
            }

?>



