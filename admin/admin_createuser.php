<?php
require_once '../load.php';
confirm_logged_in();
// ini_set('display_errors', 1);

    if (isset($_POST['submit'])) {

        $data = array(
            'fname' => trim($_POST['fname']),
            'lname' => trim($_POST['lname']),
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'user_level'=>trim($_POST['user_level']),          
        );

         $message = createUser($data);

    }

?>


<?php include  './admin_head.php';?>
<body class="admin">
<h2 class="loginTitle">Create User</h2>
<?php echo !empty($message)?$message:'';?>
<form class="adminform" action="admin_createuser.php" method="post">
    <label for="first_name">First name</label>
    <input id="first_name" type="text" name="fname" value=""><br>

    <label for="last_name">Last name</label>
    <input id="last_name" type="text" name="lname" value=""><br>

    <label for="username">Username</label>
    <input id="username" type="text" name="username" value=""><br>
    

    <label for="email">Email</label>
    <input id="email" type="email" name="email" value=""><br> 

    <h4>The password will be generated automatically.</h4>

    <!-- <label for="password">Password</label>
    <input id="password" type="text" name="password" value=""><br> -->

    <label for="user_level">User Status</label>
    <select id="user_level" name="user_level">
            <?php $user_level_map = getUserLevelMap();
                foreach ($user_level_map as $val => $label):?>
            <option value="<?php echo $val;?>"><?php echo $label;?>
            </option>
            <?php endforeach;?>
    </select><br><br>
    
    <button class="log" type="submit" name="submit">Create User</button>

    <a class="back" href="index.php">Back</a>
    

</form>
    
</body>
</html>