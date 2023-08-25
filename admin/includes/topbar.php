<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="../admin/index.php" class="nav-link">Home</a>
        </li>
       
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                    if(isset($_SESSION['auth'])){
                        echo $_SESSION['auth_user']['user_name'];
                    }
                    else{
                        echo"No Logging";
                    }
                    ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <!-- <a class="dropdown-item" href="#">Another action</a> -->
                    <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                    <form action="logout.php" method="POST">
                        <button type="submit" name="logout_btn"  class="dropdown-item" >Logout</button>
                    </form>
                </div>
            </div>
        </li>
   
       
    </ul>
</nav>
<!-- /.navbar -->