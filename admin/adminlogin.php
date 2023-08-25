<?php
session_start();
require('includes/header.php');
if(isset($_SESSION['auth'])){
    $_SESSION['alert_msg'] = "You already logged in";
    header('location:index.php');
    exit(0);
}
?>
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 my-5">
            <?php
                if(isset($_SESSION['alert_msg'])){
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo$_SESSION['alert_msg'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['alert_msg']);
                }
                ?>
            <?php
                if(isset($_SESSION['auth_msg'])){
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong> <?php echo$_SESSION['auth_msg'] ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <?php
                    unset($_SESSION['auth_msg']);
                }
                ?>
            <?php require('message.php');?>
                <div class="card my-5">
                    <div class="card-header bg-light">
                        <h5 class="text-center">Login Form</h5>
                    </div>
                    <div class="card-body">
                        <form action="logincode.php" method="POST">
                            <div class="form-group">
                                <label for="">Email Id</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="login_btn" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require('includes/script.php');?>
<?php require('includes/footer.php');?>