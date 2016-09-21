
<?php

session_start();
error_reporting(0);

$error_message='';
if($_POST['regi']){
	if($_POST['name'] && $_POST['password']&& $_POST['confirmpassword'])
	{
		// $connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
		$connection=mysql_connect("localhost","root","") or die("host connection error");
		mysql_select_db("fisonguser",$connection) or die("database error");
		$name=mysql_real_escape_string($_POST['name']);
		$password = mysql_real_escape_string($_POST['password']);
		$confirmpassword=mysql_real_escape_string($_POST['confirmpassword']);
		$email=mysql_real_escape_string($_POST['email']);
		$gender=mysql_real_escape_string($_POST['gender']);
		$age=mysql_real_escape_string($_POST['age']);
		$country=mysql_real_escape_string($_POST['country']);
		$job=mysql_real_escape_string($_POST['job']);

		$user=mysql_fetch_array(mysql_query("SELECT * FROM `user` WHERE `name`='$name'"));
		if($user!=null)
		{
			$error_message="some one use this name already ";
		}else if($confirmpassword!=$password)
		{
			$error_message="you have entered two differet passwords";
		}
		else  
		{
			mysql_query("INSERT INTO `user` (`id`, `name`, `password`, `email`, `gender`, `age`, `country`, `job`, `lastsong`,`admin`) VALUES (NULL, '$name', '$password', '$email', '$gender', '$age', '$country', '$job', NULL,'0')");
			$_SESSION['admin']=0;
			$_SESSION['name']=$name;
			$_SESSION['gender']=$gender;
			$_SESSION['age']=$age;
			$_SESSION['country']=$country;
			$_SESSION['job']=$job;
			$_SESSION['lastsong']=NULL;
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


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<link type="text/css" rel="stylesheet" href="http://localhost/example/css/style.css">
       </head>
        <ul>
  		<li><a href="">fiSong</a></li>

  		<ul style="float:right;list-style-type:none;">
    		<li><a href="http://localhost/example/login.php">Login</a></li>
  		</ul>
	</ul>


	<body>
		<div class="t">
                <h1  id="regT"> Registration</h1>
            </div>

             <div class="container fix">
             	 <?php
		  	if($error_message!=''){
		  		echo"<p class='error' align='center' style='color: red;'>{$error_message}</p>";}
		  	else{
		  		echo"<p>please fill out for registration</p>";}
		  ?>
		  <form role="form" method="post">
		  	<div class="form-group">
			  <label for="usr">Name:</label>
			  <input type="text" name="name" class="form-control" id="usr">
			</div>

			<div class="form-group">
			  <label for="pwd">Password:</label>
			  <input type="password" name="password" class="form-control" id="pwd">
			</div>
			<div class="form-group">
			  <label for="pwd">Confirm:</label>
			  <input type="password" name="confirmpassword"  class="form-control" id="pwd">
			</div>

			<div class="form-group">
			  <label for="email">Email:</label>
			  <input type="text" name="email" class="form-control" id="email">
			</div>


			<div id="table">
			<div id="row">
		    <div id="cell">
		      <label for="sel1">Gender</label>
		      <select class="form-control" name="gender" id="sel1">
		        <option>Male</option>
		        <option>Female</option>

		      </select>
			</div>

		      <div id="cell">
		      <label for="sel1">Age</label>
		      <select class="form-control" name="age" id="sel1">
		        <option>0_20</option>
		        <option>21_40</option>
		        <option>41_60</option>
		        <option>above_61</option>
		      </select>
			</div>

		      <div id="cell">
		      <label for="sel1">Country</label>
		      <select class="form-control" name="country" id="sel1">
		        <option>USA</option>
		        <option>China</option>
		        <option>Japan</option>
		        <option>Korea</option>
		      </select>
			</div>

		      <div cell="cell">
		      <label for="sel1">Job</label>
		      <select class="form-control" name="job" id="sel1">
		        <option>Student</option>
		        <option>Teacher</option>
		        <option>Software_Engineer</option>
		        <option>Accountant</option>
		        <option>Sales</option>
		      </select>
		     </div>
		</div>
		</div>
		<br></br>

		     <button type="submit" name="regi" value="regi" class="btn btn-primary btn-lg btn-block"  id="sumbitB">fiSong</button>
		</form>
			</div>
</body>

            


