<?php
include('authentication.php');
require('includes/header.php');
require('includes/topbar.php');
require('includes/sidebar.php');
require('config/dbcon.php');
?>

<?php 
$sql = "SELECT * FROM categories_tbl";
$query = mysqli_query($con,$sql);
?>
<div class="content-wrapper">
    <div class="card p-2">
        <form action="blog_des_&_comment_code.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Choose Image  <span style="color:red; font-size:0.5rem;" class="p-0 m-0">(Image width=[870px],Height=[355px])</span></label>
                    <input type="file" name="img" class="form-control">
                </div>

                <div class="col-md-4">
                    <label for="">Blog title</label>
                    <input type="text" class="form-control" placeholder="Give Heading" name="heading">
                </div>

                <div class="col-md-4">
                    <label for="">Date</label>
                    <input type="date" name="date" class="form-control p-0 m-0">
                </div>
                <div class="col-md-4">
                    <label for="">Category</label>
                    <select class="form-control" name="category" class="py-2">
                        <option value="0">Select Categoty</option>
                        <?php
                        while($row = mysqli_fetch_assoc($query)){
                         ?>
                         <option value="<?= $row['cat_id'] ?>"><?= $row['cat_name']?></option>
                        <?php
                        }?>
                    </select>
                </div>

                <div class="col-md-4">
                    <label for="">Status</label>
                    <select class="form-control" name="status" class="py-2">
                        <option value="1">Active</option>
                        <option value="0">inactive</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Author Name</label>
                    <input type="text" name="name" class="form-control  m-0" placeholder="Author Name">
                </div>
                <div class="col-md-12">
                    <label for="">Add blog Description <span style="color:red; font-size:0.7rem;" class="p-0 m-0">(Note :<b>Character limit</b>-300 )</span></label>
                    <textarea name="sm_blog" class="form-control m-0" maxlength="300" cols="30" rows="3" placeholder="Type blog Description"></textarea>
                </div>
                <div class="col-md-12">
                    <label for="">Full blog Details </label>
                    <textarea name="des_msg" class="form-control m-0 textarea"   cols="30" rows="10"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-info my-2 w-100 " name="add_des">Add Blog</button>
        </form>
    </div>
</div>


<?php require('includes/footer.php'); ?>
<?php require('includes/script.php') ?>