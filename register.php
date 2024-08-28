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
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <form action="" method="post" enctype="multipart/form-data" class="bg-slate-200
    flex flex-col items-center gap-4 w-1/2 mx-auto mt-10 p-4 rounded-md">
        <h2 class="text-2xl font-medium">User Registration Form</h2>

        <?php
        if (!empty($messages)) {
            foreach ($messages as $message) {
                ?>
                <p class="flex bg-red-200 px-4 py-3 rounded-md">
                    <?php echo $message ?>
                </p>
                <?php
            }
        }
        ?>
        <div class="flex items-center gap-3 ">
            <input class=" flex border border-slate-400 py-2 px-4 rounded-md" type="text" name="user_name"
                placeholder="Enter your name">
            <input class=" flex border border-slate-400 py-2 px-4 rounded-md" type="email" name="user_email"
                placeholder="Enter your email">
        </div>
        <input class="flex items-center border border-slate-400 rounded-md px-4 py-2 bg-white" type="file"
            name="user_image">
        <button class="bg-sky-400 px-4 py-3 rounded-md border text-xl hover:bg-sky-500" type="submit"
            name="register_btn">Register Now</button>

        <div>
            Already have a account?
            <a class="text-sky-600 hover:underline" href="login.php">Login</a>
        </div>
    </form>
    
</body>

</html>