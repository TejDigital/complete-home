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
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-dark">Update Video</h4>
                            <form action="img_video_code.php" method="post" enctype="multipart/form-data">
                                <?php
                                if (isset($_GET['vid_id'])) {
                                    $id = $_GET['vid_id'];
                                    $sql = "SELECT * FROM video_tbl WHERE id ='$id'";
                                    $query = mysqli_query($con, $sql);
                                    $data = mysqli_fetch_assoc($query);
                                }
                                ?>
                                <input type="hidden" name="v_id" value="<?= $data['id'] ?>">

                                <label for="">Choose Video</label><span class="text-success ml-3">Current Video Url : <span class="text-danger"><?= $data['video_name'] ?></span> </span>
                                <br>

                                <input class="form-control  m-0" type="url" placeholder="enter new video url" name="video_upl">
                                
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" class="py-2">
                                    <option value="1" <?php
                                                        if ($data['status'] == 1) {
                                                            echo "selected";
                                                        }
                                                        ?>>active</option>
                                    <option value="0" <?php
                                                        if ($data['status'] == 0) {
                                                            echo "selected";
                                                        }
                                                        ?>>inactive</option>
                                </select>
                                <button type="submit" class="btn btn-info my-2 w-100 " name="vid_upd">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>