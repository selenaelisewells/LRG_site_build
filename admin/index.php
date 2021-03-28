<?php
require_once '../load.php';
confirm_logged_in();

//chang the title for each page
$title = "Admin Login";?>
<?php include  './templates/head.php';?>
<?php include './templates/header.php';?>

<main class="mainContentWrap">
    <h2>Welcome to dashboard, <?php echo $_SESSION['user_name'];?>!</h2>
    <p>Your last login time: <?php echo $_SESSION['user_date'];?></p>
    
    <h3>Your status is <?php echo getCurrentUserLevel();?>
    <ul>
    
    <li><?php if (isCurrentUserAdminAbove()):?><a href="admin_createuser.php">Create User</a><?php endif;?></li>
    
    <li><a href="admin_edituser.php">Edit User</a></li>
    
    <li><?php if (isCurrentUserAdminAbove()):?><a href='admin_deleteuser.php'>Delete User</a><?php endif;?></li>
    </ul>    
    <a href="admin_logout.php">Sign Out</a>
    </main>

<?php include './templates/footer.php';?>
<?php include './templates/foot.php';?>