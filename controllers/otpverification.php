<?php
class OTPVerification
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function verification($otp, $my_otp, $email)
    {
        if (empty($my_otp)) {
            echo "fill the field";
        } else {
            if ($my_otp === $otp) {

                $sql = "SELECT * FROM user WHERE user_email=?";
                $stmt = $this->conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $email);

                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    session_start();
                    //store user_id to session variable
                    echo $_SESSION['user_id'] = $row['id'];

                    //success message
                    echo "<script>alert('You are successfully login to system.');</script>";

                    header("location:user_dashboard.php");
                }

            } else {
                echo "Invalid OTP. Please try again.";
            }
        }

    }
}

