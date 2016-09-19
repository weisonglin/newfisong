<?php
session_start();
error_reporting(0);
if($_SESSION['name']==null)
        header('Location: login.php');

//$song=$_GET['play'];
//$lyric=$_GET['lyric'];
//$title=$_GET['title'];

$id=$_GET['id'];
$_SESSION['todaysong']=$id;
$connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
    mysql_select_db("fisonguser",$connection) or die("database error");

    $songinfo=mysql_fetch_array(mysql_query("SELECT * FROM `songs` WHERE `id`='$id'"));
    $song=$songinfo['song'];
    $lyric=$songinfo['lyric'];
    $title=strtoupper($songinfo['title']);
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
  <link type='text/css' rel='stylesheet' href='http://localhost/example/css/style.css' >
  <style type="text/css">
body
{
    background-image:url('image/m7.jpg');
}
</style>
       </head>
        <ul>
      <li><a href='main.php'>fiSong</a></li>

      <ul style='float:right;list-style-type:none;'>
        <?php if($_SESSION['admin']==1)  {echo "<li><a href='admin.php'>Admin Pannel</a></li>";}  ?>
       <?php echo "<li><a class='active'>WELCOME  " . $_SESSION['name']." </a></li>" ?>
      <li><a href="logout.php">Logout</a></li>
      </ul>
  </ul>

<body>

  <div class='t'>
                <h1  id='fisongT'> <?php  echo $title ?></h1>
            </div>


   <div class='container'>
    
  <?php 
  echo "<audio controls>
    <source src='song/$song' type='audio/mpeg'/>
    </audio>";
  ?>

  
    <p><?php echo "$lyric" ?></p>


  
</div>
</body>