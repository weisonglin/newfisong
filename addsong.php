<?php
session_start();
if($_SESSION['admin']!=1)
        header('Location: main.php');

error_reporting(0);

?>

<?php

$error_message='';
if($_POST['addsong']){
  if($_POST['title'] && $_POST['lyric']&& isset($_FILES['song']))
  {
    $connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
    mysql_select_db("fisonguser",$connection) or die("database error");
    $title=mysql_real_escape_string($_POST['title']);
    
    $lyric=mysql_real_escape_string($_POST['lyric']);
    //$song=mysql_real_escape_string($_POST['song']);
    $user=mysql_fetch_array(mysql_query("SELECT * FROM `songs` WHERE `title`='$title'"));


    $file_name = $_FILES['song']['name'];
      $file_size = $_FILES['song']['size'];
      $file_tmp = $_FILES['song']['tmp_name'];
      $file_type = $_FILES['song']['type'];
    if($user!=null)
    {
      $error_message="this song already exsit";
    }
    else  
    {
      mysql_query("INSERT INTO `songs` (`id`, `title`, `lyric`, `song`, `Male`,`Female`,`0-20`,`21-40`,`41-60`,`above 61`,`USA`,`China`,`Japan`,`Korea`,`Student`,`Teacher`,`Software Engineer`,`Accountant`,`Sales`) VALUES (NULL, '$title', '$lyric', '$file_name', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
      move_uploaded_file($file_tmp,"song/".$file_name);
      header('Location: admin.php');
    }    
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
                <h1  id="regT"> Adding a song</h1>
            </div>            

      <div class="container">
        <?php
        if($error_message!=''){
          echo"<p class='error' align='center' style='color: red;'>{$error_message}</p>";}
        else{
          echo"<p>please fill out for adding a song</p>";}
      ?>
      <form role="form" method="post"    enctype="multipart/form-data">
        <div class="form-group">
        <label for="usr">Title:</label>
        <input type="text" name="title" class="form-control" id="usr">
      </div>

      <div class="form-group">
        <label for="usr">Lyric:</label>
        <input type="text" name="lyric" class="form-control" id="usr">
      </div>


      <div class ="form-group">       
        <label for="usr">Song:</label>
         <input type = "file" name = "song" class="form-control" id="usr"/>         
        
      </div>

      <button type="submit" name="addsong" value="addsong" class="btn btn-primary btn-lg btn-block"  id="sumbitB">Add Song</button>
 
    </div>
    <br></br>

         
    </form>
      </div>
</body>   