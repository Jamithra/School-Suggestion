<?php 
  session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>School Home</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="supplier_menu.css" rel="stylesheet">
    <style>
  .speech {border: 1px solid #DDD; width: 300px; padding: 0; margin: 0}
  .speech input {border: 0; width: 240px; display: inline-block; height: 30px;}
  .speech img {float: right; width: 40px }
</style>

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">School Suggestion</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
          <!--  <li><a href="#">Logout</a></li> -->
          <li>
          <form action="" method="POST">
             <button type="submit" class="btn btn-lg btn-primary btn-block" name="logout">Logout</button>
          </form>

          <?php
          include "../sql_access.php";

          IF(ISSET($_POST['logout'])){
             echo "<script language=\"javascript\">confirm(\"Are you sure you want to log out? \");document.location.href='s_login.php';</script>";

            unset($_SESSION['school_id']);
            session_destroy();

          }
          ?>
          </li>
            
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="school_menu.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="school_students.php">All Students</a></li>
            <li><a href="add_student.php">Add student</a></li>
            <li><a href="update_marks.php">Update Marks</a></li>
            <!--
            <li><a href="edit_student.php">Edit student</a></li>
          -->
            
          </ul>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Your details</h2><hr>

          <br>

          <?php
            include "../sql_access.php";

            $schl_id=$_SESSION['school_id'];
        

            $retval="SELECT * FROM school WHERE school_id=$schl_id";
            $supdet=mysqli_query($connect,$retval);
            $row = mysqli_fetch_assoc($supdet);

            echo '<h3>Name:'.$row["school_name"].'</h3>';
            
            echo'<h3>Email:'.$row["school_username"].'</h3>';

            echo '<h3>Address:</h3>';
            echo '<p>'.$row["school_address"].'</p>';

            if (!mysqli_query($connect,$retval))

              {

              die('Error: ' . mysqli_error($connect));

              }

          


            ?>



<!--
          <h2 class="sub-header">Add Your Products Here:</h2><hr>
          <p><a class="btn btn-primary btn-lg" href="add_product.php" role="button"> &plus; Add Product </a></p>
-->





    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <form id="labnol" method="POST" >
  <div class="speech">
    <input type="text" name="spoken" id="transcript" placeholder="Speak" />
    <img onclick="startDictation()" src="mic.png" />
    
  </div>
  <br>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="search">Search</button>
</form>

<!-- HTML5 Speech Recognition API -->
<script>
  function startDictation() {

    if (window.hasOwnProperty('webkitSpeechRecognition')) {

      var recognition = new webkitSpeechRecognition();

      recognition.continuous = false;
      recognition.interimResults = false;

      recognition.lang = "en-US";
      recognition.start();

      recognition.onresult = function(e) {
        document.getElementById('transcript').value
                                 = e.results[0][0].transcript;
        recognition.stop();
        //document.getElementById('labnol').submit();
      };

      recognition.onerror = function(e) {
        recognition.stop();
      }

    }
  }
</script>


  </body>
</html>

<?php 
IF(isset($_POST['search']))

{
  $spk=$_POST['spoken'];
  if($spk=='add student'){

 //echo "<script language=\"javascript\">alert(\"welcome \");document.location.href='t.php';</script>";
  header('location:add_student.php');
}

elseif ($spk=='home') {
  header('location:school_menu.php');
}

elseif ($spk=='all students') {
  header('location:school_students.php');
}

elseif ($spk=='update marks') {
  header('location:update_marks.php');
}
else
{

 echo "<script language=\"javascript\">alert(\"please search correctly \");document.location.href='voc.php';</script>";
}
}


?>