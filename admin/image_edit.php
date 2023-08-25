<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');

?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Images Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['cm_msg'])) {
        echo "<script>alert('.$_SESSION[cm_msg] .')</script>";
        unset($_SESSION['cm_msg']);
    }
    ?>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Images</h3>
            <a href="images_tbl.php" class="btn btn-danger btn-sm float-right"> Back</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="img_video_code.php" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <?php
                            if (isset($_GET['img_id'])) {
                                $img_id = $_GET['img_id'];
                                $query = "SELECT * FROM img_tbl WHERE id ='$img_id'LIMIT 1";
                                $qurey_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($qurey_run) > 0) {
                                    foreach ($qurey_run as $row) {
                            ?>
                                        <input type="hidden" name="i_id" value=" <?php echo $row['id'] ?>">
                                        <div class="form-group">
                                            <label for="">Image</label>
                                            <img src="admin_img_upload/<?php echo $row['img_name'] ?>" alt="" width="200px" height="200px">
                                        </div>

                                        <div class="form-group">
                                            <label for="">New Image</label>
                                            <input type="file" name="new_img" class="form-control">
                                            <input type="hidden" name="old_img" value="<?= $row['img_name']?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select name="status" class="form-control"  required>
                                                <option value="1"
                                                <?php
                                                if($row['status']==1){
                                                    echo"selected";
                                                }
                                                ?>
                                                >Active</option>
                                                <option value="0"
                                                <?php
                                                if($row['status']==0){
                                                    echo"selected";
                                                }
                                                ?>
                                                >Inactive</option>
                                            </select>
                                        </div>
                            <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update_img" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>