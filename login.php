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
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>

    <form action="" method="post" class="flex bg-slate-200
    flex-col gap-4 w-2/6 mx-auto mt-10 p-4 rounded-md items-center">
        <h2 class="flex text-2xl font-medium">Login Form</h2>

        <input class="px-4 border border-slate-300 py-2 text-xl rounded-md" type="email" name="email" placeholder="Enter your email">
        <button class="bg-sky-400 hover:bg-sky-500 px-6 py-2 text-xl rounded-md" type="submit" name="otp_btn">Next</button>

        <div>
            Don't have account?
            <a class="text-sky-600 hover:underline" href="register.php">Register</a>
        </div>
    </form>
</body>

</html>