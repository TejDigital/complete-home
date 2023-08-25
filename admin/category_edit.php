<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper">
    <div class="container">
        <div class="row">
            <form action="category_code.php" method="post">
            <?php
                        if (isset($_SESSION['cm_msg'])) {
                            echo "<script>alert('.$_SESSION[cm_msg] .')</script>";
                            unset($_SESSION['cm_msg']);
                        }
                        ?>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM categories_tbl WHERE cat_id='$id' LIMIT 1";
                    $query = mysqli_query($con, $sql);
                    if (mysqli_num_rows($query) > 0) {
                        foreach ($query as $row) {
                ?>
                            <div class="col-md-12">
                                <label for="">Add Category Name</label>
                                <input type="hidden" name="id" value="<?= $row['cat_id'] ?>">
                                <input class="form-control  m-0" type="text" value="<?= $row['cat_name']?>" name="cat_upl" placeholder="enter category">
                                <select class="form-control mt-2" class="py-2 w-100" name="status">
                                        <option value="1" <?php

                                                            if ($row['cat_status'] == 1) {
                                                                echo "Selected";
                                                            }

                                                            ?>>Active</option>
                                        <option value="0" <?php

                                                            if ($row['cat_status'] == 0) {
                                                                echo "Selected";
                                                            }

                                                            ?>>inactive</option>
                                    </select>
                                <button type="submit" class="btn btn-info my-2 w-100 " name="update">Update</button>
                            </div>
                <?php
                        }
                    }
                }
                ?>
            </form>
        </div>
    </div>
</div>
<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>