<?php
session_start();
 require('includes/header.php');
?>
<?php require('./admin/config/dbcon.php'); ?>


<!-- *******************************Home1******************** -->
<div class="home1">
    <div class="home1_content">
        <div class="home_1_text_area">
            <h1>Making your dream <br> house a reality</h1>
            <h5>
                <light> Construction is more than our business. It’s who we are.</light>
            </h5>
            <p> Dreams are meant to come true. We’ll make it happen for you.</p>
            <div class="home_1_btn ">
                <ul type="none" class="d-flex align-items-center">
                    <li> <a id="home_btn1" href="contact.php" class="btn btn-sm">Contact Now</a>
                    </li>
                    <li> <a id="home_btn2" href="services.php" class="btn btn-sm">Explore our services</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- ******************************home2***************************** -->
<div class="home2">
    <div class="container">
        <div class="row  gx-0 d-flex align-items-center justify-content-center my-5">
            <div class="col-md-4 home_2_boxes">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="">
                            <img src="./imgs/Flatiron Building.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 text-center">
                        <div class="home2_text_box">
                            <h3>200+</h3>
                            <p>Services Provided</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 home_2_boxes">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="">
                            <img src="./imgs/Batch Assign.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 text-center">
                        <div class="home2_text_box">
                            <h3>100+</h3>
                            <p>Happy Customers</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 home_2_boxes">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <div class="">
                            <img src="./imgs/Experience Skill.png" alt="">
                        </div>
                    </div>
                    <div class="col-md-8 text-center">
                        <div class="home2_text_box">
                            <h3>3+</h3>
                            <p>Years of Experience</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- **********************************home3********************************** -->
<div class="home3">
    <div class="container">
        <h1>About Us</h1>
        <h2>Creating World Class Properties that are Attractive, Beautiful & Secure</h2>
        <div class="home3_content row  d-flex align-items-center justify-content-center ">
            <div class="home3_text col-md-6 d-flex align-items-center justify-content-center flex-column">
                <p>At <b>Complete Home</b>, we pride ourselves on creating world-class properties that are not only attractive and beautiful but also secure. Our team of experts works tirelessly to ensure that every aspect of <span>your dream home is designed and constructed to the highest standards of quality and craftsmanship.</span>
                    <br>
                    <br>
                    <span> From the planning and designing stage to the final touches of interior decoration, </span>our team will work with you every step of the way to ensure that your home is everything you dreamed it would be. We use only the <span>best materials and modern construction techniques</span> to create a home that is not only aesthetically pleasing but also structurally sound and secure.
                    <br>
                    <br>
                    At Complete Home,<span>we believe that your home is your sanctuary</span> , and we strive to create a space that reflects your personality and lifestyle. Whether you are <span>building</span> a new home, <span> renovating</span> an existing one, or <span>simply updating</span> your interior, our team of experts will work with you to create a space that is both beautiful and functional. <span> Contact us </span> today to learn more about our services and how we can help you create the home of your dreams.
                </p>
            </div>
            <div class="home3_imgs col-md-6">
                <div class="home3_img_boxes">
                    <!-- ------------------video -->
                    <?php
                    $query = "SELECT * FROM home_video_tbl";
                    $query_run = mysqli_query($con, $query);
                    $num = mysqli_num_rows($query_run) > 0;
                    $video = mysqli_fetch_assoc($query_run)
                    ?>
                    <div class="card" style="height: 300px;">

                        <div class="video-popup">
                            <a class="popup" href="<?php echo $video['video_url'] ?>"><i class="fa-solid fa-circle-play"></i></a>

                            <!-- <a class="popup" href="https://www.youtube.com/watch?v=JdsnuQxp4qQ"><i class="fa-solid fa-circle-play"></i></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- *************************************home4************************ -->
<div class="home4">
    <div class="home4_content">
        <img src="./imgs/home4_bg1.png" alt="">
        <div class="home4_text">
            <h1>
                <a href="" class="typewrite" data-period="2000" data-type='[ "Planning & Designing", "Construction", " Interior", "Renovation" ]'>
                    <span class="wrap"></span>
                </a>
            </h1>
        </div>
    </div>
</div>

