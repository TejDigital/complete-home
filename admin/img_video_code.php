<!-- **********************for-Images-upload*************************** -->
<?php
include('authentication.php');
require('config/dbcon.php');

if (isset($_POST['img_upload'])) {

    $img = $_FILES['img_upl']['name'];
    $status = $_POST['status'];


    if ($_FILES['img_upl']["size"] > 500000) {
        $_SESSION['cm_msg'] = " image size is to Big";
        header('location:images_tbl.php');
    }
    $img_ext = ['png', 'jpg', 'jpeg'];

    $file_ext = pathinfo($img, PATHINFO_EXTENSION);

    $img_name = $img;

    if (!in_array($file_ext, $img_ext)) {

        $_SESSION['cm_msg'] = "img only in jpg  or jpeg ext";
        header('location:images_tbl.php');
    } else {

        $sql = "INSERT INTO img_tbl(img_name,status) VALUES('$img_name','$status')";

        $connect_db = mysqli_query($con, $sql);

        if ($connect_db) {
            move_uploaded_file($_FILES['img_upl']['tmp_name'], 'admin_img_upload/' . $img_name);

            $_SESSION['cm_msg'] = "image uploaded  Successfully.";
            header('location:images_tbl.php');
        } else {

            $_SESSION['cm_msg'] = "Somthing went wrong";
            header('location:images_tbl.php');
        }
    }
};
// --------------------------------------------delete-images---------------------------------

if (isset($_POST['delete_img'])) {

    $user_id = $_POST['delete_img_id'];

    $query_delete = " DELETE FROM img_tbl WHERE  id ='$user_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cm_msg'] = "Image deleted";
        header('location:images_tbl.php');
    } else {
        $_SESSION['cm_msg'] = "Image deletion failed";
        header('location:images_tbl.php');
    }
}


// ----------------------------------------------UPDATE-image--------------------------------------

if (isset($_POST['update_img'])) {

    $id = $_POST['i_id'];

    $new_img = $_FILES['new_img']['name'];
    $status = $_POST['status'];
    $old_img = $_POST['old_img'];

    if ($new_img != '') {
        if ($_FILES['img_new']["size"] > 700000) {
            $_SESSION['cm_msg'] = " image size is to Big";
            header('location:image_edit.php');
        }
        $img_ext = ['png', 'jpg', 'jpeg'];

        $file_ext = pathinfo($new_img, PATHINFO_EXTENSION);


        if (!in_array($file_ext, $img_ext)) {
            $_SESSION['cm_msg'] = "img only in jpg ,png or jpeg ext";
            header('location:image_edit.php');
        }

        $updated_img = $new_img;
    } else {
        $updated_img = $old_img;
    }

    $sql = "UPDATE img_tbl SET status='$status',img_name='$updated_img' WHERE id='$id'";

    $connect_db = mysqli_query($con, $sql);

    if ($connect_db) {
        if ($_FILES['new_img']['name'] != "") {
            move_uploaded_file($_FILES['new_img']['tmp_name'], 'admin_img_upload/' . $_FILES['new_img']['name']);
            unlink("admin_img_upload/" . $old_img);
        }

        $_SESSION['cm_msg'] = "image Updated";
        header('location:images_tbl.php');
    } else {

        $_SESSION['cm_msg'] = "Somthing went wrong";
        header('location:images_tbl.php');
    }
};





// *******************************************************for-videos-upload***********************************************************


// if (isset($_POST['vi_upload'])) {

//     $video = $_FILES['video_upl']['name'];


//     if ($_FILES['video_upl']["size"] > 500000000) {
//         $_SESSION['cm_msg'] = " image size is to Big";
//         header('location:videos_tbl.php');
//     }
//     echo $_FILES['video_upl']["size"];
//     $video_ext = ['mp4', 'mov', 'wmv','mkv','avi','avchd'];

//     $file_ext = pathinfo($video, PATHINFO_EXTENSION);

//     $video_name = time() . '.' . $file_ext;

//     if (!in_array($file_ext, $video_ext)) {

