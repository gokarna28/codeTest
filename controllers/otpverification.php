<?php
class OTPVerification
{
    public function verification($otp, $my_otp)
    {
        if (empty($my_otp)) {
            echo "fill the field";
        } else {
            if ($my_otp === $otp) {
                echo "OTP matched successfully!";
                header("location:index.php");
            } else {
                echo "Invalid OTP. Please try again.";
            }
        }

    }
}

?>