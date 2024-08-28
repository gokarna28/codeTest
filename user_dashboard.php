<?php
include('config/app.php');

// Initialize AuthenticationController
include_once('controllers/authenticationController.php');

$auth = new AuthenticationController();
$auth->login();

// Get the user data
$userData = $auth->getUserData();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="flex items-center bg-slate-200 py-4 justify-end px-4 gap-4">
        <div class="flex items-center gap-3">
            <p class="text-xl"><?php echo $userData['user_name'] ?></p>
            <img class="rounded-full w-14 h-14" src="<?php echo $userData['user_image'] ?>" alt="profile">
        </div>

        <a class="flex items-center bg-red-400 px-3 py-2 rounded-md text-xl hover:bg-red-500"
            href="logout.php">Logout</a>

    </div>
    <div class="flex mx-auto mt-10 justify-center text-3xl font-medium">
        Welcome <?php echo $userData['user_name']?>
    </div>
</body>

</html>