//         $_SESSION['cm_msg'] = "img only in MP4,MOV,WMV,AVI,AVCHD or MKV ext";
//         header('location:videos_tbl.php');
//     } else {

//         $sql = "INSERT INTO video_tbl(video_name) VALUES('$video_name')";

//         $connect_db = mysqli_query($con, $sql);

//         if ($connect_db) {
//             move_uploaded_file($_FILES['video_upl']['tmp_name'], 'admin_video_upload/'.$video_name);

//             $_SESSION['cm_msg'] = "video uploaded  Successfully.";
//             header('location:videos_tbl.php');
//         } else {

//             $_SESSION['cm_msg'] = "Somthing went wrong";
//             header('location:videos_tbl.php');
//         }
//     }
// };

if (isset($_POST['vi_upload'])) {

    $video = $_POST['video_upl'];
    $status = $_POST['status'];
    // $convertUrl = str_replace("watch?v=","embed/",$video);

    $sql = "INSERT INTO video_tbl(video_name,status) VALUES('$video','$status')";

    $connect_db = mysqli_query($con, $sql);

    if ($connect_db) {

        $_SESSION['cm_msg'] = "video uploaded  Successfully.";
        header('location:videos_tbl.php');
    } else {

        $_SESSION['cm_msg'] = "Somthing went wrong";
        header('location:videos_tbl.php');
    }
}
////////////////////////////video_update////////////////////////
if (isset($_POST['vid_upd'])) {
    $id = $_POST['v_id'];
    $video_url  = $_POST['video_upl'];
    $status = $_POST['status'];

    $sql = "UPDATE video_tbl SET status='$status',video_name='$video_url' WHERE id ='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {

        $_SESSION['cm_msg'] = "video uploaded  Successfully.";
        header('location:videos_tbl.php');
    } else {
        $_SESSION['cm_msg'] = "Somthing went wrong";
        header('location:video_gallery_edit.php');
    }
}


// --------------------------------------------delete-video---------------------------------

if (isset($_POST['delete_video'])) {

    $video_id = $_POST['delete_video_id'];

    $query_delete = " DELETE FROM video_tbl WHERE  id ='$video_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cm_msg'] = "Videdo deleted";
        header('location:videos_tbl.php');
    } else {
        $_SESSION['cm_msg'] = "Video deletion failed";
        header('location:videos_tbl.php');
    }
}










// +++++++++++++++++++++++++++Thumbnail_video_Home_Page+++++++++++++++++++++++++++++

if (isset($_POST['home_vi_upload'])) {

    $video = $_POST['home_video'];
    $status = $_POST['status'];
    // $convertUrl = str_replace("watch?v=","embed/",$video);

    $sql = "INSERT INTO home_video_tbl(video_url,status) VALUES('$video','$status')";

    $connect_db = mysqli_query($con, $sql);

    if ($connect_db) {

        $_SESSION['cm_msg'] = "video uploaded  Successfully.";
        header('location:video_page.php');
    } else {

        $_SESSION['cm_msg'] = "Somthing went wrong";
        header('location:video_page.php');
    }
}

// =============================home_video_update=======================

if (isset($_POST['home_vid_up'])) {

    $id = $_POST['home_v_id'];
    $video_url  = $_POST['home_video'];
    $status = $_POST['status'];

    $sql = "UPDATE home_video_tbl SET status='$status',video_url='$video_url' WHERE vi_id ='$id'";
    $query = mysqli_query($con, $sql);
    if ($query) {

        $_SESSION['cm_msg'] = "video uploaded  Successfully.";
        header('location:video_page.php');
    } else {
        $_SESSION['cm_msg'] = "Somthing went wrong";
        header('location:video_home_edit.php');
    }
}

// __________delete_home_video_______________
if (isset($_POST['delete_home_video'])) {

    $video_id = $_POST['delete_home_video_id'];

    $query_delete = " DELETE FROM home_video_tbl WHERE  id ='$video_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cm_msg'] = "Videdo deleted";
        header('location:video__page.php');
    } else {
        $_SESSION['cm_msg'] = "Video deletion failed";
        header('location:video__page.php');
    }
}

?>