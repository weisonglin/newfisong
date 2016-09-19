<?php
session_start();

error_reporting(0);

$error_message='';
if($_POST['login']){

	if($_POST['name'] && $_POST['password'])
	{
		$connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
		mysql_select_db("fisonguser",$connection) or die("database error");
		$name=mysql_real_escape_string($_POST['name']);
		$password = mysql_real_escape_string($_POST['password']);
		$user=mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `name`='$name'"));
		if($user==null)
		{
			$error_message="no such user";
		}

		else if($user['password']!=$password) 
		{
			$error_message="no no wrong password";
		}
		else
		{
			echo('good');
			//$_SESSION['id']=$user['id'];
			$_SESSION['admin']=$user['admin'];
			$_SESSION['name']=$name;
			$_SESSION['gender']=$user['gender'];
			$_SESSION['age']=$user['age'];
			$_SESSION['country']=$user['country'];
			$_SESSION['job']=$user['job'];
			$_SESSION['lastsong']=$user['lastsong'];
			$_SESSION['todaysong']=NULL;
			header('Location: main.php');	
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
  		<li><a href=''>fiSong</a></li>

  		<ul style='float:right;list-style-type:none;'>
    		<li><a  href='http://localhost/example/register.php'>Register</a></li>
  		</ul>
	</ul>

<body>

		<div class='t'>
                <h1  id='fisongT'> Login</h1>
            </div>

             <div class='container'>
             	
		  
		  <?php
		  	if($error_message!=''){
		  		echo"<p class='error' align='center' style='color: red;'>{$error_message}</p>";}
		  	else{
		  		echo"<p>please fill out for login</p>";}
		  ?>
		  <form role='form'   method='post'>
		  	<div class='form-group'>
			  <label for='usr'>ID:</label>
			  <input type='text' name='name' class='form-control' id='usr'>
			</div>

			<div class='form-group'>
			  <label for='pwd'>Password:</label>
			  <input type='password' name='password' class='form-control' id='pwd'>
			</div>

			<button type='submit' name='login' value='login' class='btn btn-primary btn-lg btn-block'  id='sumbitB'>fiSong</button>
		</form>
	</div>


</body>

