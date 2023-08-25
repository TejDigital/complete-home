<?php
session_start();
require('config/dbcon.php');
// include('authentication.php');


if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];
    $img = $_FILES['files']['name'];


    if ($_FILES['files']["size"] > 500000) {
        $_SESSION['cm_msg'] = " image size is to Big";
        header('location:../contact.php');
    }
    echo $_FILES['files']["size"];
    $img_ext = ['png', 'jpg', 'jpeg','pdf'];

    $file_ext = pathinfo($img, PATHINFO_EXTENSION);

    $img_name = time() . '.' . $file_ext;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['cm_msg'] = "Invailid Email";
        header('location:../contact.php');
    } else {

        if (!in_array($file_ext,$img_ext)) {

            $_SESSION['cm_msg'] = "img only in jpg  or jpeg ext";
              header('location:../contact.php');
} else {


            $sql = "INSERT INTO contact(name,email,phone,message,pdf_file) VALUES('$name','$email','$number','$message','$img_name')";

            $connect_db = mysqli_query($con, $sql);

            if ($connect_db) {
                move_uploaded_file($_FILES['files']['tmp_name'], 'upload/' . $img_name);

                $_SESSION['cm_msg'] = "We Are Connect Soon....";
                header('location:../contact.php');
        

            } else {

                $_SESSION['cm_msg'] = "Somthing went wrong";
                header('location:../contact.php');
            }
        }
    }
};


if (isset($_POST['submit2'])) {

    $name2 = $_POST['name2'];
    $email2 = $_POST['email2'];
    $number2 = $_POST['number2'];
    $message2 = $_POST['message2'];
    $img2 = $_FILES['files2']['name'];


    if ($_FILES['files2']["size"] > 500000) {
        $_SESSION['cm_msg'] = " image size is to Big";
        header('location:../index.php');
    }
    echo $_FILES['files2']["size"];
    $img_ext2 = ['png', 'jpg', 'jpeg','pdf'];

    $file_ext2 = pathinfo($img2, PATHINFO_EXTENSION);

    $img_name2 = time() . '.' . $file_ext2;

    if (!filter_var($email2, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['cm_msg'] = "Invailid Email";
        header('location:../index.php');
    } else {

        if (!in_array($file_ext2,$img_ext2)) {

            $_SESSION['cm_msg'] = "img only in jpg  or jpeg ext";
        header('location:../index.php');
        } else {


            $sql = "INSERT INTO contact(name,email,phone,message,pdf_file) VALUES('$name2','$email2','$number2','$message2','$img_name2')";

            $connect_db = mysqli_query($con, $sql);

            if ($connect_db) {
                move_uploaded_file($_FILES['files2']['tmp_name'], 'upload/' . $img_name2);

                $_SESSION['cm_msg'] = "We Are Connect Soon....";
        header('location:../index.php');
        

            } else {

                $_SESSION['cm_msg'] = "Somthing went wrong";
        header('location:../index.php');
            }
        }
    }
};





// if($sql_query){
//     $_SESSION['cm_msg'] = "We Are Connect Soon....";
//     header('location:../contact.php');
// }else{
//     $_SESSION['cm_msg'] = "Somthing went wrong";
//     header('location:../contact.php');
// }




// ----------------------------------------------UPDATE---------------------------------------

if (isset($_POST['update_cus'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $message = $_POST['message'];

    $query = "UPDATE contact SET name='$name', email='$email',phone='$number',message='$message' WHERE id ='$id'";
    $query_run = mysqli_query($con, $query);


    if ($query_run) {
        $_SESSION['cm_msg'] = "User details Updated";
        header('location:index.php');
    } else {
        $_SESSION['cm_msg'] = "User details updation failed";
        header('location:index.php');
    }
}




// --------------------------------------------delete----------------------------------

if (isset($_POST['delete_cus'])) {

    $user_id = $_POST['delete_id'];

    $query_delete = " DELETE FROM contact WHERE  id ='$user_id'";

    $query_delete_run = mysqli_query($con, $query_delete);

    if ($query_delete_run) {

        $_SESSION['cm_msg'] = "User details deleted";
        header('location:index.php');
    } else {
        $_SESSION['cm_msg'] = "User details deletion failed";
        header('location:index.php');
    }
}
