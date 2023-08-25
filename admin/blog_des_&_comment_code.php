<?php
include('authentication.php');
require('config/dbcon.php');

// if(isset($_POST['send'])){

//     $comment = $_POST['comment'];

//     $sql = "INSERT INTO blog_comment_tbl(comments) VALUES('$comment')";

//     $sql_run = mysqli_query($con,$sql);

//     if($sql_run){
//         $_SESSION['cm_msg'] ="Thankyou";
//         header('location:../blog_view.php');
//     }
//     else{
//         $_SESSION['cm_msg'] ="Somthing went roung";
//         header('location:../blog_view.php');
//     }

// }
if (isset($_POST['add_des'])) {

    $heading = $_POST['heading'];
    $date = $_POST['date'];
    $A_name = $_POST['name'];
    $des_msg = $_POST['des_msg'];
    $des_msg = str_replace("'","\'","$des_msg");
    $sm_blog = $_POST['sm_blog'];
    $sm_blog = str_replace("'","\'",$sm_blog);
    $status = $_POST['status'];
    $category = $_POST['category'];
    $img = $_FILES['img']['name'];



    if ($_FILES['img']["size"] > 500000) {
        $_SESSION['cm_msg'] = " image size is to Big";
        header('location:blog_des.php');
    }
    $img_ext = ['png', 'jpg', 'jpeg'];

    $file_ext = pathinfo($img, PATHINFO_EXTENSION);

    $img_name = time() . '.' . $file_ext;


    if (!in_array($file_ext, $img_ext)) {

        $_SESSION['cm_msg'] = "img only in jpg ,png or jpeg ext";
        header('location:blog_des.php');
    } else {

        $sql = "INSERT INTO blog_des_tbl(heading,category,A_name,blog_des,des_msg,date,status,image)VALUES('$heading','$category','$A_name','$sm_blog','$des_msg','$date','$status','$img_name')";
        // echo $sql;
        $connect_db = mysqli_query($con, $sql);
        if ($connect_db) {
            move_uploaded_file($_FILES['img']['tmp_name'], 'blog_des_files/' . $img_name);

            $_SESSION['cm_msg'] = "Blog Added";
            header('location:blog_des.php');
        } else {

            $_SESSION['cm_msg'] = "Somthing went wrong";
            header('location:blog_des.php');
        }
    }
};
// --------------------------------------------delete-description---------------------------------

if (isset($_POST['delete_des'])) {

    $des_id = $_POST['delete_des_id'];

    $query_delete = " DELETE FROM blog_des_tbl WHERE  id ='$des_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cm_msg'] = "Blog deleted";
        header('location:blog_des.php');
    } else {
        $_SESSION['cm_msg'] = "Des... deletion failed";
        header('location:blog_des.php');
    }
}


// -------------------------update---------------------------

if (isset($_POST['upd_blog'])) {

    $id = $_POST['id'];
    $heading = $_POST['heading'];
    $date = $_POST['date'];
    $A_name = $_POST['name'];
    $des_msg = $_POST['des_msg'];
    $des_msg = str_replace("'","\'","$des_msg");
    $sm_blog = $_POST['sm_blog'];
    $sm_blog = str_replace("'","\'",$sm_blog);
    $status = $_POST['status'];
    $category = $_POST['category'];
    $new_img = $_FILES['new_img']['name'];
    $old_img = $_POST['img'];

    if ($new_img != '') {
        $updated_img = $_FILES['new_img']['name'];
        if ($_FILES['new_img']["size"] > 500000) {
            $_SESSION['cm_msg'] = " image size is to Big";
            header('location:blog_des.php');
        }
        $img_ext = ['png', 'jpg', 'jpeg'];
    
        $file_ext = pathinfo($updated_img, PATHINFO_EXTENSION);
    
        $img_name = time() . '.' . $file_ext;
    
    
        if (!in_array($file_ext, $img_ext)) {
    
            $_SESSION['cm_msg'] = "img only in jpg ,png or jpeg ext";
            header('location:blog_des.php');
        } 
        $updated_img = $img_name;

    } else {
        $updated_img = $old_img;
    }

        $sql = "UPDATE blog_des_tbl SET heading='$heading',blog_des='$sm_blog',des_msg='$des_msg',date='$date',category='$category',A_name='$A_name',status='$status',image='$updated_img' WHERE id='$id'";

        $connect_db = mysqli_query($con, $sql);

        if ($connect_db) {
            if($new_img != ''){
            move_uploaded_file($_FILES['new_img']['tmp_name'], 'blog_des_files/' . $img_name);
            }
            $_SESSION['cm_msg'] = "Blog Updated";
            header('location:blog_des.php');
        } else {

            $_SESSION['cm_msg'] = "Somthing went wrong";
            header('location:blog_des.php');
        }
    
};
