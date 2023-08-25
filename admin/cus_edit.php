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
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Registered</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Update User</h3>
            <a href="index.php" class="btn btn-danger btn-sm float-right"> Back</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="connect.php" method="POST">
                        <div class="modal-body">
                            <?php
                                if (isset($_GET['cus_id'])) {
                                    $user_id = $_GET['cus_id'];
                                    $query = "SELECT * FROM contact WHERE id ='$user_id'LIMIT 1";
                                    $qurey_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($qurey_run) > 0) {
                                        foreach ($qurey_run as $row) {
                            ?>
                                        <input type="hidden" name="id" value=" <?php echo $row['id'] ?>">
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name" value="<?php echo $row['name'] ?>" class="form-control" placeholder="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Phone No.</label>
                                            <input type="text" name="number" value="<?php echo $row['phone'] ?>" class="form-control" placeholder="Phone no">
                                        </div>
                                        <!-- <div class="form-group">
                                            <label for="">message</label>
                                            <input type="text" name="message" value="<?php echo $row['message'] ?>" class="form-control" placeholder="message">
                                        </div> -->
                                       
                            <?php
                                    }
                                } else {
                                    echo "No Record Found";
                                }
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="update_cus" class="btn btn-primary">Update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require('includes/script.php'); ?>
    <?php require('includes/footer.php'); ?>