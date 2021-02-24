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
    <h2 class="dash">Welcome to dashboard page, <?php echo $_SESSION['user_name'];?>!</h2>
    <h3>Your status is <?php echo getCurrentUserLevel();?>
    <ul>
    
    <li><?php if (isCurrentUserAdminAbove()):?><a href="admin_createuser.php">Create User</a><?php endif;?></li>
    
    <li><a href="admin_edituser.php">Edit User</a></li>
    </ul>
        
    <a href="admin_logout.php">Sign Out</a>
</body>
</html>