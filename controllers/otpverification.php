<?php
class OTPVerification
{
    private $conn;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }
    public function verification($otp, $my_otp)
    {
        if (empty($my_otp)) {
            echo "fill the field";
        } else {
            if ($my_otp === $otp) {
                $sql = "SELECT * FROM user";
                $stmt = $this->conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                session_start();
                //store user_id to session variable
                $_SESSION['user_id'] = $row['id'];

                header("location:user_dashboard.php");
            } else {
                echo "Invalid OTP. Please try again.";
            }
        }

    }
}

?>