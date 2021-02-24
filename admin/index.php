<?php
require_once '../load.php';
confirm_logged_in();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
    <h2 class="dash">Welcome to dashboard page, <?php echo $_SESSION['user_name'];?>!</h2>

    <a href="admin_createuser.php">Create User</a>
    <a href="admin_logout.php">Sign Out</a>
</body>
</html>