<?php
include('codes/authentication.php')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>

    <form action="" method="post">
        <h2>Login Form</h2>
        <input type="email" name="email" placeholder="Enter your email">
        <button type="submit" name="otp_btn">Next</button>
    </form>
</body>

</html>