<?php
include('authentication.php');
include('config/dbcon.php');



if (isset($_POST['check_Emailbtn'])) {

    $email = $_POST['email'];

    $confirmemail = "SELECT email FROM users WHERE email='$email'";
    $confirmemail_run = mysqli_query($con, $confirmemail);

    if (mysqli_num_rows($confirmemail_run) > 0) {

        echo " Email Already teken";
    } else {
        echo " Email Available ";
    }
}

// if (isset($_POST['adduser'])) {

//     $name = $_POST["name"];
//     $email = $_POST["email"];
//     $password = $_POST["password"];
//     $confirmpassword = $_POST["confirmpassword"];

//     if ($password == $confirmpassword) {

//         $confirmemail = "SELECT email FROM users WHERE email='$email'";
//         $confirmemail_run = mysqli_query($con, $confirmemail);

//         if (mysqli_num_rows($confirmemail_run) > 0) {

//             $_SESSION['cm_msg'] = "Email Already teken !";
//             header('location:registered.php');
//         } else {
//             $adduser_qurey = "INSERT INTO users(name ,email,password) values('$name','$email','$password')";

//             $adduser_connect_db = mysqli_query($con, $adduser_qurey);

//             if ($adduser_connect_db) {
//                 $_SESSION['cm_msg'] = "New User Add successful";
//                 header('location:registered.php');
//             } else {
//                 $_SESSION['cm_msg'] = "User not Added";
//                 header('location:registered.php');
//             }
//         }
//     } else {
//         $_SESSION['cm_msg'] = "Password does not match";
//         header('location:registered.php');
//     }
// }

// ---------------Update----------------------

if (isset($_POST['updateuser'])) {

    $user_id = $_POST["user_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    // $role_as = $_POST["status"];

    $query = "UPDATE users SET  name='$name',email='$email',password='$password' WHERE id='$user_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {

        $_SESSION['msg'] = "User details Updated";
        header('location:registered.php');
    } else { 
        $_SESSION['msg'] = "User details updation failed";
        header('location:registered.php');
    }
}
// ==================================================Hotel==========================================




// ---------------------------------delete-------------------------------

// if (isset($_POST['deleteuser'])) {

//     $user_id = $_POST['delete_id'];

//     $query_delete = " DELETE FROM users WHERE  id ='$user_id'";

//     $query_delete_run = mysqli_query($con, $query_delete);

//     if ($query_delete_run) {

//         $_SESSION['msg'] = "User details deleted";
//         header('location:registered.php');
//     } else {
//         $_SESSION['msg'] = "User details deletion failed";
//         header('location:registered.php');
//     }
// }
