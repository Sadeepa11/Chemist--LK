<?php

session_start();

require "connection.php";

if (isset($_SESSION["u"])) {

    $fname = $_POST["fn"];
    $lname = $_POST["ln"];
    $grade = $_POST["g"];

    $image_rs = Database::search("SELECT * FROM `pro_pics` WHERE 
   `email`='" . $_SESSION["u"]["email"] . "'");
    $image_data = $image_rs->fetch_assoc();

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
        $file_ex = $image["type"];

        if (!in_array($file_ex, $allowed_image_extentions)) {
            echo ("Please select a valid image.");
        } else {

            $new_file_extention;

            if ($file_ex == "image/jpg") {
                $new_file_extention = ".jpg";
            } else if ($file_ex == "image/jpeg") {
                $new_file_extention = ".jpeg";
            } else if ($file_ex == "image/png") {
                $new_file_extention = ".png";
            } else if ($file_ex == "image/svg+xml") {
                $new_file_extention = ".svg";
            }

            $file_name = "resources/profile_imgs/" . $_SESSION["u"]["fname"] . "_" . uniqid() . $new_file_extention;

            move_uploaded_file($image["tmp_name"], $file_name);

            $profile_rs = Database::search("SELECT * FROM `students` WHERE 
                                `email`='" . $_SESSION["u"]["email"] . "'");
            $profile_data = $profile_rs->fetch_assoc();

            if (empty($image_data["path"])) {


                Database::iud("INSERT INTO `pro_pics` (`path`,`email`) VALUES 
                ('" . $file_name . "','". $_SESSION["u"]["email"]."') ");
            } else {
                Database::iud("UPDATE `pro_pics` SET `path`='" . $file_name . "' ' WHERE 
                `email`='" . $_SESSION["u"]["email"] . "'");
            }
        }
    }

    Database::iud("UPDATE `students` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`grade`='" . $grade . "' 
            WHERE `email`='" . $_SESSION["u"]["email"] . "'");



    echo ("success");
} else {
    echo ("Please login first");
}
