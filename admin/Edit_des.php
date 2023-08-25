<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper">
    <?php
    if (isset($_SESSION['cm_msg'])) {
        echo "<script>alert('.$_SESSION[cm_msg] .')</script>";
        unset($_SESSION['cm_msg']);
    }
    ?>
    <div class="card">
        <div class="card-title">
            <h3>Edit Blog</h3>
        </div>
        <div class="card-body">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = "SELECT * FROM blog_des_tbl WHERE id ='$id'LIMIT 1";
                $qurey_run = mysqli_query($con, $query);
                if (mysqli_num_rows($qurey_run) > 0) {
                    foreach ($qurey_run as $row) {
            ?>
                        <form action="blog_des_&_comment_code.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                    <div class="col-md-12">
                                        <img src="./blog_des_files/<?php echo $row['image'] ?>" alt="" width="200px" height="150px">
                                        <br>
                                        <label for="">New Image <span style="color:red; font-size:0.5rem;" class="p-0 m-0">(Image width=[870px],Height=[355px])</span></label>
                                        <input type="file" class="form-control" name="new_img">
                                        <input type="hidden" class="form-control" name="img" value="<?php echo $row['image'] ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" value="<?php echo $row['heading'] ?>" name="heading">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="">Date</label>
                                        <input type="date" class="form-control" value="<?php echo $row['date'] ?>" name="date">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="">Status</label>
                                        <select class="form-control" name="status" class="py-2" value="<?php echo $row['status'] ?>" name="status">
                                            <option value="1" <?php

                                                                if ($row['status'] == 1) {
                                                                    echo "Selected";
                                                                }

                                                                ?>>Active</option>
                                            <option value="0" <?php

                                                                if ($row['status'] == 0) {
                                                                    echo "Selected";
                                                                }

                                                                ?>>inactive</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Category</label>
                                        <select class="form-control" name="category" class="py-2" >
                                        <?php
                                            $sql1 = "SELECT * FROM categories_tbl";
                                            $query2 = mysqli_query($con, $sql1);
                                            if (mysqli_num_rows($query2)) {
                                                while ($result = mysqli_fetch_assoc($query2)) {
                                            ?>
                                                    <option value="<?= $result['cat_id']?>" <?php
                                                                        if ($row['category'] == $result['cat_id']) {
                                                                            echo "Selected";
                                                                        }
                                                                        ?>
                                                    ><?=$result['cat_name']?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Author Name</label>
                                        <input type="text" name="name" class="form-control  m-0" value="<?= $row['A_name']?>" placeholder="Author Name">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="">Description</label>
                                        <textarea class="form-control p-0 m-0" name="sm_blog" cols="30" maxlength="300" rows="3" placeholder="Type Description"><?php echo $row['blog_des'] ?></textarea>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="">Full Blog</label>
                                        <textarea class="form-control p-0 m-0 textarea" name="des_msg" cols="30" rows="5" placeholder="Type Description"><?php echo $row['des_msg'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="upd_blog" class="btn btn-primary">UPDATE</button>
                <?php
                    }
                } else {
                    echo "No Record Found";
                }
            }
                ?>
                        </form>
        </div>
    </div>
</div>

<?php require('includes/footer.php'); ?>
<?php require('includes/script.php'); ?>