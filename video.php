<?php

require "connection.php";

if (isset($_GET["id"])) {



    $vid_id = $_GET["id"];




    $video_rs = Database::search("SELECT * FROM `video` WHERE `id`='" . $vid_id . "'");

    $video_data = $video_rs->fetch_assoc();




?>






    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $video_data["video name"]; ?></title>

        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="semantic.css" />
        <link rel="stylesheet" href="uikit.css" />

        <link rel="icon" href="resources/logo1.png" />
    </head>

    <body>


        <div class=" container-fluid">
            <div class="row">
                <div class="col-12" style="height:100vh; ">

                <!-- <h3  style="height: 2vh; margin-left:45%;" class=" text-primary fw-bold "><?php echo $video_data["video name"]; ?></h3> -->
                    <div class=" col-12 " style="border-radius: 5px; height:100vh;" >
                        <video controls width="100%"  controlslist="nodownload" style="border-radius: 5px; height:100vh;" >
                            <source src="<?php echo $video_data["code"] ?>" type="video/mp4">
                            <!-- <source src="resources/videos/sample.mp4" type="video/mp4"> -->
                        </video>

                        

                    </div>

                </div>

            </div>
            
        </div>







    <?php
}

    ?>


    </div>
    </div>






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