<?php require('includes/header.php'); ?>
<?php require('./admin/config/dbcon.php'); ?>


<!-- *************************project1**************************** -->


<div class="top_hero">
    <div class="top_hero_content">
        <img src="./imgs/home4_bg1.png" alt="">
        <div class="top_hero_text">
            <h1>Projects</h1>
           <p><a href="index.php">Home</a> /Projects</p> 
        </div>
    </div>
</div>

<!-- ************************************projrct2*************************** -->
<div class="project2">
    <h1>Gallery</h1>
    <section id="gallery_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery_slider_area text-center owl-carousel owl-theme">
                        <?php
                        $query = "SELECT * FROM img_tbl where status = 1";
                        $query_run = mysqli_query($con, $query);
                        $num = mysqli_num_rows($query_run) > 0;

                        if ($num) {
                            while ($img = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <div class="box-area card">
                                    <img src="admin/admin_img_upload/<?php echo $img['img_name'] ?>" class="card-img-top" alt="...">
                                </div>
                        <?php
                            }
                        } else {
                            echo "no images";
                        }
                        ?>
                    </div>
                </div>
            </div>
    </section>
    <div class="text-center mt-4">
        <a href="https://www.instagram.com/complete_home_/" class="btn btn-sm">More</a>
    </div>
</div>

<!-- ****************************************project3************************** -->

<div class="project3">
    <h1>Videos</h1>
    <div class="container">
        <div class="row">
            <?php
            $query = "SELECT * FROM video_tbl where status = 1 ORDER BY created_at desc";
            $query_run = mysqli_query($con, $query);
            $num = mysqli_num_rows($query_run) > 0;

            if ($num) {
                while ($video = mysqli_fetch_assoc($query_run)) {
            ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="video_frame2 video-popup">
                                <a class="popup" href="<?php echo $video['video_name'] ?>"><i class="fa-solid fa-circle-play"></i></a>
                            </div>
                        </div>
                    </div>
            <?php

                }
            } else {
                echo "no videos";
            }
            ?>
            <!-- <div class="col-md-4">
                        <div class="card">
                            <div class="video_frame1 video-popup">
                                <a class="popup" href=""><i class="fa-solid fa-circle-play"></i></a>
                            </div>
                        </div>
                    </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="video_frame2 video-popup">
                        <a class="popup" href="https://www.youtube.com/watch?v=CCFOcn_EGLI&t=6s"><i class="fa-solid fa-circle-play"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="video_frame3 video-popup">
                        <a class="popup" href="https://www.youtube.com/watch?v=W3P6ez_CpJw&t=1s"><i class="fa-solid fa-circle-play"></i></a>
                    </div>
                </div>
            </div> -->
        </div>

        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="video_frame1 video-popup">
                        <a class="popup" href="https://www.youtube.com/watch?v=cZ9EeS-0Z5A"><i class="fa-solid fa-circle-play"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="video_frame2 video-popup">
                        <a class="popup" href="https://www.youtube.com/watch?v=CCFOcn_EGLI&t=6s"><i class="fa-solid fa-circle-play"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="video_frame3 video-popup">
                        <a class="popup" href="https://www.youtube.com/watch?v=W3P6ez_CpJw&t=1s"><i class="fa-solid fa-circle-play"></i></a>
                    </div>
                </div>
            </div>
        </div> -->


        <div class="text-center m-3">
            <a href="https://www.youtube.com/@completehome" class="btn btn-sm">More</a>
        </div>
    </div>
</div>
<!-- ************************************project4****************************** -->

<div class="project4">
    <div class="project4_content">
        <img src="./imgs/home4_bg1.png" alt="">
        <div class="project4_text">
            <h1>What we belive</h1>
            <p>Our mission at Complete Home is to provide world-class, comprehensive home solutions to our clients. We aim to exceed our clients' expectations and provide them with exceptional service that enhances their living experience. We strive to deliver quality craftsmanship and excellent customer service, ensuring our clients' satisfaction and earning their loyalty. </p>
        </div>
    </div>
</div>


<!--************************************project5****************************** -->

<div class="project5">
    <div class="project5_content">
        <img src="./imgs/home4_bg1.png" alt="">
        <div class="project5_text">
            <h1>Over Vision</h1>
            <p>trusted and preferred provider of home services in the region. We envision creating homes that are not only beautiful but also safe, sustainable, and functional. We aim to be the go-to solution for our clients' every home need, making their life easier and hassle-free. We believe in creating long-term relationships with our clients based on trust, transparency, and reliability. </p>
        </div>
    </div>
</div>

<?php require('includes/footer.php') ?>
<script src="includes/lightbox-plus-jquery.js"></script>
<?php require('includes/script.php') ?>