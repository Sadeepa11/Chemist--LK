<?php




require "connection.php";

$vidName = $_POST["vidName"];
$lessId = $_POST["lessId"];



$lesson_rs = Database::search("SELECT * FROM `lessons` WHERE `id`='" . $lessId . "'");

$data = $lesson_rs->fetch_assoc();

// echo($data["name"]);

if (isset($_FILES["vidImg"])) {
    $image = $_FILES["vidImg"];

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

        $file_name1 = "resources/video_imgs/" . $data["name"] . $vidName . "." . $new_file_extention;



        move_uploaded_file($image["tmp_name"], $file_name1);


        $video = $_FILES["video"];

        $file_name2 = "resources/videos/" . $data["name"] . $vidName  . ".mp4";

        move_uploaded_file($video["tmp_name"], $file_name2);

        Database::iud("INSERT INTO `video` (`video name`,`code`,`lessons_id`,`video_img`) VALUES 
            ('" . $vidName . "','" . $file_name2 . "','" . $lessId . "','" . $file_name1 . "') ");


  
    }
    echo ("Success");
} else {


    echo ("Please Select a Image");
}
