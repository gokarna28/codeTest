<?php

class AuthenticationController
{
    private $conn;
    // To store user data
    private $userData;

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function login()
    {
        session_start();

        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];

            $sql = "SELECT * FROM user WHERE id=?";
            $stmt = $this->conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("i", $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows == 1) {
                    // Store user data
                    $this->userData = $result->fetch_assoc();
                } else {
                    // User not found, redirect to login
                    session_destroy();
                    header("location:login.php");
                    exit();
                }
            }
        } else {
            // User not logged in, redirect to login
            header("location:login.php");
            exit();
        }

    }

    public function getUserData()
    {
        return $this->userData;
    }
}
