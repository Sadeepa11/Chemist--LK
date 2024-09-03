<?php

require "connection.php";

$uvidName = $_POST["uvidName"];
$ulessId = $_POST["ulessId"];
$vidId = $_POST["vidId"];



$lesson_rs = Database::search("SELECT * FROM `lessons` WHERE `id`='" . $ulessId . "'");

$data = $lesson_rs->fetch_assoc();
$video_rs = Database::search("SELECT * FROM `video` WHERE `id`='" . $vidId . "'");

$video_data = $video_rs->fetch_assoc();



$uimage = $_FILES["uvidImg"];

$allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
$file_ex = $uimage["type"];

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

    $file_name5 = "resources/video_imgs/" . $data["name"] . $uvidName . "." . $new_file_extention;



    move_uploaded_file($uimage["tmp_name"], $file_name5);
}

$uvideo = $_FILES["uvideo"];

$file_name4 = "resources/videos/" . $data["name"] . $uvidName  . ".mp4";

move_uploaded_file($uvideo["tmp_name"], $file_name4);


Database::iud("UPDATE `video` SET `video name`='".$uvidName."',`code`='".$file_name4."',`lessons_id`='".$ulessId."',`video_img`='".$file_name5."' 
WHERE `id`='".$video_data["id"]."'");


// Database::iud("UPDATE `video`    SET  `video name`='".$uvidName."',`code`='". $file_name4 ."',`lessons_id`='".$ulessId."',`video_img`='".$file_name5."' 
// WHERE `id`='".$video_data["id"]."'");

echo ("Success");


// echo($data["name"]);

// if (isset($_FILES["uvidImg"])) {
//     $uimage = $_FILES["uvidImg"];

//     $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
//     $file_ex = $uimage["type"];

//     if (!in_array($file_ex, $allowed_image_extentions)) {
//         echo ("Please select a valid image.");
//     } else {

//         $new_file_extention;

//         if ($file_ex == "image/jpg") {
//             $new_file_extention = "jpg";
//         } else if ($file_ex == "image/jpeg") {
//             $new_file_extention = "jpeg";
//         } else if ($file_ex == "image/png") {
//             $new_file_extention = "png";
//         } else if ($file_ex == "image/svg+xml") {
//             $new_file_extention = "svg";
//         }

//         $file_name5 = "resources/video_imgs/" . $data["name"].$uvidName. ".". $new_file_extention;

       

//         move_uploaded_file($uimage["tmp_name"], $file_name5);


// $uvideo = $_FILES["uvideo"];

// $file_name4 = "resources/videos/" .$data["name"] .$uvidName  . ".mp4";

// move_uploaded_file($uvideo["tmp_name"], $file_name4);

// // Database::iud("INSERT INTO `video` (`video_name`,`code`,`lessons_id`,`video_img`) VALUES 
// //             ('" . $vidName . "','" . $file_name2 . "','" . $lessId . "','" . $file_name1 . "') ");




// Database::iud("UPDATE `video` SET `video name`='" . $uvidName . "',`code`='" . $file_name4 . "',`lessons_id`='" . $ulessId . "',`video_img`='".$file_name5."'
// WHERE `id`='" . $vidId. "'");
// }
// echo ("Success");
//     }else{


// echo("Please Select a Image");


//     }