<!-- *******************************home5************************************* -->
<div class="home5">
    <div class="container py-5">
        <div class="home5_content">
            <div class="">
                <div class="home5_top_text">
                    <h1>Our Services</h1>
                    <p>We provide <span>a one-stop</span> solution for all your home-related needs. From <span>Planning & Designing to Construction, Interior, and Renovation </span> , our team of experts ensures that your dream home is built to the highest standards of quality and craftsmanship. <span>With over 15 years of real-time experience in the field </span> , we are committed to providing you with world-class properties that are not only attractive and beautiful but also secure. <span> Trust us to transform your home </span> into a space that reflects your personality and meets your needs, <span>all available with just one call. </span> </p>
                </div>
            </div>
            <div class="col-md-12 home5_boxes d-flex flex-column gap-3">
                <div class="row d-flex align-items-center gap-3 justify-content-center">
                    <div class="col-md-5 home5_box">
                        <img src="./imgs/home5_A1.png" alt="">
                        <div class="home5_box_text">
                            <h6>Planning & Designing</h6>
                            <p>We help you plan and design your dream home with functional and aesthetic design.</p>
                            <a href="services.php" class="btn">SHOW MORE</a>
                        </div>
                    </div>
                    <div class="col-md-5 home5_box">
                        <img src="./imgs/home5_A2.png" alt="">
                        <div class="home5_box_text">
                            <h6>Construction</h6>
                            <p>Our experienced builders build your dream home with the highest standards of quality and craftsmanship. </p>
                            <a href="services.php" class="btn">SHOW MORE</a>
                        </div>
                    </div>
                </div>
                <div class="row d-flex align-items-center gap-3 justify-content-center">
                    <div class="col-md-5 home5_box">
                        <img src="./imgs/home5_A3.png" alt="">
                        <div class="home5_box_text">
                            <h6>Interior</h6>
                            <p>Our interior designers transform your home into a beautiful and functional space that reflects your personality and lifestyle. </p>
                            <a href="services.php" class="btn ">SHOW MORE</a>
                        </div>
                    </div>
                    <div class="col-md-5 home5_box">
                        <img src="./imgs/home5_A4.png" alt="">
                        <div class="home5_box_text">
                            <h6>Renovation</h6>
                            <p> We help you update and renovate your existing home to make it more functional and aesthetically pleasing.</p>
                            <a href="services.php" class="btn">SHOW MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- *******************************Gallery******************** -->
<div class="home_gallery">
    <h1>Gallery</h1>
    <section id="gallery_area" class="section_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="gallery_slider_area text-center owl-carousel owl-theme">
                        <?php
                        $query = "SELECT * FROM img_tbl";
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
        <a href="projects.php" class="btn btn-sm">More</a>
    </div>
</div>

