<?php
include('config/app.php');

class RegisterController
{
    private $conn;
    public $message;
    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function registration($name, $email, $folder, $added_on)
    {
        if (empty(trim($name)) || empty(trim($email)) || empty($folder)) {
            echo  "Fill all the fields";
        } else {
            // Name validation
            if (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
                echo  "Name can only contain letters and spaces.";
            } elseif (strlen($name) > 40) {
                echo  "Full name exceeds 40 characters.";
            }
            // Email validation
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo  "Invalid email format";
            } else {
                // Check if email already exists in the database
                $sql = "SELECT user_email FROM user WHERE user_email=?";
                $stmt = $this->conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $email);

                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows != 1) {

                        //inserting data to database
                        $sql = "INSERT INTO user (user_name, user_email, user_image, added_on) VALUES(?, ?, ?, ?)";
                        $stmt = $this->conn->prepare($sql);

                        if ($stmt) {
                            $stmt->bind_param("ssss", $name, $email, $folder, $added_on);

                            if ($stmt->execute()) {
                                echo "Registration Successfully";
                            } else {
                                echo "Error" . $stmt->error;
                            }

                            $stmt->close();
                        } else {
                            echo "Error preparing querry" . $this->conn->error;
                        }

                    } else {
                        echo  "User with this email is already exist";
                    }
                }
            }

        }


    }
}
