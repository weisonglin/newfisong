<?php
session_start();
if($_SESSION['admin']!=1)
        header('Location: main.php');

error_reporting(0);

?>


<?php

$error_message='';
$id=$_GET['i_id'];
if($_POST['resetpassword']){
  if($_POST['password'])
  {
    // $connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
    $connection=mysql_connect("localhost","root","") or die("host connection error");
    mysql_select_db("fisonguser",$connection) or die("database error"); 
    $password = mysql_real_escape_string($_POST['password']);
    mysql_query("UPDATE `user` SET `password` = '$password' WHERE `id`= '$id' ");
    header('Location: modifyUser.php');
  }
}

?>



<head>
   <title>fiSong</title>
      <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <link rel='icon' href='http://localhost/example/image/m0.jpg'>

       <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>


        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css'>

  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
  <link type='text/css' rel='stylesheet' href='http://localhost/example/css/style.css'>
       </head>
        <ul>
      <li><a href='main.php'>fiSong</a></li>

      <ul style='float:right;list-style-type:none;'>
        <?php if($_SESSION['admin']==1)  echo "<li><a href='admin.php'>Admin Pannel</a></li>";  ?>
       <?php echo "<li><a class='active'>WELCOME  " . $_SESSION['name']. "</a></li>" ?>
      <li><a href="logout.php">Logout</a></li>
      </ul>
  </ul>



<body>
    <div class="t">
                <h1  id="regT"> Reset Password</h1>
            </div>            

      <div class="container fix">

      <form role="form" method="post"    enctype="multipart/form-data">
        <div class="form-group">
        <label for="password">new password:</label>
        <input type="text" name="password" class="form-control" id="password">
      </div>

      <button type="submit" name="resetpassword" value="resetpassword" class="btn btn-primary btn-lg btn-block"  id="sumbitB">Reset</button>
 
    </div>
    <br></br>

         
    </form>
      </div>
</body>   