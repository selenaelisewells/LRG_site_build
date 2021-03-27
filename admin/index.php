<?php
require_once '../load.php';
confirm_logged_in();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    <h2>Welcome to dashboard, <?php echo $_SESSION['user_name'];?>!</h2>
    <p>Your last login time: <?php echo $_SESSION['user_date'];?></p>
    
    <h3>Your status is <?php echo getCurrentUserLevel();?>
    <ul>

    <h3>Edit User</h3>
    <li><a href="admin_edituser.php">Edit Users</a></li>

    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href="admin_createuser.php">Create User</a></li>
    <li><a href='admin_deleteuser.php'>Delete User</a></li>
    <?php endif;?>

    <h3>Edit Section's Text</h3>
    <li><a href="admin_editsections.php">Edit Section Text</a></li> 
    
    <h3>Edit Employee Info</h3>
    <li><a href="admin_addemployee.php">Add Employee Info</a></li>
    <li><a href="admin_editemployee.php">Edit Employee Info</a></li>
    <li><a href="admin_deleteemployee.php">Delete Employee Info</a></li> 

    </ul>    
    <a href="admin_logout.php">Sign Out</a>
</body>
</html>