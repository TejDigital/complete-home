<?php
session_start();
require('includes/header.php');
?>

<!-- ****************************************contact1************************ -->
<div class="top_hero">
    <div class="top_hero_content">
        <img src="./imgs/home4_bg1.png" alt="">
        <div class="top_hero_text">
            <h1>Contact</h1>
            <p><a href="index.php">Home</a> /Contact</p>
        </div>
    </div>
</div>
<?php
if (isset($_SESSION['cm_msg'])) {
    echo "<script>alert(' .$_SESSION[cm_msg] .')</script>";
    unset($_SESSION['cm_msg']);
}
?>
<!-- **********************************address******************** -->
<div class="address">
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body" onclick="callNow()" style="cursor:pointer;">
                        <span class="material-symbols-outlined">call</span>
                        <div class="c2_box_contact mt-3">
                            <h5>CALL US</h5>
                            <a href="tel:+919522299988" class="text-decoration-none text-dark">+91 95222 99988</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card  text-center">
                    <div class="card-body" onclick="mailNow()" style="cursor:pointer;">
                        <span class="material-symbols-outlined">mail</span>
                        <div class="c2_box_contact mt-3">
                            <h5>MAKE A QUOTE</h5>
                            <a href="mailto:connect.completehome@gmail.com" class="text-decoration-none text-dark">connect.completehome@gmail.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card text-center">
                    <div class="card-body" onclick="myloc()" style="cursor:pointer;">
                        <span class="material-symbols-outlined">home</span>
                        <div class="c2_box_contact mt-3">
                            <h5>ADDRESS</h5>
                            <p onclick="myloc()" style="cursor:pointer;" class="text-decoration-none text-dark loc mb-0">Maroda Tank Risali, Bhilai,(C.G.)490006</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- ******************************************contact2**************************** -->
<div class="contact2">
    <div class="container">
        <div class="row contact2_content d-flex align-items-center justify-content-center  ">
            <div class="col-md-12 contact2_top_text">
                <h2>Do you have a question? Or do you <br> need us to prepare a complete home <br> quote for you?</h2>
                <p>Write to us! We will be happy to advise you</p>
            </div>
            <div class="row contact2_inp_box d-flex align-items-center justify-content-center p-3">
                <div class="contact2_left_blank col-md-6">

                </div>
                <div class="contact2_right_input col-md-6 bg-white p-4">

                    <form action="admin/connect.php" method="post" enctype=multipart/form-data>
                        <div class="row" style="gap:1rem 0;">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control inp  " placeholder="Enter Name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control inp " placeholder="Enter email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="tel" name="number" onkeyup="val(this)" maxlength="10" class="form-control inp " placeholder="Number" required>
                                    <p style="font-size: 0.7rem ; color:red; font-weight:500;" id="msg_number"></p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea name="message" cols="30" rows="3" class="form-control inp " placeholder="Your Message" required></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="" style="color:#AE0101; display:block;" class="p-1 m-1 rounded text-center">You can attache pictures of your ideas</label>

                                <div class="form-group">
                                    <input class="form-control border-0 shadow-none" name="files" type="file" required>
                                </div>
                            </div>
                            <div class="">
                                <div class="btn1">
                                    <button type="submit" name="submit" class="btn ">Submit</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require('includes/footer.php') ?>
<?php require('includes/script.php') ?>