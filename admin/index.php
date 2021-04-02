<?php
require_once '../load.php';
confirm_logged_in();

?>

<?php include  './admin_head.php';?>
<div class="adminPanelWrap">
    <h2 class="loginTitle">Welcome to the dashboard, <?php echo $_SESSION['user_name'];?>!</h2>
    <p class="loginInfo">Your last login time: <?php echo $_SESSION['user_date'];?></p>
    <div class="status">
    <h3 >Your Role: <span class="red"><?php echo getCurrentUserLevel();?></span>
    </div>
    
    <ul>

    <h3 class="editTitle">Edit User</h3>
    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href="admin_createuser.php">Create User</a></li>
    <?php endif;?>
    <li><a href="admin_edituser.php">Edit User</a></li>
    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href='admin_deleteuser.php'>Delete User</a></li>
    <?php endif;?>

    <h3 class="editTitle">Edit Section</h3>
    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href='admin_addsections.php'>Add Section</a></li>
    <?php endif;?>

    <li><a href="admin_editsectiontext.php">Edit Section Text</a></li>

    <?php if (isCurrentUserAdminAbove()):?>
    <li><a href="admin_editsections.php">Edit Section</a></li>
    <li><a href='admin_deletesections.php'>Delete Section</a></li>
    <?php endif;?>

    <h3 class="editTitle">Edit Employee Info</h3>
    <li><a href="admin_addemployee.php">Add Employee Info</a></li>
    <li><a href="admin_editemployee.php">Edit Employee Info</a></li>
    <li><a href="admin_deleteemployee.php">Delete Employee Info</a></li> 

    </ul>    
    <a class="adminLogout button" href="admin_logout.php">Sign Out</a>
    </div>
</body>
</html>
