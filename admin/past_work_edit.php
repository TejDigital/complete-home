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
       <?php
    if (isset($_SESSION['cm_msg'])) {
        echo "<script>alert('.$_SESSION[cm_msg] .')</script>";
        unset($_SESSION['cm_msg']);
    }
    ?>
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="text-dark">Past Work</h4>
                    <form action="past_work_code.php" method="post" enctype="multipart/form-data">
                        <?php
                        if(isset($_GET['p_id'])){
                        $id = $_GET['p_id'];
                        $sql = "SELECT * FROM past_works_tbl WHERE id ='$id'" ;
                        $query = mysqli_query($con,$sql); 
                        $row = mysqli_fetch_assoc($query);
                        }
                        ?>
                        <div class="row">
                            <input type="hidden" name="past_id" value="<?=$row['id']?>">
                            <div class="col-md-6">
                                
                                <label for="">Choose Image</label><span class="p-0 m-0 ml-2 text-primary">Current Image name <span class="text-success"><?=$row['image']?></span></span>
                                <input type="file" accept=".jpg, .jpeg, .png" name="new_img"  class="form-control">
                                <input type="hidden" name="old_img" value="<?= $row['image']?>">
                            </div>

                            <div class="col-md-6">
                                <label for="">Name</label>
                                <input type="text" value="<?= $row['name'] ?>"  class="form-control" placeholder="Work Name" name="w_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <select class="form-control" name="status" class="py-2">
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
                                    >inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Location</label>
                                <input type="text" class="form-control" value="<?= $row['location']?>" placeholder="Add Location" name="location">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info my-2 w-100 " name="new_work">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>