<!-- *************************home6********************************* -->
<div class="home6">
    <div class="row mx-auto">
        <div class="col-md-8 line m-0 p-0">

        </div>
        <div class="col-md-4 m-0 p-0 d-flex justify-content-start">
            <h1 class="">Our Past Works</h1>
        </div>
    </div>
    <div class="container my-4">
        <section id="work_area" class="section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="work_slider_area text-center owl-carousel owl-theme">
                            <?php
                            $query = "SELECT * FROM past_works_tbl where status = 1";
                            $query_run = mysqli_query($con, $query);
                            $num = mysqli_num_rows($query_run) > 0;

                            if ($num) {
                                while ($past_work = mysqli_fetch_assoc($query_run)) {
                            ?>
                                    <div class="card">
                                        <img src="admin/past_work_imgs/<?php echo $past_work['image'] ?>" class="card-img-top" alt="...">
                                        <div class="card-body ">
                                            <p class="card-text float-left text-start" style="color: #4D4140; font-size:0.8rem"><?php echo $past_work['name'] ?></p>
                                            <div class="card-text d-flex align-items-center justify-content-between p-0 m-0">
                                                <p style="font-size:0.6rem" class="d-flex align-items-center justify-content-center p-0 m-0"><img style="width: 1rem; height:1rem" src="./imgs/Location.png" alt=""><?php echo $past_work['location'] ?></p>
                                            </div>
                                        </div>
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
            </div>
        </section>
        <div class="text-center mt-4">
            <a href="projects.php" class="btn btn-sm">More</a>
        </div>
    </div>
</div>

<!-- ***********************************home7********************************** -->

<div class="home7">
    <div class="container">
        <section id="testimonial_area" class="section_padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Customer’s <br> Review</h1>
                        <div class="testmonial_slider_area text-center owl-carousel">
                            <div class="box-area">
                                <div class="img-area">
                                    <img src="./imgs/avatar5.png" alt="">
                                </div>
                                <h5>Pradeep Sharma</h5>
                                <p class="content">
                                "Complete Home : Their commitment to quality and security is unmatched. They turned my dream home into a reality, and I couldn't be happier. Highly recommended!"
                                </p>
                            </div>

                            <div class="box-area">
                                <div class="img-area">
                                    <img src="./imgs/avatar5.png" alt="">
                                </div>
                                <h5>Sanjay Mandavi</h5>
                                <p class="content">
                                "Complete Home exceeded my expectations in every way! Their attention to detail and commitment to security gave me peace of mind. My dream home is not only stunning but also feels incredibly safe. Thank you for creating my sanctuary!"
                                </p>
                            </div>

                            <div class="box-area">
                                <div class="img-area">
                                    <img src="./imgs/avatar5.png" alt="">
                                </div>
                                <h5>Naresh Gupta</h5>
                                <p class="content">
                                "Complete Home turned our dream into reality! Their dedication to quality and security is unmatched. Our home is not just beautiful, but we feel safe and at peace. Thank you for creating our perfect sanctuary!"
                                </p>
                            </div>

                            <div class="box-area">
                                <div class="img-area">
                                    <img src="./imgs/avatar5.png" alt="">
                                </div>
                                <h5>Mohan Deshmukh</h5>
                                <p class="content">
                                "Complete : Their commitment to quality and security truly set them apart. From design to finish, they made my dream home a reality. I couldn't be happier!"
                                </p>
                            </div>

                            <div class="box-area">
                                <div class="img-area">
                                    <img src="./imgs/avatar5.png" alt="">
                                </div>
                                <h5>Rajat Patel</h5>
                                <p class="content">
                                "Complete Home: They crafted a secure, stunning sanctuary that truly reflects my style. Their dedication to quality and attention to detail are unmatched. I'm thrilled with my dream home!"
                                </p>
                            </div>

                            <div class="box-area">
                                <div class="img-area">
                                    <img src="./imgs/avatar5.png" alt="">
                                </div>
                                <h5>Piyush Thakur</h5>
                                <p class="content">
                                "Complete Home exceeded my expectations! Their attention to detail and commitment to security gave me peace of mind. My dream home is now a reality, reflecting my style and needs. Thank you for creating my sanctuary!"
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- ***************************************home8************************** -->
<?php
if (isset($_SESSION['cm_msg'])) {
    echo "<script>alert(' ".$_SESSION['cm_msg'] ."')</script>";
    unset($_SESSION['cm_msg']);
}
?>
<div class="home8">
    <div class="container p-0 ">
        <div class="row home8_content d-flex align-items-center justify-content-center py-3 m-0">
            <div class="col-md-12 home8_top_text">
                <h2>Do you have a question? Or do you <br> need us to prepare a complete home <br> quote for you?</h2>
                <p>Write to us! We will be happy to advise you</p>
            </div>
            <div class="home8_inp_box d-flex align-items-center justify-content-center   ">
                <div class="home8_left_blank col-md-6">

                </div>
                <div class="home8_right_input col-md-6 bg-white p-5 ">
                    <form action="admin/connect.php" method="post" enctype=multipart/form-data>
                        <div class="row" style="gap:1rem 0;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" class="form-control inp" name="name2" placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control inp " name="email2" placeholder="Enter email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" maxlength="10" class="form-control inp " onkeyup="val(this)" name="number2" placeholder="Number" required>
                                    <p style="font-size: 0.7rem ; color:red; font-weight:500;" id="msg_number"></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message2" cols="30" rows="3" class="form-control inp " placeholder="Your Message" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="" style="color:#AE0101; display:block;" class="p-1 m-1 rounded text-center">You can attache pictures of your ideas</label>
                                    <input class="form-control border-0 shadow-none" name="files2" type="file" required>
                                </div>
                            </div>
                            <div class="">
                                <div class="btn1">
                                    <button type="submit" name="submit2" class="btn">Submit</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<?php require('includes/footer.php') ?>
<?php require('includes/script.php') ?>
<script>
    // $("#home_btn2").hover(function(){
    //     $('#home_btn1').css("color","#AE0101");
    //     $('#home_btn1').css("background-color","#fff");
    //     $('#home_btn1').css("border-color","#AE0101");

    //     // $('#home_btn2').css("color","#fff");
    //     // $('#home_btn2').css("background-color","#AE0101");
    // });

    // $("#home_btn1").hover(function(){

    //     $('#home_btn2').css("color","#fff");
    //     $('#home_btn2').css("background-color","#AE0101");
    // });
</script>