<?PHP
include('config/app.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="bg-slate-200 flex py-4 items-center justify-end">
        <ul class="flex items-center mr-4">
            <li class="text-2xl border bg-sky-300 border-slate-400 rounded-md mx-4 px-4 items-center py-2 hover:shadow-md hover:bg-sky-500"><a href="register.php">Register</a></li>
            <li class="text-2xl border bg-sky-300 border-slate-400 rounded-md mx-4 px-4 items-center py-2 hover:shadow-md hover:bg-sky-500"><a href="login.php">Login</a></li>
        </ul>
    </div>

</body>

</html>