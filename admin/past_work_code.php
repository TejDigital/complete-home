<?php include('authentication.php');

require('config/dbcon.php'); ?>

<?php
if (isset($_POST['upl_work'])) {

    $wname = $_POST['w_name'];
    $location = $_POST['location'];
    $status = $_POST['status'];
    $img = $_FILES['img']['name'];


    if ($_FILES['img']["size"] > 1000000) {
        $_SESSION['cm_msg'] = " image size is to Big";
        header('location:past_work.php');
    }
    $img_ext = ['png', 'jpg', 'jpeg'];

    $file_ext = pathinfo($img, PATHINFO_EXTENSION);

    $img_name = $img;


    if (!in_array($file_ext, $img_ext)) {

        $_SESSION['cm_msg'] = "img only in jpg ,png or jpeg ext";
        header('location:past_work.php');
    } else {


        $sql = "INSERT INTO past_works_tbl(status,name,location,image) VALUES('$status','$wname','$location','$img_name')";

        $connect_db = mysqli_query($con, $sql);

        if ($connect_db) {
            move_uploaded_file($_FILES['img']['tmp_name'], 'past_work_imgs/' . $img_name);

            $_SESSION['cm_msg'] = "work Added";
            header('location:past_work.php');
        } else {

            $_SESSION['cm_msg'] = "Somthing went wrong";
            header('location:past_work.php');
        }
    }
};

// ---------------------------------Update_image--------------------------------
// if (isset($_POST['new_work'])) {

//     $id = $_POST['past_id'];
//     $status = $_POST['status'];
//     $w_name = $_POST['w_name'];
//     $location = $_POST['location'];

//     $new_img = $_FILES['new_img']['name'];
//     $old_img = $_POST['old_img'];

//     $vailid = 1;

//     if ($new_img != '') {
//         if ($_FILES['img_new']["size"] > 700000) {
//             $_SESSION['cm_msg'] = " image size is to Big";
//             $vailid = 0;
//         }
//         if ($vailid == 0) {
//             $_SESSION['cm_msg'] = " image size is to Big";
//             header('location:past_work_edit.php');
//         } else {

//             $data = false;

//             if (!empty($new_img)) {
//                 if (!empty($new_img)) {
//                     $updated_img = $new_img;
//                     move_uploaded_file($_FILES['new_img']['tmp_name'], 'past_work_imgs/' . $new_img);
//                     unlink("past_work_imgs/" . $old_img);
//                 }
//                 $data = true;
//             }

//             if ($data == true) {
//                 $sql = "UPDATE past_works_tbl SET status='$status',image='$updated_img',location='$location',name='$w_name' WHERE id='$id'";

//                 $connect_db = mysqli_query($con, $sql);

//                 if ($connect_db) {
//                     $_SESSION['cm_msg'] = "dataile Updated";
//                     header('location:past_work.php');
//                 } else {
//                     $_SESSION['cm_msg'] = "Somthing went wrong";
//                     header('location:past_work_edit.php');
//                 }
//             } else {
//                 $sql = "UPDATE past_works_tbl SET status='$status',location='$location',name='$w_name' WHERE id='$id'";

//                 $connect_db = mysqli_query($con, $sql);

//                 if ($connect_db) {
//                     $_SESSION['cm_msg'] = "dataile Updated";
//                     header('location:past_work.php');
//                 } else {
//                     $_SESSION['cm_msg'] = "Somthing went wrong";
//                     header('location:past_work_edit.php');
//                 }
//             }
//         }
//     }
// };


if (isset($_POST['new_work'])) {

    $id = $_POST['past_id'];
    $status = $_POST['status'];
    $w_name = $_POST['w_name'];
    $location = $_POST['location'];

    $new_img = $_FILES['new_img']['name'];
    $old_img = $_POST['old_img'];

    // print_r($_POST);


    if ($new_img != '') {
        if ($_FILES['img_new']["size"] > 700000) {
            $_SESSION['cm_msg'] = " image size is to Big";
            header('location:gallery_edit.php');
        }
        echo $_FILES['img_new']["size"];
        $img_ext = ['png', 'jpg', 'jpeg'];

        $file_ext = pathinfo($new_img, PATHINFO_EXTENSION);


        if (!in_array($file_ext, $img_ext)) {
            $_SESSION['cm_msg'] = "img only in jpg ,png or jpeg ext";
            header('location:past_work_edit.php');
        }

        $updated_img = $new_img;
    } else {
        $updated_img = $old_img;
    }

    $sql = "UPDATE past_works_tbl SET status='$status',image='$updated_img',location='$location',name='$w_name' WHERE id='$id'";

    $connect_db = mysqli_query($con, $sql);

    if ($connect_db) {
        if ($_FILES['new_img']['name'] != "") {
            move_uploaded_file($_FILES['new_img']['tmp_name'], 'past_work_imgs/' . $_FILES['new_img']['name']);
            unlink("past_work_imgs/" . $old_img);

          
        }
        $_SESSION['cm_msg'] = "work Updated";
        header('location:past_work.php');
       
    } else {

        $_SESSION['cm_msg'] = "Somthing went wrong";
        header('location:past_work_edit.php');
    }
};

// --------------------------------------------delete-description---------------------------------

if (isset($_POST['delete_work'])) {

    $work_id = $_POST['delete_work_id'];

    $query_delete = " DELETE FROM past_works_tbl WHERE  id ='$work_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cm_msg'] = "work deleted";
        header('location:past_work.php');
    } else {
        $_SESSION['cm_msg'] = "work deletion failed";
        header('location:past_work.php');
    }
}

?>