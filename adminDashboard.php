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
            if (isset($_SESSION["au"])) {

                $data = $_SESSION["au"];

                require "connection.php";

            ?>


                <div class=" container-fluid col-12">
                    <div class=" row">
                        <nav class="navbar navbar-dark fixed-top" style="background-color:gainsboro; box-shadow:0px 1px 10px 2px black;">
                            <div class="container-fluid float-end">
                                <span class="navbar-brand fw-bolder fs-1  text-dark d-lg-flex d-md-flex d-none" style="font-family: OCR A Std, monospace;  "><img style="width: 60px; height:60px; border-radius:100%;cursor: pointer;" src="resources/logo1.png" /> chemistLK&reg;</span>
                                <span class="navbar-brand fw-bolder fs-5 d-flex text-dark d-lg-none d-md-none" style="font-family: OCR A Std, monospace;  "><img style="width: 30px; height:30px; border-radius:100%;cursor: pointer;" src="resources/logo1.png" />chemistLK&reg;</span>


                                <a class="navbar-brand mt-sm-1 fs-4 text-primary text-decoration-none mx-5" style="font-family: OCR A Std, monospace;" href="userProfile.php">Hello, Admin</a>
                                <button class="fs-5 d-flex  d-lg-none d-md-none  fw-light text-danger  border-0" style="background-color:gainsboro; " onclick="signout();"><i class="bi bi-power"></i></button>

                            </div>
                        </nav>
                    </div>
                </div>


                <!-- options -->
                <div class=" col-12 col-lg-12   mt-5 gap-4  ">
                    <div class=" row">
                        <div class=" col-12 100vh">
                            <div class=" row">

                                <div class=" d-none d-lg-flex  d-md-flex col-3 vh-100" style="margin-top: 41px; position:fixed; background-color:gainsboro;">


                                    <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">

                                        <sapn class=" navbar-text fs-3  fw-bold text-primary">Dashboard</span>
                                            <nav class="nav flex-column">

                                                <a class="nav-link active text-decoration-none" aria-current="page" href="adminDashboard.php">List of lessons</a>

                                                <a class="nav-link" href="student.php">Students Details</a>
                                            </nav>
                                            <div class=" col-3 fixed-bottom mb-4 d-flex justify-content-center">
                                                <button class=" fs-6 fw-light text-danger mb-4 border-0" style="background-color:gainsboro;" onclick="adminSignout();"><i class="bi bi-power"></i>Log Out</button>
                                            </div>
                                    </div>


                                </div>


                                <div class=" d-flex d-lg-none  d-md-none col-12  fixed-bottom navigation " style="height:10vh;  background-color:gainsboro;  justify-content:center; align-items:center;">

                                    <nav class="navbar bg-body-tertiary">
                                        <form class="container-fluid justify-content-start gap-4">
                                            <a class="nav-link active text-decoration-none btn btn-primary" aria-current="page" style="width:40%;" href="adminDashboard.php">List of lessons</a>
                                            <a class="nav-link" style="width:50%;" href="student.php">Students Details</a>


                                        </form>
                                    </nav>








                                </div>
                                <!--  -->
                                <div class=" d-none  d-md-flex d-lg-flex overflow-hidden  col-3 vh-100" style="margin-top: 41px; background-color:transparent;">





                                </div>
                                <div class=" col-sm-12 col-md-9 col-lg-9 mx-sm-0  " style="margin-top: 45px; ">
                                    <div class=" row " style="margin-bottom:13%; ">
                                        <div class=" col-12 " style="background-color: transparent; margin-top:15px; ">

                                            <div class=" col-12 d-flex justify-content-center align-content-center gap-5" style="margin-bottom:25px;">
                                                <span class=" fs-2 fw-bold text-primary text-center">List of lessons</span>
                                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Add New Lesson" on>
                                                    <img src="resources/addLess.png" onclick="modelL();" class="img-fluid rounded-start" style="max-width: 200px; cursor:pointer;">
                                                </span>

                                            </div>




                                            <?php

                                            $lesson_rs = Database::search("SELECT * FROM `lessons`");

                                            $lesson_num = $lesson_rs->num_rows;

                                            for ($z = 0; $z < $lesson_num; $z++) {
                                                $lesson_data = $lesson_rs->fetch_assoc();
                                                $video_rs = Database::search("SELECT * FROM `video` WHERE `lessons_id`='" . $lesson_data["id"] . "'");

                                                $video_num = $video_rs->num_rows;

                                            ?>

                                                <!-- <div class="card mb-3 col-12">
                                                    <div class="row g-0">
                                                        <div class="col-md-4 border-end border-dark">
                                                            <img src="<?php echo $lesson_data["img"]; ?>" class="img-fluid rounded-start" alt="...">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                                <h5 class="card-title"><?php echo $lesson_data["name"]; ?></h5>
                                                                <a class=" btn btn btn-outline-primary " onclick='deleteLesson(<?php echo $lesson_data["id"] ?>);'>Delete Lesson</a>
                                                                <a class=" btn btn-outline-danger" href='<?php echo "lesson.php?id=" . ($lesson_data["id"]);  ?>'>Edit This</a>

                                                                <p class="card-text mt-3"><small class="text-muted">Number of Videos: <?php echo $video_num ?></small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
 -->

                                                <div class="card mb-3 col-12">
                                                    <div class="row g-0">
                                                        <div class="col-md-4">
                                                            <img src="<?php echo $lesson_data["img"]; ?>" class="img-fluid rounded-start " alt="..." style=" width:100%; margin-bottom:12px;">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="card-body">
                                                            <h5 class="card-title"><?php echo $lesson_data["name"]; ?></h5>
                                                                <a class=" btn btn btn-outline-primary " onclick='deleteLesson(<?php echo $lesson_data["id"] ?>);'>Delete Lesson</a>
                                                                <a class=" btn btn-outline-danger" href='<?php echo "lesson.php?id=" . ($lesson_data["id"]);  ?>'>Edit This</a>

                                                                <p class="card-text mt-3"><small class="text-muted">Number of Videos: <?php echo $video_num ?></small></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            <?php

                                            }

                                            ?>


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
                    header("Location:admin.php");
                }


                    ?>


                    </div>

                </div>
        </div>


        <!-- <div class="modal" tabindex="-1" id=mode1L>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-info">Add New Lesson</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class=" form-label">Lesson Name</label>

                        <Input placeholder="Enter the lesson name..." class=" form-control" type="text" id="lessName" />

                        <label class=" form-label">Price of this Lesson</label>

                        <Input placeholder="Price..." class=" form-control" type="text" id="lessPrice" />

                        <input type="file" class="mt-2" styel="borderRadius:10px;" id="lessImg">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary" onclick='uploadlesson();'>Save changes</a>
                    </div>
                </div>
            </div>
        </div> -->



        <div class="modal" tabindex="-1" id=modelL>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-info">Add New Lesson</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class=" form-label">Lesson Name</label>

                        <Input placeholder="Enter the lesson name..." class=" form-control" type="text" id="lessName" />

                        <label class=" form-label">Price of this Lesson</label>

                        <Input placeholder="Price..." class=" form-control" type="text" id="lessPrice" />

                        <input type="file" id="lessImg" class=" d-none ">
                        <label for="lessImg" class=" form-label btn btn-outline-success text-center mt-3">Choose Cover Image</label>

                        <input type="file" id="lessNote" class=" d-none" />
                        <label for="lessNote" class=" form-label btn btn-outline-success text-center mt-3 ">Choose Tutes</label>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <a type="button" class="btn btn-primary" onclick='uploadlesson();'>Save changes</a>
                    </div>
                </div>
            </div>
        </div>





    </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="semantic.js"></script>
    <script src="uikit.js"></script>
</body>

</html>