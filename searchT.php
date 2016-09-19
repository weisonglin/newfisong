<?php
session_start();
error_reporting(0);
if($_SESSION['name']==null)
        header('Location: login.php');
?>
<?php
$error_message='';
if($_POST['searchbyT']){

  if($_POST['searchtitle'] )
  {
    $connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
    mysql_select_db("fisonguser",$connection) or die("database error");

    $name=mysql_real_escape_string(strtolower($_POST['searchtitle']));
 
    $song=mysql_fetch_array(mysql_query("SELECT * FROM `songs` WHERE `title`='$name'"));
    if($song==null)
    {
      $error_message="no such song  <$name>";
    }
    else
    {
      $id=$song['id'];
      header('Location: play.php?id='.$id); 
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
  <link type='text/css' rel='stylesheet' href='http://localhost/example/css/style.css' >
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
            <div class="t">
                <h1  id="fisongT"> fiSong By Title</h1>
            </div>
           

            <div class="container">
               <?php
                  if($error_message!=''){
                    echo"<p class='error' align='center' style='color: red;'>{$error_message}</p>";}
                  else{
                    echo"<p>please fill out for search</p>";}
              ?>
              <h2 >fiSong by title</h2>
              <form role="form" method='post'>
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" class="form-control" name="searchtitle" placeholder="Enter the title of the song here">
                </div>

                <button type="submit" value="searchbyT" name="searchbyT" class="btn btn-primary btn-lg btn-block">fiSong</button>
              </form>
            </div>
        </body>
  
