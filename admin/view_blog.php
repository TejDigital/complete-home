<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>
<div class="content-wrapper">
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
                    <h1 class="m-0 text-dark">Blog Description</h1>
                </div><!-- /.col -->
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
                        <?php
                        if (isset($_SESSION['cm_msg'])) {
                            echo "<script>alert('.$_SESSION[cm_msg] .')</script>";
                            unset($_SESSION['cm_msg']);
                        }

                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM blog_des_tbl WHERE id ='$id'";
                            $run_sql = mysqli_query($con,$sql);
                            $data1 = mysqli_fetch_assoc($run_sql);
                        }
                        ?>
                        <div class="card-header">
                            <h3 class="card-title">Blog Description Table</h3>
                            <!-- <input type="search" class="float-right input-group-text mx-2" placeholder="Search By Name"> -->
                            <a href="blog_des.php" class=" float-right btn btn-danger ">Back</a>
                        </div>
                        <div class="card-body ">
                        <div class="row">
                                <div class="col-md-6">
                                    <label for="">Attached File</label>
                                   <h6> <a target="_blank" href="blog_des_files/<?php echo $data1['image'] ?>">Click View</a></h6>

                                    <label for="">Title</label>
                                    <h6><?php echo $data1['heading'] ?></h6>

                                    <label for="">Status</label>
                                    <h6><?php 
                                    if($data1['status'] ==1 ){
                                        echo"Active";
                                    }
                                    else{
                                        echo"Inactive";
                                    }
                                    ?>
                                </h6>

                                </div>
                                <div class="col-md-6">
                                    <label for="">Date</label>
                                    <h6><?php echo $data1['date'] ?></h6>

                                    <label for="">Category</label>
                                    <?php
                                    $sql1 = "SELECT * FROM categories_tbl";
                                            $query2 = mysqli_query($con, $sql1);
                                            if (mysqli_num_rows($query2)) {
                                                while( $result = mysqli_fetch_assoc($query2)){
                                                   if($result['cat_id']==$data1['category']){
                                            ?>
                                                    <h6><?=$result['cat_name']?></h6>
                                            <?php
                                                }
                                                }
                                                }
                                            ?>
                                </div>
                                <div class="col-md-12">
                                    <label for="">Description</label>
                                    <textarea name="" class="form-control" cols="30" rows="4" readonly><?php echo $data1['blog_des']?></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="">Full Blog</label>
                                    <textarea name="" class="form-control" cols="30" rows="10" readonly><?php echo $data1['des_msg']?></textarea>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>