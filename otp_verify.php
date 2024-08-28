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
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <form action="" method="post" class="flex bg-slate-200 items-center
    flex-col w-2/6 mx-auto mt-10 rounded-md p-4 gap-4">
        <h2 class="flex text-2xl font-medium">Verify OTP</h2>
        <div class="flex items-center gap-3">
            <input class="flex text-xl px-3 py-2 border border-slate-300 rounded-md" type="number" name="my_otp" placeholder="Enter the OTP">
            <button class="bg-sky-400 px-5 py-2 text-xl rounded-md hover:bg-sky-500" type="submit" name="verify_btn">Verify</button>
        </div>
    </form>
</body>

</html>