<?php
session_start();
error_reporting(0);
if($_SESSION['name']==null)
        header('Location: login.php');

$gender=$_SESSION['gender'];
$age=$_SESSION['age'];
$country=$_SESSION['country'];
$job=$_SESSION['job'];

$connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
mysql_select_db("fisonguser",$connection) or die("database error");
//$score_id=mysql_query("SELECT `id` FROM songs");
//$score_gender=mysql_query("SELECT ".$gender." FROM songs");
$score_board=mysql_query("SELECT `id`,".$gender.", ".$age.", ".$country.", ".$job." FROM songs");
$num=mysql_numrows($score_board);

$i=0;
$score=array();
 while($i<$num)
 {
 	$song_id=mysql_result($score_board, $i,"id");
 	$score_gender=mysql_result($score_board, $i,$gender);
 	$score_age=mysql_result($score_board, $i,$age);
 	$score_country=mysql_result($score_board, $i,$country);
 	$score_job=mysql_result($score_board, $i,$job);
 	$sum=$score_gender*2+$score_age*4+$score_country*4+$score_job*5;
	$score[$song_id]=$sum;
 	$i++;

 }
arsort($score);
$result=array_keys($score);

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
                <h1  id="fisongT"> Recommandation</h1>
                </div>


            <div class="container">
                
                <table class="table table-hover">
                  <h2 >Recommandation</h2>
                  <thead>
                  <tr>
                    <th><font class='font'>Songs</font></th>
                    <th><font class='font'>Options</font></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                 
                  
                  $i=0;
                  while($i<3)
                  {
                    $id=mysql_real_escape_string($result[$i]);
                    //echo $result[$i];
                    $tmp=mysql_fetch_array(mysql_query("SELECT `title` FROM `songs` WHERE `id`='$id'"));
                    $title=$tmp['title'];
                    echo "<tr>
                    <td><font class='font'>$title</font></td>
          
                      
                    <td><a href='play.php?id=$id' >Play</a></td>
                    </tr>";
                    $i++;
                  }

                  //print_r($score);
                  //print_r($result);
                  ?>
                 </tbody>
                </table>


            </div>
        </body>