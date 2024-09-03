<?php


require "connection.php";

$id=$_POST["lessId"];



Database::iud("DELETE  FROM `invoice` WHERE `purchased_lessons_id`='".$id."'");
Database::iud("DELETE  FROM `purchased_lessons` WHERE `lessons_id`='".$id."'");
Database::iud("DELETE  FROM `note` WHERE `lessons_id`='".$id."'");
Database::iud("DELETE  FROM `video` WHERE `lessons_id`='".$id."'");
Database::iud("DELETE  FROM `lessons` WHERE `id`='".$id."'");
 

 
 
 


 echo("Success");

?>