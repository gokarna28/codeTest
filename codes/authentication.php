<?php
include('config/app.php');
require_once('config/helper.php');
include_once('controllers/RegisterController.php');
include_once('controllers/LoginController.php');
include_once('controllers/otpverification.php');
include_once('controllers/authenticationController.php');

//registeration
if (isset($_POST['register_btn'])) {

    //path setup for image
    $filename = $_FILES['user_image']['name'];
    $tempname = $_FILES['user_image']['tmp_name'];
    $destination = 'assets/img/uploads/' . $filename;

    if (move_uploaded_file($tempname, $destination)) {
        $folder = $destination;
    } else {
        $folder = null;
        // echo "Failed to upload image.";
    }

    $name = validateInput($db->conn, $_POST['user_name']);
    $email = validateInput($db->conn, $_POST['user_email']);
    $added_on = validateInput($db->conn, date('M d, Y'));

    $register = new RegisterController;
    $register->registration($name, $email, $folder, $added_on);
    $messages = [];
    //display message
    $messages = $register->getMessages();


}


//login otp send
if (isset($_POST['otp_btn'])) {
    session_start();
    $email = validateInput($db->conn, $_POST['email']);
    $otp = rand(11111, 99999);

    //store the data in session variable
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;

    $OTP = new LoginController;
    $OTP->otpmail($email, $otp);

}


//otp verify
if (isset($_POST['verify_btn'])) {
    session_start();

    $my_otp = trim($_POST['my_otp']);
    $otp = trim((string) $_SESSION['otp']);
    $email = trim($_SESSION['email']);

    if ($otp) {
        $verify = new OTPVerification();
        $verify->verification($my_otp, $otp, $email);
    } else {
        echo "OTP session is not set.";
    }


}




