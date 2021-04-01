<?php
require_once '../load.php';
confirm_logged_in();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/0f3adee742.js" crossorigin="anonymous"></script>
    <link rel="https://cdn.rawgit.com/mfd/f3d96ec7f0e8f034cc22ea73b3797b59/raw/856f1dbb8d807aabceb80b6d4f94b464df461b3e/gotham.css">
    <!--insert any google fonts here-->
    <link rel="stylesheet" href="../css/main.css">
    
    <title>Admin Panel</title>
</head>
<body>
    <h2 class="heroTitle">Welcome to the dashboard, <?php echo $_SESSION['user_name'];?>!</h2>
    <p>Your last login time: <?php echo $_SESSION['user_date'];?></p>
    
    <h3>Your status is <?php echo getCurrentUserLevel();?>
    <ul>

    <h3>Edit User</h3>
    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href="admin_createuser.php">Create User</a></li>
    <?php endif;?>
    <li><a href="admin_edituser.php">Edit User</a></li>
    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href='admin_deleteuser.php'>Delete User</a></li>
    <?php endif;?>

    <h3>Edit Section</h3>
    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href='admin_addsections.php'>Add Section</a></li>
    <?php endif;?>

    <li><a href="admin_editsectiontext.php">Edit Section Text</a></li>

    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href="admin_editsections.php">Edit Section</a></li>
    <li><a href='admin_deletesections.php'>Delete Section</a></li>
    <?php endif;?>

    <h3>Edit Employee Info</h3>
    <li><a href="admin_addemployee.php">Add Employee Info</a></li>
    <li><a href="admin_editemployee.php">Edit Employee Info</a></li>
    <li><a href="admin_deleteemployee.php">Delete Employee Info</a></li> 

    </ul>    
    <a href="admin_logout.php">Sign Out</a>
</body>
</html>
