<?php
include('config/app.php');

class LoginController
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function otpmail($email, $otp)
    {
        if (empty($email)) {
            echo "fill the field";
        } else {
            $sql = "SELECT user_email FROM user WHERE user_email=?";
            $stmt = $this->conn->prepare($sql);

            if ($stmt) {
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows != 1) {
                    echo "Invalid Email";
                } else {
                    //send mail to user for otp verification
                    $to = $email;
                    $subject = "OTP Authentication";

                    // Use HTML content for the email message
                    $message = '<html><body>';
                    $message .= '<p>Your OTP is: <strong style="font-size: 16px;">' . $otp . ' </strong>Use the OTP for Login.</p>';
                    $message .= '</body></html>';

                    $headers = "From: gokarnachy28@gmail.com\r\n";
                    $headers .= "Content-Type: text/html; charset=UTF-8\r\n"; // Set content type as HTML

                    $check = mail($to, $subject, $message, $headers);

                    if ($check) {
                        echo "successfully otp sent";
                    } else {
                        echo "Failed to send the email";
                    }
                }

            }
        }
    }
}
