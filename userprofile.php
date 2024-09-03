<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="semantic.css" />

    <link rel="icon" href="resources/logo1.png" />

</head>

<body style="background-color:gainsboro;">
    <!-- hedar -->





    </div>
    <!-- header -->
    <div class=" container-fluid col-12     ">

        <div class=" col-12 d-flex justify-content-center align-content-center border-2 border-bottom border-secondary" style="margin-top:25px; ">
            <span class=" fs-2 fw-bold text-primary text-center mb-3">My Profile</span>

        </div>



        <div class=" row mb-3">
            <div class=" col-8 mt-5" style="margin-left:15%; ">

                <?php
                session_start();
                $email = $_SESSION["u"]["email"];



                require "connection.php";


                $details_rs = Database::search("SELECT * FROM `students`  WHERE `email`='" . $email . "'");
                $data = $details_rs->fetch_assoc();


                $image_rs = Database::search("SELECT * FROM `pro_pics` WHERE 
                `email`='" . $data["email"] . "'");
                $image_data = $image_rs->fetch_assoc();



                if (empty($image_data["path"])) {
                ?>
                    <img class=" mt-1 border-2 border-primary" style=" border-radius:100%; height:250px; width:250px; margin-left:5%; " src="resources/profile_imgs/sample.png" id="viweImg">
                <?php
                } else {
                ?>
                    <img class=" mt-1 border-2 border-primary " style=" border-radius:100%; height:250px; width:250px; margin-left:5%; " src="<?php echo $image_data["path"]; ?>" id="viweImg">
                <?php
                }
                ?>


                <input type="file" class="d-none" id="profileimage" />
                <label onclick="changeImage();" for="profileimage" class="btn btn-secondary mt-3" id="profileimage">Update Profile Image</label>


                <div class=" col-12">
                    <label class=" form-label"> First Name</label>
                    <input type="text" class=" form-control" value="<?php echo $data["fname"]; ?>" id="f">
                </div>
                <div class=" col-12">
                    <label class=" form-label"> Last Name</label>
                    <input type="text" class=" form-control" value="<?php echo $data["lname"]; ?> " id="l">
                </div>
                <div class=" col-12">
                    <label class=" form-label"> Email</label>
                    <input type="email" class=" form-control " value="<?php echo $data["email"]; ?>" readonly>
                </div>
                <div class=" col-12">
                    <label class=" form-label"> Password</label>
                    <input type="text" class=" form-control" value="<?php echo $data["password"]; ?>" readonly>
                </div>
                <div class=" col-12">
                    <label class=" form-label"> Grade</label>
                    <input type="text" class=" form-control" value="<?php echo $data["grade"]; ?> " id="g">
                </div>






                <div class=" col-11 mt-4 mx-4">
                    <div class=" row">
                        <button class=" btn btn-success" type="submit" onclick="updateProfile();">Update My Profile</button>
                    </div>
                </div>


            </div>

        </div>
    </div>

    </div>
    <!-- footer -->





    </div>
    <!-- footer -->
    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="semantic.js"></script>
</body>

</html>