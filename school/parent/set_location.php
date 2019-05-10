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

    <title>Parent Home</title>

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
    <link href="schools.css" rel="stylesheet">

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

             <li>
          <form action="" method="POST">
             <button type="submit" class="btn btn-lg btn-primary btn-block" name="logout">Logout</button>
          </form>
          <?php
          include "../sql_access.php";

          IF(ISSET($_POST['logout'])){
            echo "<script language=\"javascript\">alert(\"Are you sure you want to log out? \");document.location.href='p_login.php';</script>";
            unset($_SESSION['parent_id']);
            session_destroy();
          }
                     
?>
            

            <!--  <a href="s_login.php">Logout</a> -->
            </li>
          </ul>
          
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="parent_menu.php">Home</a></li>
            <li class="active"><a href="set_location.php">Select location<span class="sr-only">(current)</span></a></li>
            <li><a href="schools.php">Schools</a></li>
            <li><a href="leaderboard.php">Leader Board</a></li>
            <li><a href="my_child.php">About My Child</a></li>
            <li><a href="stats.php">Subjects of your interest</a></li>
            <!--
            <li><a href="edit_student.php">Edit student</a></li>
          -->
          </ul>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Add Your Students Here:</h2><hr>
          


            <form class="add_pro" method="POST" action="">
        <h3 >Please select a location here:</h3>
  
        

       
       <label>Select location of school:</label>
        <input list="class" name="location" id="location">
        <datalist id="class">
          <option value="1">Bangalore</option>
          <option value="2">Mangalore</option>
          <option value="3">Hyderabad</option>
          <option value="4">Chennai</option>
          <option value="5">Vizag</option>
          
        </datalist>
        <br>
   

        
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Done</button>
      </form>

      <?php
            include "../sql_access.php";

          
            IF(ISSET($_POST['add']))
            {

              $l = $_POST['location'];
              $_SESSION['location_id']=$l;
              
            $p_id=$_SESSION['parent_id'];
           
             /* $k = $_POST[location];
              $_SESSION['location_id']=$k;
              $l=$_SESSION['location_id'];*/
            
            $sql="UPDATE parent SET location_id=$_POST[location] WHERE parent_id=$p_id";


            if (!mysqli_query($connect,$sql))

              {

              die('Error: ' . mysqli_error($connect));

              }

              echo "<script language=\"javascript\">alert(\"Here are the schools \");document.location.href='schools.php';</script>";
            
            }






            ?>




</div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</div>
</body>
</html>



