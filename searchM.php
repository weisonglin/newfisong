<?php
session_start();
error_reporting(0);
if($_SESSION['name']==null)
        header('Location: login.php');
?>

<?php
if($_POST['bestM'])
{
  if($_POST['search']=='Both Title and Lyric'){
    $search='both';
  } else if ($_POST['search']=='Only Title') {
    $search='title';
  } else {
    $search ='lyric';
  }
  $words=$_POST['words'];
  header('Location: bestm.php?words='.$words.'&search='.$search); 

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
                <h1  id="fisongT"> fiSong Best Matching</h1>
            </div>

            <div class="container">
              <h2 >fiSong Best Matching</h2>
              <form role="form" method="post">
                <div class="form-group">
                  <label for="title">Matching:</label>
                  <input type="title" class="form-control"  name="words" id="email" placeholder="Enter any words here">
                </div>

                <div id="table">
                  <div id="row">
                      <div id="cell">
                        <select class="form-control" name="search" id="sel1">
                          <option>Both Title and Lyric</option>
                          <option>Only Title</option>
                          <option>Only Lyric</option>

                        </select>
                      </div>
                    </div>
                </div>

                <br></br>

                <button type="submit" value="bestM" name="bestM" class="btn btn-primary btn-lg btn-block">fiSong</button>
              </form>
            </div>
        </body>
   
