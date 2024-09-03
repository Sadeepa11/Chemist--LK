<?php

require "connection.php";

$lessName = $_POST["lessName"];
$lessPrice = $_POST["lessPrice"];




if (isset($_FILES["lessImg"])) {
    $image = $_FILES["lessImg"];

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    $file_ex = $image["type"];

    if (!in_array($file_ex, $allowed_image_extentions)) {
        echo ("Please select a valid image.");
    } else {

        $new_file_extention;

        if ($file_ex == "image/jpg") {
            $new_file_extention = "jpg";
        } else if ($file_ex == "image/jpeg") {
            $new_file_extention = "jpeg";
        } else if ($file_ex == "image/png") {
            $new_file_extention = "png";
        } else if ($file_ex == "image/svg+xml") {
            $new_file_extention = "svg";
        }

        $file_name = "resources/lesson_imgs/" . $lessName . "." . $new_file_extention;

        move_uploaded_file($image["tmp_name"], $file_name);


        Database::iud("INSERT INTO `lessons` (`name`,`img`,`no_of_videos`,`price`) VALUES 
            ('" . $lessName . "','" . $file_name . "','0','" . $lessPrice . "') ");





        $note = $_FILES["lessNote"];

        $lesson_rs = Database::search("SELECT * FROM `lessons` WHERE `name`='" . $lessName . "'");
        $data = $lesson_rs->fetch_assoc();


        $id= $data["id"];

        $file_name = "resources/notes/" . $data["name"] . ".pdf";

        move_uploaded_file($note["tmp_name"], $file_name);

        Database::iud("INSERT INTO `note` (`name`,`code`,`lessons_id`) VALUES 
            ('" . $data["name"] . "','" . $file_name . "','" . $id . "') ");
    }
    echo ("Success");
}
