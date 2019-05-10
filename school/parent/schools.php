<?php 
  include "../sql_access.php";

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

    <title>Schools</title>

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
    <link href="parent_menu.css" rel="stylesheet">

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
            <li><a href="set_location.php">Set location</a></li>
            <li class="active"><a href="schools.php">Schools<span class="sr-only">(current)</span></a></li>
            <li><a href="leaderboard.php">Leader Board</a></li>
            <li><a href="my_child.php">About My Child</a></li>
            <!--
            <li><a href="edit_student.php">Edit student</a></li>
          -->
          </ul>
        </div>


        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Nearby Schools are here:</h2><hr>

          <br>



          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  
                  <th>School ID</th>
                  <th>School Name</th>
                  <th>School Address</th>
                  <th>Syllabus type</th>
                  <th>Base Fee</th>
                  <th>School mail:</th>

                  <!--
                  <th>School Rank</th>
                  <th>City Rank</th>
                -->
                </tr>
              </thead>
              <tbody>

            <?php
            $l_id=$_SESSION['location_id'];

            $retval="SELECT * FROM school WHERE location_id=$l_id";
          if (!mysqli_query($connect,$retval))

              {
///
              //die('Error: ' . mysqli_error($connect));
              die();
              echo "<script language=\"javascript\">alert(\"Please select valid location \");document.location.href='set_location.php';</script>";

              }
            
            $result=mysqli_query($connect,$retval);
            
            $i = mysqli_num_rows(mysqli_query($connect,$retval));
            

              
                while($row = mysqli_fetch_assoc($result)) {
                   echo "<tr>";
                  echo "<td>".$row['school_id']."</td>";
                   echo "<td>".$row['school_name']."</td>";
                   echo "<td>".$row['school_address']."</td>";
                   echo "<td>".$row["syllabus_type"]."</td>";
                   echo "<td>".$row["base_fee"]."</td>";
                   echo "<td>".$row["school_username"]."</td>";
                   /*
                   echo "<td>".$row["school_rank"]."</td>";
                   echo "<td>".$row["city_rank"]."</td>";
                   */
                   $i=$i+1;
                   echo "</tr>";
                 }

                 

            ?>

            </tbody>
          </table>
        </div>
        </div>
      </div>
    </div>




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
  </body>
</html>
