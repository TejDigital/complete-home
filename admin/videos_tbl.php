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
                    <h1 class="m-0 text-dark"></h1>
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
    <!-- --------------------------------Video_upload------------------- -->

    <!-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <form action="">
                            <label for="">Choose Video</label>
                            <br>
                            <input type="file">
                            <button type="submit" class="btn btn-info" name="upload">Upload</button>
                        </form>
                    </ol>
                </div>
            </div>
        </div> -->

    <div class="modal fade" id="delete_video_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete VIDEO</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="img_video_code.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="delete_video_id" class="delete_video_id">
                        <p>Are you sure , you want to delete this data ?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="delete_video" class="btn btn-danger">Yes,Delete.!</button>
                    </div>
                </form>
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
                                <label for="">Choose Video</label>
                                <br>
                                <input class="form-control  m-0" type="url" name="video_upl" placeholder="enter video url">
                                <label for="">Status</label>
                                <select class="form-control" name="status" id="" class="py-2">
                                    <option value="1">active</option>
                                    <option value="0">inactive</option>
                                </select>
                                <button type="submit" class="btn btn-info my-2 w-100 " name="vi_upload">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <?php
                if (isset($_SESSION['cm_msg'])) {
                    echo "<script>alert('.$_SESSION[cm_msg] .')</script>";
                    unset($_SESSION['cm_msg']);
                }
                ?>
                <div class="card-header">
                    <h3 class="card-title">Videos Table</h3>
                    <!-- <input type="search" class="float-right input-group-text mx-2" placeholder="Search By Name"> -->
                </div>
                <div class="card-body ">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No.</th>
                                <th>Video_url</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM video_tbl order by created_at desc limit 6";
                            $db_query_connect = mysqli_query($con, $query);
                            $count = 1;
                            if (mysqli_num_rows($db_query_connect) > 0) {
                                foreach ($db_query_connect as $filds) {
                            ?>
                                    </tr>
                                    <td><?= $count++?></td>
                                    <td><?= $filds['video_name'] ?></td>
                                    <td>
                                        <?php
                                        if ($filds['status'] == "1") {
                                            echo "Active";
                                        } elseif ($filds['status'] == "0") {
                                            echo "inactive";
                                        } else {
                                            echo "invailid";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a href=video_gallery_edit.php?vid_id=<?php echo $filds['id']; ?> class='btn btn-info btn-sm '>Edit</a>
                                        <button type='button' value=<?php echo $filds['id']; ?> class='btn btn-danger delete_video btn-sm my-1'>Delete</button>
                                        <!-- <a href=cus_details.php?cus_id=<?php echo $filds['id']; ?> class='btn btn-info btn-sm'> View</a> -->
                                    </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<?php require('includes/script.php'); ?>
<script>
    // -----------------------delete------------------------
    $(document).ready(function() {
        $('.delete_video').click(function(e) {
            e.preventDefault();
            var user_id = $(this).val();
            // console.log(user_id);
            $('.delete_video_id').val(user_id);
            $('#delete_video_modal').modal('show');
        });
    });
</script>
<?php require('includes/footer.php'); ?>