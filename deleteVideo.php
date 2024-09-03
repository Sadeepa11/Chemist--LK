<?php


require "connection.php";

$id=$_POST["id"];

Database::iud("DELETE  FROM `video` WHERE `id`='".$id."'");

 echo("Success");

?>