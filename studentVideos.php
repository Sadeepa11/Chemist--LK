<?php

require "connection.php";

if (isset($_GET["id"])) {




    $lesson_id = $_GET["id"];



    $lesson_rs = Database::search("SELECT * FROM `lessons` WHERE `id`='" . $lesson_id . "'");

    $data = $lesson_rs->fetch_assoc();




?>






    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $data["name"]; ?></title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="uikit.css" />

        <link rel="icon" href="resources/logo1.png" />
    </head>

    <body>


        <div class=" container-fluid" style="margin-bottom: 20px;">
            <div class="row">


                <?php

                $video_rs = Database::search("SELECT * FROM `video` WHERE `lessons_id`='" . $lesson_id . "'");

                $video_num = $video_rs->num_rows;
                $video_data = $video_rs->fetch_assoc();



                ?>



                <div class="col-12">

                    <div class="row">
                        <!-- lg -->

                        <div class="col-12  justify-content-center align-content-center mt-3 " style="height:7vh;">

                            <div class=" col-12 d-flex justify-content-center ">
                                <div class=" col-10">
                                    <span class=" fs-4 fw-bold text-primary"><?php echo $data["name"]; ?></span>
                                    <span class=" fs-4 fw-bold text-primary"><?php echo "(" . $video_num . " Videos)" ?></span>

                                </div>




                                <!-- <div class=" col-1 offset-1">

                                    <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Add New Video" on>
                                        <img src="resources/addLess.png" onclick="modelV();" class="img-fluid rounded-start" style="max-width: 200px; cursor:pointer;">
                                    </span>
                                </div> -->
                            </div>

                        </div>
                        <!-- lg -->




                    </div>

                    <!-- aa -->

                    <!-- aa -->


                </div>





                <div class="col-12    " style="height:69vh;">





                    <?php

                    $video_rs = Database::search("SELECT * FROM `video` WHERE `lessons_id`='" . $lesson_id . "'");

                    $video_num = $video_rs->num_rows;

                    for ($z = 0; $z < $video_num; $z++) {
                        $video_data = $video_rs->fetch_assoc();


                    ?>




                        <!-- style="height: 30vh;" img height: 29.8vh; -->

                        <div class="card mb-5 col-12 ">
                            <div class="row g-0">
                                <div class="col-md-4  ">
                                    <img src="<?php echo $video_data["video_img"]; ?>" class="img-fluid rounded-start " alt="..." style=" width:100%;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title"><?php echo $data["name"]; ?></h3>
                                        <h5 class=""><?php echo $video_data["video name"]; ?></h5>
                                        <a class=" btn btn btn-outline-primary " href="<?php echo "video.php?id=" . ($video_data["id"]); ?>">Go To Video</a>
                                        <!-- <a class=" btn btn-outline-danger " onclick='modelUV(<?php echo $video_data["id"] ?>);'>Edit This</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>


                    <?php


                    }
                    ?>




                </div>
            </div>







        <?php
    }

        ?>







        <div class="modal" tabindex="-1" id=modelV>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-info">Add New Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class=" form-label">Video Name</label>
                        <Input placeholder="Enter the lesson name..." class=" form-control" type="text" id="vidName" />

                        <label class=" form-label">Lesson Id</label>

                        <Input placeholder="Enter the lesson name..." class=" form-control" type="text" id="lessId" value="<?php echo $data["id"]; ?>" readonly />
                        <div class=" col-12">
                            <div class="row">
                                <div class=" col-6">
                                    <input type="file" class="mt-2 col-6 d-none" styel="borderRadius:10px;" id="vidImg">
                                    <label for="vidImg" class="btn btn-dark mt-3" id="vidImg">Upload Video Image</label>


                                </div>
                                <div class=" col-12">
                                    <input type="file" class="mt-2 col-6 d-none" style="border-radius:10px;" id="video">
                                    <label for="video" class="btn btn-dark mt-3" id="video">Upload a Video</label>
                                </div>


                            </div>






                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" type="submit" onclick='uploadVideo();'>Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id=modelUV>
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-info">Update Video</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class=" form-label">Video Name</label>
                        <Input placeholder="Enter the lesson name..." class=" form-control" type="text" id="uvidName" />

                        <label class=" form-label">Lesson Id</label>

                        <Input placeholder="Enter the lesson name..." class=" form-control" type="text" id="ulessId" value="<?php echo $data["id"]; ?>" readonly />
                        <div class=" col-12">
                            <div class="row">
                                <div class=" col-6">
                                    <input type="file" class="mt-2 col-6 d-none" styel="borderRadius:10px;" id="uvidImg">
                                    <label for="uvidImg" class="btn btn-dark mt-3" id="uvidImg">Update Video Image</label>


                                </div>
                                <div class=" col-12">
                                    <input type="file" class="mt-2 col-6 d-none" style="border-radius:10px;" id="uvideo">
                                    <label for="uvideo" class="btn btn-dark mt-3" id="uvideo">Update a Video</label>
                                </div>


                            </div>






                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" type="submit" onclick='updateVideo(<?php echo $video_data["id"] ?>);'>Save changes</button>
                    </div>
                </div>
            </div>
        </div>


        </div>



        <script src="script.js">
        </script>
        <script src="bootstrap.bundle.js"></script>
        <script src="semantic.js"></script>
        <script src="uikit.js"></script>
    </body>



    </html>