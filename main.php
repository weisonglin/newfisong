<?php
session_start();
error_reporting(0);
if($_SESSION['name']==null)
        header('Location: login.php');


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

            <div class="content">
                <div class="row">
                    <h1 class="text-center"> Welcome to fiSong </h1>
                    <h3 class="text-center"> Discover, Soul, Song</h3>
                    <h4 class="text-center"> -- Intelligence Song Finder --</h4>
                </div>
                <br/>
                <br/>

                <div class="row">
<!--                   <div class="col-md-4">
                    <h4 class='text-center'>Title</h4>
                    <a href="http://localhost/example/searchT.php" class="">
                        
                        <div class='quicksearchthumbnail thumbnail'>
                            <img src='http://localhost/example/image/m1.jpg'  style="width:300px;height:300px">
                            
                        </div>
                    </a>
                  </div> -->

                  <div class="col-md-6">
                     <h3 class='text-center'>Matching</h3>
                     <br/>
                    <a href="http://localhost/example/searchM.php" class="">
                       
                        <div class='quicksearchthumbnail thumbnail'>
                            <img src='http://localhost/example/image/g6.gif' alt='#' class='img-rounded'  style="width:700px;height:350px">
                            
                        </div>
                    </a>
                  </div>

                  <div class="col-md-6">
                     <h3 class='text-center'>Recommandation</h3>
                     <br/>
                    <a href="http://localhost/example/recom.php" class="">
                        
                        <div class='quicksearchthumbnail thumbnail'>
                            <img src='http://localhost/example/image/g5.gif' alt='#' class='img-rounded'  style="width:700px;height:350px">
                           
                        </div>
                    </a>
                  </div>
                </div>
            </div>
        </body>
    </html>