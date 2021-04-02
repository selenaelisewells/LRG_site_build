<?php
require_once '../load.php';
confirm_logged_in();
$all_users = getAllUsers();
$id           = $_SESSION['user_id'];


if(isset($_GET['user_id']) && isCurrentUserAdminAbove()) {
    $id = $_GET['user_id'];
}

$current_user = getSingleUser($id);

if (empty($current_user)) {
    $message = 'Failed to get user info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        'fname'      => trim($_POST['fname']),
        'lname'      => trim($_POST['lname']),
        'username'   => trim($_POST['username']),
        'password'   => trim($_POST['password']),
        'email'      => trim($_POST['email']),
        'user_level' => isCurrentUserAdminAbove() ? trim($_POST['user_level']) : 0,
        'id'         => trim($_POST['current_user_id'])
    );

    $message = editUser($data);
}
?>
<?php include  './admin_head.php';?>

<body class="admin">
    <h2 class="loginTitle">Edit User</h2>
    <?php echo !empty($message) ? $message : ''; ?>
    <?php if (isCurrentUserAdminAbove()): ?>
        <form class="adminform" action="admin_edituser.php" method="get">
            <label for="user_id">Selected User</label>
            <select name="user_id" id="user_id">
                <?php foreach ($all_users as $user): ?>
                    <option value="<?php echo $user["user_id"] ?>" <?php echo $user["user_id"] === $id ?"selected":"" ?>>
                        <?php echo $user["user_name"] ?>
                    </option>
                <?php endforeach ?>        
            </select>
            <button type="submit" name="submit">Select User</button>
        </form>  
        <hr>
    <?php endif;?>

    <?php if (!empty($current_user)): ?>
    <form class="adminform" action="admin_edituser.php" method="post">
        <?php while ($user_info = $current_user->fetch(PDO::FETCH_ASSOC)): ?>
            <input style="display: none;" type="text" id="current_user_id" name="current_user_id" value="<?php echo $id?>">
            <label for="first_name">First Name</label>
            <input id="first_name" type="text" name="fname" value="<?php echo $user_info['user_fname']; ?>"><br>

            <label for="last_name">Last Name</label>
            <input id="last_name" type="text" name="lname" value="<?php echo $user_info['user_lname']; ?>"><br>

            <label for="username">Username</label>
            <input id="username" type="text" name="username" value="<?php echo $user_info['user_name']; ?>"><br>
           
            <label for="password">Password</label>
            <input id="password" type="text" name="password" value=""><br>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?php echo $user_info['user_email']; ?>"><br>

            <?php if (isCurrentUserAdminAbove()): ?>
                <label for="user_level">User Level</label>
                <select id="user_level" name="user_level">
                    <?php $user_level_map = getUserLevelMap();
                foreach ($user_level_map as $val => $label): ?>
                    <option value="<?php echo $val; ?>" <?php echo ((int) $user_info['user_level'] === $val) ? 'selected' : ''; ?>><?php echo $label; ?>
                    </option>
                    <?php endforeach;?>
                </select><br>
            <?php endif;?>

            <button type="submit" name="submit">Update User</button>
        <?php endwhile;?>
    </form>
    <?php endif;?>

    <a class="back" href="index.php">Back</a>
</body>
</html>