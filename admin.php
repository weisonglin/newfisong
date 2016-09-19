<?php
session_start();
if($_SESSION['admin']!=1)
        header('Location: main.php');



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
<?php      
           // error_reporting(0);
            $connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
            mysql_select_db("fisonguser",$connection) or die("database error");
            $query="SELECT * FROM songs";
            $songs_list=mysql_query($query);
            $num=mysql_numrows($songs_list);

           // $user=mysql_fetch_array(mysql_query("SELECT * FROM `songs`"));
            //$num=mysql_num_rows($songs_list);
            mysql_close();
?>
        <body>

            <div class="container">
                <a href="addsong.php" class="btn btn-primary btn-lg active" role="button">Add a Song</a>
                <a href="modifyUser.php" class="btn btn-primary btn-lg active" role="botton">Modify User</a>
                <table class="table table-hover">
                  <thead>
                  <tr>
                    <th><font class='font'>Songs</font></th>
                    <th><font class='font'>Options</font></th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $i=0;
                  while($i<$num)
                  {
                    //echo $num;
                    $song_id=mysql_result($songs_list, $i,"id");
                    $song_name=mysql_result($songs_list, $i,"title");
                    $song_song=mysql_result($songs_list,$i, "song");
                    echo "<tr>
                    <td><font class='font'>$song_name</font></td>
          
                      
                    <td><a href='option.php?i_id=$song_id&song=$song_song' >Delete</a></td>
                    </tr>";
                    $i++;
                  }
                  ?>
                 </tbody>
                </table>


            </div>
        </body>