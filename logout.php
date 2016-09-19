<?php 
    session_start();
    if($_SESSION['todaysong']!=NULL)
    {	
    	$connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
	mysql_select_db("fisonguser",$connection) or die("database error");
    	$name=mysql_real_escape_string($_SESSION['name']);
    	$todaysong=mysql_real_escape_string($_SESSION['todaysong']);
	$lastsong=mysql_real_escape_string($_SESSION['lastsong']);
	$gender=mysql_real_escape_string($_SESSION['gender']);
	$age=mysql_real_escape_string($_SESSION['age']);
	$country=mysql_real_escape_string($_SESSION['country']);
	$job=mysql_real_escape_string($_SESSION['job']);
    	if($_SESSION['lastsong']!=NULL&&$_SESSION['lastsong']!=$_SESSION['todaysong'])
    	{
	    		
	    	mysql_query("UPDATE `songs` SET ".$gender."=".$gender."-1 WHERE `id`='$lastsong'");
    		mysql_query("UPDATE `songs` SET ".$age."=".$age."-1 WHERE `id`='$lastsong'");
    		mysql_query("UPDATE `songs` SET ".$country."=".$country."-1 WHERE `id`='$lastsong'");
    		mysql_query("UPDATE `songs` SET ".$job."=".$job."-1 WHERE `id`='$lastsong'");    	
    	}
    	mysql_query("UPDATE `user` SET `lastsong` = '$todaysong' WHERE `name`='$name'");
    	mysql_query("UPDATE `songs` SET ".$gender."=".$gender."+1 WHERE `id`='$todaysong'");
    	mysql_query("UPDATE `songs` SET ".$age."=".$age."+1 WHERE `id`='$todaysong'");
    	mysql_query("UPDATE `songs` SET ".$country."=".$country."+1 WHERE `id`='$todaysong'");
    	mysql_query("UPDATE `songs` SET ".$job."=".$job."+1 WHERE `id`='$todaysong'");    	

    }


    session_destroy();
    unset($_SESSION);
    session_regenerate_id(true);
   header('LOCATION: login.php');
?>