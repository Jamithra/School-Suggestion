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
             echo "<script language=\"javascript\">confirm(\"Are you sure you want to log out? \");document.location.href='s_login.php';</script>";

            unset($_SESSION['school_id']);
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
            <li><a href="school_menu.php">Home</a></li>
            <li><a href="school_students.php">All Students</a></li>
            <li><a href="add_student.php">Add Students</a></li>
            <li class="active"><a href="update_marks.php">Update Marks<span class="sr-only">(current)</span></a></li>
            
            <!--
            <li><a href="edit_student.php">Edit student</a></li>
          -->
          </ul>
        </div>

        <!-- Content div in user home -->
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Update Your Students Marks Here:</h2><hr>
          <p><a class="btn btn-primary btn-lg" href="add_product.php" role="button"> Update Marks  </a></p>



            <form class="add_pro" method="POST" action="">
        <h3 >Please enter the student details:</h3>
  
        <label>Student ID</label>
        <input type="number" name="student_id" id="student_id" class="form-control" placeholder="Enter Student ID" required autofocus>
        <br>

        <h4>Enter Percentage of Marks in each subject:</h4>

        <label>English:</label>
        <input type="number" name="english" id="english" class="form-control" placeholder="Enter %" required autofocus>
        <br>


        <label>Hindi:</label>
        <input type="number" name="hindi" id="hindi" class="form-control" placeholder="Enter %" required autofocus>
        <br>

        <label>Third Language:</label>
        <input type="number" name="t_lan" id="t_lan" class="form-control" placeholder="Enter %" required autofocus>
        <br>

        <label>Mathematics:</label>
        <input type="number" name="maths" id="maths" class="form-control" placeholder="Enter %" required autofocus>
        <br>


        <label>Science:</label>
        <input type="number" name="science" id="science" class="form-control" placeholder="Enter %" required autofocus>
        <br>

        <label>Social:</label>
        <input type="number" name="social" id="social" class="form-control" placeholder="Enter %" required autofocus>
        <br>

        <label>Sports:</label>
        <input type="number" name="sports" id="social" class="form-control" placeholder="Enter %" required autofocus>
        <br>

        <label>Total:</label>
        <input type="number" step="any" name="total" id="total" class="form-control" placeholder="Enter %" required autofocus>
        <br>

        <label>School rank:</label>
        <input type="number" name="school_rank" id="school_rank" class="form-control" placeholder="Enter School rank" required autofocus>
        <br>

       
       <!-- <label>Select class:</label>
        <input list="class" name="student_class">
        <datalist id="class">
          <option value="11">LKG</option>
          <option value="12">UKG</option>
          <option value="1">1st</option>
          <option value="2">2 nd</option>
          <option value="3">3 rd</option>
          <option value="2">2 nd</option>
        </datalist>
        <br>
    -->

        
        <br>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="add">Done</button>
      </form>

      <?php
            include "../sql_access.php";

          
            IF(ISSET($_POST['add']))
            {
              /*
            $retval='SELECT s_id FROM supplier';
            $suppid=mysqli_query($connect,$retval);
            $row = mysqli_fetch_assoc($suppid);

            $sup_id=$row["s_id"];*/

            $schl_id=$_SESSION['school_id'];
            echo "$schl_id";

            $sql="INSERT INTO marks(student_id,english,hindi,third_language,maths,science,social,sports,total,school_rank)
            VALUES

            ('$_POST[student_id]','$_POST[english]','$_POST[english]','$_POST[t_lan]','$_POST[maths]','$_POST[science]','$_POST[social]','$_POST[sports]','$_POST[total]','$_POST[school_rank]')";


            if (!mysqli_query($connect,$sql))

              {

              die('Error: ' . mysqli_error($connect));

              }

            

            $sql="UPDATE student SET school_rank='$_POST[school_rank]' WHERE student_id='$_POST[student_id]'";
            if (!mysqli_query($connect,$sql))

              {
///
              die('Error: ' . mysqli_error($connect));
              echo "<script language=\"javascript\">alert(\"Please enter valid information \");document.location.href='add_student.php';</script>";

              }

            echo "<script language=\"javascript\">alert(\"Updated Successfully \");document.location.href='update_marks.php';</script>";
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



