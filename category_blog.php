<?php require('includes/header.php');
session_start();
?>
<?php require('./admin/config/dbcon.php'); ?>


<div class="as_main_wrapper as_blog_page">
    <h1>Our Blog</h1>
    <section class="as_blog_wrapper ">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                    <div class="as_shop_sidebar">
                        <div class="as_widget as_search_widget">
                        <?php
                            if(isset($_GET['keybord'])){
                                $keybord=$_GET['keybord'];
                            }
                            else{
                                $keybord="";
                            }
                            ?>
                            <form action="search_blog.php" method="get">
                            <input type="text" name="keybord" class="form-control" maxlength="60" value="<?=$keybord?>" autocomplete="off"  placeholder="Search" />
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div>
                        <div class="as_category_widget">
                            <h3 class="as_widget_title" style="color: #AE0101;
">Categories</h3>
                            <?php
                            $select = "SELECT * FROM categories_tbl";
                            $query = mysqli_query($con, $select);
                            $rows = mysqli_num_rows($query);
                            while ($result = mysqli_fetch_assoc($query)) {
                            ?>
                                <ul>
                                    <li><a href="category_blog.php?cat_id=<?= $result['cat_id'] ?>">
                                            <?= $result['cat_name'] ?>
                                        </a></li>
                                </ul>
                            <?php
                            }
                            ?>
                        </div>


                        <div class="as_widget as_product_widget as_post_widget">
                            <h3 class="as_widget_title">Recent Posts</h3>

                            
                            <ul>
                                <?php
                                $select = "SELECT * FROM blog_des_tbl LEFT JOIN categories_tbl ON blog_des_tbl.category = categories_tbl.cat_id ORDER BY blog_des_tbl.created_at DESC LIMIT 4 ";
                                $query = mysqli_query($con, $select);
                                $rows = mysqli_num_rows($query);
                                while ($result = mysqli_fetch_assoc($query)) {
                                ?>
                                    <li class="as_product p-0">
                                        <a  href="category_blog.php?cat_id=<?= $result['cat_id'] ?>">
                                            <div class="as_productimg">
                                                <!-- <img src="admin/blog_des_files/<?= $result['image'] ?>" alt=""> -->
                                            </div>
                                            <br>
                                            <div class="as_product_detail p-0">
                                                <span style="font-size: 0.8rem;"><i class="fa-solid fa-calendar-days"></i> <?= $result['date'] ?></span>
                                                <br>
                                                <span><a  href="blog_view.php?id=<?= $result['id']?>"style="font-size: 0.9rem; font-weight:600;" ><?= strip_tags(substr( $result['heading'],0,30))?>...</a></span>
                                            </div>
                                        </a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>

                        <!-- <div class="as_widget as_faq_widget">
                                <h3 class="as_widget_title">FAQ</h3>

                                <div class="accordion as_accordion" id="accordionPanelsStayOpenExample">
                                    <div class="accordion-item">
                                      <div class="accordion-header" id="panelsStayOpen-headingOne">
                                        <h2 class="mb-0">
                                          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                            What is 'the zodiac'
                                          </button>
                                        </h2>
                                      </div>
                                  
                                      <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                      <div class="accordion-header" id="panelsStayOpen-headingTwo">
                                        <h2 class="mb-0">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            What is a Rising Sign?
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                      <div class="accordion-header" id="panelsStayOpen-headingThree">
                                        <h2 class="mb-0">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                            What is 'the house' ?
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </div>
                                      </div>
                                    </div>
                                    <div class="accordion-item">
                                      <div class="accordion-header" id="panelsStayOpen-headingFour">
                                        <h2 class="mb-0">
                                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                            What is a Ascendant?
                                          </button>
                                        </h2>
                                      </div>
                                      <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingFour">
                                        <div class="accordion-body">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </div> -->

                        <!-- <div class="as_widget as_share_widget as_share_box">
                            <h3 class="as_widget_title">Social Share</h3>

                            <ul>
                                <li><a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="19px">
                                            <path fill-rule="evenodd" d="M6.491,19.000 L6.491,10.333 L9.439,10.333 L9.881,6.956 L6.491,6.956 L6.491,4.799 C6.491,3.821 6.765,3.155 8.188,3.155 L10.000,3.154 L10.000,0.132 C9.687,0.092 8.611,-0.000 7.359,-0.000 C4.746,-0.000 2.956,1.574 2.956,4.464 L2.956,6.956 L-0.000,6.956 L-0.000,10.333 L2.956,10.333 L2.956,19.000 L6.491,19.000 Z" />
                                        </svg>
                                    </a></li>
                                <li><a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20px" height="16px">
                                            <path fill-rule="evenodd" d="M20.000,1.892 C19.257,2.213 18.464,2.426 17.637,2.530 C18.487,2.030 19.137,1.244 19.442,0.298 C18.649,0.764 17.774,1.092 16.842,1.276 C16.089,0.487 15.017,-0.002 13.847,-0.002 C11.576,-0.002 9.748,1.812 9.748,4.037 C9.748,4.357 9.776,4.664 9.843,4.957 C6.435,4.794 3.418,3.184 1.392,0.734 C1.038,1.338 0.831,2.030 0.831,2.775 C0.831,4.173 1.562,5.413 2.652,6.130 C1.993,6.118 1.347,5.930 0.800,5.633 C0.800,5.645 0.800,5.661 0.800,5.677 C0.800,7.639 2.221,9.269 4.085,9.644 C3.751,9.734 3.387,9.777 3.010,9.777 C2.747,9.777 2.482,9.763 2.233,9.708 C2.765,11.307 4.272,12.483 6.065,12.521 C4.670,13.595 2.898,14.243 0.981,14.243 C0.645,14.243 0.322,14.228 -0.000,14.187 C1.816,15.341 3.968,15.999 6.290,15.999 C13.835,15.999 17.960,9.845 17.960,4.510 C17.960,4.332 17.954,4.160 17.945,3.989 C18.759,3.420 19.442,2.709 20.000,1.892 Z" />
                                        </svg>
                                    </a></li>
                                <li><a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="17px" height="17px">
                                            <path fill-rule="evenodd" d="M16.995,16.998 L16.995,16.999 L13.477,16.999 L13.477,11.474 C13.477,10.157 13.450,8.469 11.645,8.469 C9.813,8.469 9.532,9.899 9.532,11.379 L9.532,16.998 L6.013,16.998 L6.013,5.650 L9.393,5.650 L9.393,7.197 L9.442,7.197 C9.912,6.306 11.062,5.365 12.777,5.365 C16.342,5.365 16.998,7.714 16.998,10.764 L16.998,16.998 L16.995,16.998 ZM2.041,4.102 C0.914,4.102 -0.000,3.169 -0.000,2.042 C-0.000,0.915 0.914,0.001 2.041,0.001 C3.167,0.001 4.082,0.915 4.082,2.042 C4.082,3.169 3.168,4.102 2.041,4.102 ZM3.804,16.999 L0.280,16.999 L0.280,5.650 L3.804,5.650 L3.804,16.999 Z" />
                                        </svg>
                                    </a></li>
                                <li><a href="javascript:;">
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="14px">
                                            <path fill-rule="evenodd" d="M20.107,1.349 C19.538,0.366 18.920,0.186 17.661,0.117 C16.404,0.034 13.242,-0.000 10.503,-0.000 C7.758,-0.000 4.595,0.034 3.339,0.116 C2.083,0.186 1.463,0.365 0.889,1.349 C0.302,2.330 -0.000,4.020 -0.000,6.996 C-0.000,6.999 -0.000,7.000 -0.000,7.000 C-0.000,7.003 -0.000,7.004 -0.000,7.004 L-0.000,7.006 C-0.000,9.969 0.302,11.672 0.889,12.643 C1.463,13.626 2.082,13.804 3.338,13.887 C4.595,13.958 7.758,14.000 10.503,14.000 C13.242,14.000 16.404,13.958 17.662,13.888 C18.921,13.805 19.539,13.627 20.109,12.645 C20.701,11.673 21.000,9.970 21.000,7.007 C21.000,7.007 21.000,7.004 21.000,7.001 C21.000,7.001 21.000,6.999 21.000,6.997 C21.000,4.020 20.701,2.330 20.107,1.349 ZM7.875,10.818 L7.875,3.182 L14.437,7.000 L7.875,10.818 Z" />
                                            <path fill="url(#PSgrad_0)" d="M20.107,1.349 C19.538,0.366 18.920,0.186 17.661,0.117 C16.404,0.034 13.242,-0.000 10.503,-0.000 C7.758,-0.000 4.595,0.034 3.339,0.116 C2.083,0.186 1.463,0.365 0.889,1.349 C0.302,2.330 -0.000,4.020 -0.000,6.996 C-0.000,6.999 -0.000,7.000 -0.000,7.000 C-0.000,7.003 -0.000,7.004 -0.000,7.004 L-0.000,7.006 C-0.000,9.969 0.302,11.672 0.889,12.643 C1.463,13.626 2.082,13.804 3.338,13.887 C4.595,13.958 7.758,14.000 10.503,14.000 C13.242,14.000 16.404,13.958 17.662,13.888 C18.921,13.805 19.539,13.627 20.109,12.645 C20.701,11.673 21.000,9.970 21.000,7.007 C21.000,7.007 21.000,7.004 21.000,7.001 C21.000,7.001 21.000,6.999 21.000,6.997 C21.000,4.020 20.701,2.330 20.107,1.349 ZM7.875,10.818 L7.875,3.182 L14.437,7.000 L7.875,10.818 Z" />
                                        </svg>
                                    </a></li>
                            </ul>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12">
                    <?php
                    if (isset($_SESSION['cm_msg'])) {
                        echo "<script>alert('.$_SESSION[cm_msg] .')</script>";
                        unset($_SESSION['cm_msg']);
                    }
                    ?>
                    <form action="" method="get">

                        <?php
                        $id = $_GET['cat_id'];
                        if (empty($id)) {
                            header('location:blog.php');
                        }
                        $query = "SELECT * FROM blog_des_tbl LEFT JOIN categories_tbl ON blog_des_tbl.category = categories_tbl.cat_id WHERE cat_id='$id' ORDER BY blog_des_tbl.created_at DESC ";
                        $query_run = mysqli_query($con, $query);
                        $num = mysqli_num_rows($query_run) > 0;

                        if ($num) {
                            while ($des = mysqli_fetch_assoc($query_run)) {
                        ?>
                                <div class="as_blog_box">
                                    <div class="as_blog_img">
                                        <img src="admin/blog_des_files/<?php echo $des['image'] ?>" alt="" class="img-responsive">
                                        <span class="as_btn"><?php echo $des['date'] ?></span>
                                    </div>
                                    <div class="as_blog_detail">
                                        <ul>
                                            <li><a href="javascript:;"><i class="fa-solid fa-user"></i>By -<?= $des['A_name']?>
                                                </a></li>
                                            <li><a href="#"><?= $des['cat_name'] ?></a></li>

                                        </ul>
                                        <h4 class="as_subheading"><span href="javascript:;"> <?php echo $des['heading'] ?></span></h4>
                                        <p class="as_font14 as_margin0" style="font-size:0.9rem; font-weight:500;"><?php echo strip_tags(substr($des['blog_des'], 0, 300)) ?>...</p>

                                        <div class=" btn1">
                                            <a href="blog_view.php?id=<?php echo  $des['id'] ?>" class="as_btn mt-2">Read More</a>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "no Discription";
                        }
                        ?>
                    </form>

                    <!-- <div class="as_pagination as_padderTop50">
                        <ul class="text-right">
                            <li class="as_prev"><span>prev</span></li>
                            <li class="as_active"><a href="javascript:;">1</a></li>
                            <li><a href="javascript:;">2</a></li>
                            <li><a href="javascript:;">3</a></li>
                            <li class="as_next"><a href="javascript:;">next</a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

</div>
<?php require('includes/footer.php') ?>
<?php require('includes/script.php') ?>