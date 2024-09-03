<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Dashboard</title>



    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="semantic.css" />
    <link rel="stylesheet" href="uikit.css" />

    <link rel="icon" href="resources/logo1.png" />
</head>

<body>
    <div class=" container-fluid">
        <div class=" row ">

            <?php
            session_start();
            if (isset($_SESSION["u"])) {

                $data = $_SESSION["u"];

                require "connection.php";

            ?>
                <!-- hedar -->

                <?php include "header.php"; ?>






                <!-- options -->
                <div class=" col-12 col-lg-12   mt-5 gap-4  ">
                    <div class=" row">
                        <div class=" col-12 100vh">
                            <div class=" row">

                                <div class=" d-none d-lg-flex  d-md-flex  col-3 vh-100" style="margin-top: 41px; position:fixed; background-color:gainsboro;">


                                    <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">

                                        <sapn class=" navbar-text fs-3  fw-bold text-primary">Dashboard</span>
                                            <nav class="nav flex-column">

                                                <a class="nav-link " href="dashboard.php">List of lessons </a>
                                                <a class="nav-link active text-decoration-none btn btn-primary" aria-current="page" href="myLessons.php">My lessons</a>
                                            </nav>
                                            <div class=" col-3 fixed-bottom mb-4 d-flex justify-content-center">
                                                <button class=" fs-6 fw-light text-danger mb-4 border-0" style="background-color:gainsboro;" onclick="signout();"><i class="bi bi-power"></i>Log Out</button>
                                            </div>
                                    </div>




                                </div>
                                <!--  -->
                                <div class=" d-flex d-lg-none  d-md-none col-12  fixed-bottom navigation " style="height:10vh;  background-color:gainsboro;  justify-content:center; align-items:center;">

                                    <nav class="navbar bg-body-tertiary">
                                        <form class="container-fluid justify-content-start gap-4">
                                            <a class="nav-link " href="dashboard.php" style="width:60%;">List of lessons </a>
                                            <a class="nav-link active text-decoration-none btn btn-primary" aria-current="page" style="width:30%; height:90%;" href="myLessons.php">My lessons</a>


                                        </form>
                                    </nav>








                                </div>
                                <!--  -->
                                <div class=" d-none  d-md-flex d-lg-flex overflow-hidden  col-3 vh-100" style="margin-top: 41px;">





                                </div>
                                <div class=" col-sm-12 col-md-9 col-lg-9 mx-sm-0  " style="margin-top: 45px; ">
                                    <div class=" row " style="margin-bottom:10%; ">
                                        <div class=" col-12 " style="background-color: transparent; margin-top:25px; ">

                                            <div class=" col-12 d-flex justify-content-center align-content-center" style="margin-bottom:25px;">
                                                <span class=" fs-2 fw-bold text-primary text-center">My lessons</span>

                                            </div>






                                            <?php

                                            $students_has_lessons_rs = Database::search("SELECT * FROM `students_has_lessons` WHERE `students_email`='".$data["email"]."' ");
                                            $students_has_lessons_data = $students_has_lessons_rs->fetch_assoc();




                                            $lesson_rs = Database::search("SELECT * FROM `lessons` WHERE `id`='".$students_has_lessons_data["lessons_id"]."'");

                                            $lesson_num = $lesson_rs->num_rows;
                                            if($lesson_num != 0){



                                                for ($z = 0; $z < $lesson_num; $z++) {
                                                    $lesson_data = $lesson_rs->fetch_assoc();
    
    
                                                    $video_rs = Database::search("SELECT * FROM `video` WHERE `lessons_id`='" . $lesson_data["id"] . "'");
    
                                                    $video_num = $video_rs->num_rows;
    
                                                    $note_rs = Database::search("SELECT * FROM `note` WHERE `lessons_id`='" . $lesson_data["id"] . "'");
    
    
                                                    $note_data = $note_rs->fetch_assoc();
    
    
                                                ?>
    
                                                    <div class="card mb-5 col-12">
                                                        <div class="row g-0">
                                                            <div class="col-md-4 border-end border-dark">
                                                                <img src="<?php echo $lesson_data["img"]; ?>" class="img-fluid rounded-start" alt="..." style="">
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="card-body">
                                                                    <h5 class="card-title"><?php echo $lesson_data["name"]; ?></h5>
    
    
                                                                    <a class=" btn btn btn-outline-success text-decoration-none " href='<?php echo "studentVideos.php?id=" . ($lesson_data["id"]);  ?>'>Go to Lesson</a>
                                                                    <a class=" btn btn btn-outline-primary text-decoration-none " href='<?php echo $note_data["code"];  ?>'>Viwe & Download Notes</a>
    
    
                                                                    <!-- <button class=" btn btn-outline-danger">Edit This</button> -->
    
                                                                    <p class="card-text mt-3"><small class="text-muted">Number of Videos: <?php echo $video_num ?></small></p>
                                                                    <p class="card-text mt-4"><small class="text-primary">Rs:<?php echo $lesson_data["price"] ?>/=</small></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
<?php


                                                }
                                                
                                                
                                                }else{
                                                    ?>
                                                    
                                                    <p>No Lessons to Purchase</p>
                                                    
                                                    
                                                    <?php

                                                }
                                                
                                                
                                                ?>







                                        

                                                


                                          


                                            <!-- </div> -->
                                            <!-- footer -->


                                            <!-- footer -->

                                        </div>

                                    </div>
                                    <?php include "footer.php"; ?>

                                </div>
                            </div>



                        </div>

                        <!-- options -->
                    <?php

                } else {
                    header("Location:index.php");
                }


                    ?>


                    </div>

                </div>

                <script src="script.js"></script>
                <script src="bootstrap.bundle.js"></script>
                <script src="semantic.js"></script>
                <script src="uikit.js"></script>
</body>

</html>