<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');

$ids = $_GET['cus_id'];

$sql = "SELECT * from  contact where id ='$ids'";

$result = mysqli_query($con, $sql);

$data1 = mysqli_fetch_assoc($result);

?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- <div class="card-header" id="Hotel_bill" style="display:none;">
                        <h1 style="text-align:center; font-size:2rem; " >Hotel Bill</h1>
                        </div> -->
                        <div class="card-header " id="back_btn">
                            Person Detail
                            <a href="index.php" id="back_btn" class="btn btn-danger float-right">Back</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Attached File</label>
                                    <h6> <a href="upload/<?php echo $data1['pdf_file'] ?>">Click View</a></h6>

                                    <label for="">Name</label>
                                    <h6><?php echo $data1['name'] ?></h6>

                                    <label for="">Phone</label>
                                    <h6><?php echo $data1['phone'] ?></h6>

                                </div>
                                <div class="col-md-6">
                                    <label for="">Email</label>
                                    <h6><?php echo $data1['email'] ?></h6>

                                    <label for="">Messages</label>
                                    <h6><?php echo $data1['message'] ?></h6>

                                </div>
                                <!-- <div class="print_btn" id="print_btn">
                                    <input type="button"  value="Print" onclick="pri()">
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- <script>
    function pri(){
        document.getElementById('back_btn').style.display ="none";
        document.getElementById('footer').style.display ="none";
        document.getElementById('Hotel_bill').style.display ="block";
        document.getElementById('print_btn').style.display ="none";
        window.print();
    }
</script> -->
<?php require('includes/script.php'); ?>
<?php require('includes/footer.php'); ?>