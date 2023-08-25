<?php
include('authentication.php');
require('config/dbcon.php');

if(isset($_POST['add'])){

    $cat1 = $_POST['cat_upl'];

    $sql1= "SELECT * FROM categories_tbl WHERE cat_name='{$cat1}'";
    
    $query1 = mysqli_query($con,$sql1);

    $row1 = mysqli_num_rows($query1);

    if($row1){
        $_SESSION['cm_msg']= "category already exist";
        header('location:category.php');
    }

    else{

    $cat = $_POST['cat_upl'];
    $status = $_POST['status'];

    $query = "INSERT INTO categories_tbl(cat_name,cat_status)VALUE('$cat',$status)";
    $sql = mysqli_query($con,$query);

    if($sql){
        $_SESSION['cm_msg']= "category added";
        header('location:category.php');
    }
    else{
        $_SESSION['cm_msg']= "Failed";
        header('location:category.php');
    }
}
}


// -----------------delete------------------------
if (isset($_POST['delete_cat'])) {

    $id = $_POST['delete_cat_id'];

    $query_delete = " DELETE FROM categories_tbl WHERE  cat_id ='$id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cm_msg'] = "Category deleted";
        header('location:category.php');
    } else {
        $_SESSION['cm_msg'] = "Category deletion failed";
        header('location:category.php');
    }
}


// --------------------------------------------update-----------------------

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $cat_name = $_POST['cat_upl'];
    $status = $_POST['status'];

    $sql = "UPDATE categories_tbl SET cat_name='$cat_name',cat_status='$status' WHERE cat_id = '$id'";
    $query =mysqli_query($con,$sql);
    if($query){
        $_SESSION['cm_msg'] = "Category Updated";
        header('location:category.php');
    }
    else{
        $_SESSION['cm_msg'] = "Category update failed";
        header('location:category.php');
    }
}
?>