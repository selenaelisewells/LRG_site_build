<?php

// reference https://www.studentstutorial.com/php/php-mysql-data-delete.php

require_once '../load.php';
confirm_logged_in();

$users = getAllUsers();

if (!$users) {
    $message = 'Failed to get user list';
}

// if (isset($_GET['id'])) {

//     $id = $_GET['id'];
//     $delete_user_result = deleteUser($id);

//     if (!$delete_user_result) {
//         $message = 'Failed to delete user';
//     }
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit All Users</title>
</head>

<body>
    <table>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Edit</th>
        </tr>

        <?php
        while ($single_user = $users->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $single_user ['user_id']; ?></td>
                <td><?php echo $single_user ['user_fname']; ?></td>
                <td><?php echo $single_user ['user_email']; ?></td>
                
                <td><a href="admin_editallusers.php?id=<?php echo $single_user ['user_id']; ?>">Edit</a></td>
            </tr>
        <?php endwhile; ?>

    </table>
    
    <a href="index.php">Back</a>
</body>

</html>