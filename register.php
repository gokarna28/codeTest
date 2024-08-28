<?php
include('codes/authentication.php')
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration page</title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>User Registration Form</h2>
        <input type="text" name="user_name" placeholder="Enter your name">
        <input type="email" name="user_email" placeholder="Enter your email">
        <input type="file" name="user_image">
        <button type="submit" name="register_btn">Register Now</button>
    </form>
    <?php
    // Display message if it is set
    if (isset($message) && !empty($message)) {
        echo "<p>$message</p>";
    }
    ?>
</body>

</html>