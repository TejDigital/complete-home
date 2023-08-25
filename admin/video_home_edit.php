<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper" style="overflow-x: hidden;">
    <?php
    if (isset($_SESSION['alert_msg'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['alert_msg'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['alert_msg']);
    }
    ?>
    <?php
    if (isset($_SESSION['auth_msg'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?php echo $_SESSION['auth_msg'] ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['auth_msg']);
    }
    ?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Home Page Video Update </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Complete Home</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark">Upload Video</h4>
                            <form action="img_video_code.php" method="post" enctype="multipart/form-data">
                            <?php
                                if (isset($_GET['h_vid_id'])) {
                                    $id = $_GET['h_vid_id'];
                                    $sql = "SELECT * FROM home_video_tbl WHERE vi_id ='$id' ";
                                    $query = mysqli_query($con, $sql);
                                    $data = mysqli_fetch_assoc($query);
                                }
                                ?>
                                <input type="hidden" name="home_v_id" value="<?= $data['vi_id'] ?>">

                                <label for="">Choose Video For Home Page</label><span class="text-success ml-3">Current Video Url : <span class="text-danger"><?= $data['video_url'] ?></span> </span>
                                <br>
                                <input class="form-control  m-0" type="url" name="home_video" placeholder="enter video url">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" class="py-2">
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select>
                                <button type="submit" class="btn btn-primary my-2 w-100 " name="home_vid_up">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>