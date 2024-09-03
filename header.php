<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <?php

    if (isset($_SESSION["u"])) {

        $data = $_SESSION["u"];
        $image_rs = Database::search("SELECT * FROM `pro_pics` WHERE 
                                `email`='" . $data["email"] . "'");
        $image_data = $image_rs->fetch_assoc();


    ?>

        <div class=" container-fluid col-12">
            <div class=" row">
                <nav class="navbar navbar-dark fixed-top" style="background-color:gainsboro; box-shadow:0px 1px 10px 2px black;">
                    <div class="container-fluid float-end">
                        <span class="navbar-brand fw-bolder fs-1  text-dark d-lg-flex d-md-flex d-none" style="font-family: OCR A Std, monospace;  "><img style="width: 60px; height:60px; border-radius:100%;cursor: pointer;" src="resources/logo1.png" /> chemistLK&reg;</span>
                        <span class="navbar-brand fw-bolder fs-5 d-flex text-dark d-lg-none d-md-none" style="font-family: OCR A Std, monospace;  "><img style="width: 30px; height:30px; border-radius:100%;cursor: pointer;" src="resources/logo1.png" />chemistLK&reg;</span>


                        <a class="navbar-brand mt-sm-1 fs-4 text-primary text-decoration-none" style="font-family: OCR A Std, monospace;" href="userProfile.php"><img style="width: 40px; height:40px; border-radius:100%;cursor: pointer;" class=" d-none d-lg-inline d-md-inline d-xl-inline d-xxl-inline" src="<?php echo $image_data["path"]; ?>" /><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></a>
                        <button class="fs-5 d-flex  d-lg-none d-md-none  fw-light text-danger  border-0" style="background-color:gainsboro;" onclick="signout();"><i class="bi bi-power"></i></button>
     
                    </div>
                </nav>
            </div>
        </div>


    <?php



    }

    ?>


    <script src="script.js"></script>
</body>

</html>