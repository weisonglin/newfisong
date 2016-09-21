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
            // $connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
            $connection=mysql_connect("localhost","root","") or die("host connection error");
            mysql_select_db("fisonguser",$connection) or die("database error");
            $query="SELECT * FROM user";
            $users_list=mysql_query($query);
            $num=mysql_numrows($users_list);

           // $user=mysql_fetch_array(mysql_query("SELECT * FROM `songs`"));
            //$num=mysql_num_rows($songs_list);
            mysql_close();
?>
        <body>

            <div class="container">

                <table class="table table-hover">
                  <thead>
                  <tr>
                    <th><font class='font'>Users</font></th>
                    <th><font class='font'>Password</font></th>
                    <th><font class='font'>email</font></th>
                    <th><font class='font'>Delete</font></th>
                    <th><font class='font'>Reset Password</font></th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $i=0;
                  while($i<$num)
                  {
                    //echo $num;
                    $user_id=mysql_result($users_list, $i,"id");
                    $user_name=mysql_result($users_list, $i,"name");
                    $user_password=mysql_result($users_list, $i,"password");
                    $user_email=mysql_result($users_list, $i,"email");
                    
                    echo "<tr>
                    <td><font class='font'>$user_name</font></td>
          			<td><font class='font'>$user_password</font></td>
                    <td><font class='font'>$user_email</font></td>

                    <td><a href='deleteUser.php?i_id=$user_id' >Delete</a></td>
                    <td><a href='resetPassword.php?i_id=$user_id' >Reset</a></td>
                    </tr>";
                    $i++;
                  }
                  ?>
                 </tbody>
                </table>


            </div>
        </body>