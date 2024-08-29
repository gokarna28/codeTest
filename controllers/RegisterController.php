<?php
include('config/app.php');

class RegisterController
{
    private $conn;
    private $messages = []; // Array to store messages

    public function __construct()
    {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function registration($name, $email, $folder, $added_on)
    {
        if (empty(trim($name)) && empty(trim($email)) && empty($folder)) {
            $this->messages[] = "Fill all the fields";
        } else {
           
            // Name validation
            if (empty($name)) {
                $this->messages[] = "Name is required*";
            } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
                $this->messages[] = "Name can only contain letters and spaces.";
            } elseif (strlen($name) > 40) {
                $this->messages[] = "Full name exceeds 40 characters.";
            }else
             //image validation 
             if(empty($folder)){
                $this->messages[]= "Profile image is required*";
            }else

            // Email validation
            if (empty($email)) {
                $this->messages[] = "Email is required*";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->messages[] = "Invalid email format";
            } else {
                // Check if email already exists in the database
                $sql = "SELECT user_email FROM user WHERE user_email=?";
                $stmt = $this->conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("s", $email);

                    $stmt->execute();
                    $result = $stmt->get_result();
                    if ($result->num_rows != 1) {
                        // Inserting data to database
                        $sql = "INSERT INTO user (user_name, user_email, user_image, added_on) VALUES(?, ?, ?, ?)";
                        $stmt = $this->conn->prepare($sql);

                        if ($stmt) {
                            $stmt->bind_param("ssss", $name, $email, $folder, $added_on);

                            if ($stmt->execute()) {
                                echo "<script>alert('Registered Successfully. Now you can login using email.')</script>";
                                header("location:login.php");
                                exit(); 
                            } else {
                                $this->messages[] = "Error: " . $stmt->error;
                            }

                            $stmt->close();
                        } else {
                            $this->messages[] = "Error preparing query: " . $this->conn->error;
                        }

                    } else {
                        $this->messages[] = "User with this email already exists";
                    }
                }
            }
        }
    }

    // Method to get the messages
    public function getMessages()
    {
        return $this->messages;
    }
}
