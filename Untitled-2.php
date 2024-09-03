<div class="col-12">

                <div class="row">
                    <!-- lg -->

                    <div class=" col-md-7 col-12 col-lg-7 d-none d-lg-flex d-md-flex justify-content-center align-content-center mt-3 position-fixed " style="height:10vh;">

                        <div class=" col-12 d-flex justify-content-center ">
                            <div class=" col-10">
                                <span class=" fs-4 fw-bold text-primary"><?php echo $data["name"]; ?></span>
                                <span class=" fs-4 fw-bold text-primary"><?php echo "(" . $video_num . " Videos)" ?></span>

                            </div>




                            <div class=" col-1 offset-1">

                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Add New Video" on>
                                    <img src="resources/addLess.png" onclick="modelV();" class="img-fluid rounded-start" style="max-width: 200px; cursor:pointer;">
                                </span>
                            </div>
                        </div>

                    </div>
                    <!-- lg -->

                    <!-- sm -->

                    <div class=" col-md-7 col-12 col-lg-7 d-flex d-lg-none d-md-none justify-content-center align-content-center mt-3  " style="height:10vh;">

                        <div class=" col-12 d-flex justify-content-center ">
                            <div class=" col-10">
                                <span class=" fs-4 fw-bold text-primary"><?php echo $data["name"]; ?></span>
                                <span class=" fs-4 fw-bold text-primary"><?php echo "(" . $video_num . " Videos)" ?></span>

                            </div>




                            <div class=" col-1 offset-1">


                                <span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" title="Add New Video" on>
                                    <img src="resources/addLess.png" onclick="modelV();" class="img-fluid rounded-start" style="max-width: 200px; cursor:pointer;">
                                </span>
                            </div>
                        </div>

                    </div>
                    <!-- sm -->


                </div>

                <div class="row">
                    <div class="col-md-7 col-12 col-lg-7 d-none d-lg-flex d-md-flex position-fixed" style="height: 100vh; margin-top: 10vh;">


                        <div class=" col-12 " style="border-radius: 5px;">
                            <video controls width="100%" controlslist="nodownload" style="border-radius: 5px;">
                                <source src="<?php echo $video_data["code"] ?>" type="video/mp4">
                                <!-- <source src="resources/videos/sample.mp4" type="video/mp4"> -->
                            </video>

                            <h3 class="mb-2"><?php echo $video_data["video name"]; ?></h3>

                        </div>

                    </div>

                </div>


                <div class="col-md-7 col-12 col-lg-7  d-flex d-lg-none d-md-none">


                    <div class=" col-12 " style="border-radius: 5px;">
                        <video controls width="100%" controlslist="nodownload" style="border-radius: 5px;">
                            <source src="<?php echo $video_data["code"] ?>" type="video/mp4">
                            <!-- <source src="resources/videos/sample.mp4" type="video/mp4"> -->
                        </video>

                        <h3 class="mb-2"><?php echo $video_data["video name"]; ?></h3>

                    </div>


                    </button>

                </div>




            </div>
            <div class="col-12 col-lg-5 col-md-5    offset-lg-7 offset-md-7">





                <?php

                $video_rs = Database::search("SELECT * FROM `video` WHERE `lessons_id`='" . $lesson_id . "'");

                $video_num = $video_rs->num_rows;

                for ($z = 0; $z < $video_num; $z++) {
                    $video_data = $video_rs->fetch_assoc();


                ?>

                    <div class="card mb-3 mt-3 col-12">
                        <div class="row g-0">
                            <div class="col-md-4 border-end border-dark bg-black rounded-start">
                                <img src="<?php echo $video_data["video_img"]; ?>" class="img-fluid rounded-start" alt="..." style="height:100%;">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h3><?php echo $data["name"]; ?></h3>
                                    <h5 class=""><?php echo $video_data["video name"]; ?></h5>
                                    <a class=" btn btn btn-outline-primary " href='<?php echo "addVideo.php?id=" . ($lesson_data["id"]); ?>'>Delete Lesson</a>
                                    <a class=" btn btn-outline-danger " onclick='modelUV(<?php echo $video_data["id"] ?>);'>Edit This</a>


                                </div>
                            </div>
                        </div>
                    </div>


                <?php


                }
                ?>




            </div>