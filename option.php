<?php
$connection=mysql_connect("db4free.net","weisong","victor1234") or die("host connection error");
mysql_select_db("fisonguser",$connection) or die("database error");

$id=$_GET['i_id'];
$song=$_GET['song'];
$base_directory = 'song/';

unlink($base_directory.$song);
mysql_query("DELETE FROM `songs` WHERE `id`='$id'");
header('Location: admin.php');


?>