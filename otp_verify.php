<?php
include('codes/authentication.php')

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <form action="" method="post">
        <h2>Verify OTP</h2>
        <input type="number" name="my_otp" placeholder="Enter the OTP">
        <button type="submit" name="verify_btn">Verify</button>
    </form>
</body>

</html>