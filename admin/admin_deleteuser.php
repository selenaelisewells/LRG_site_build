<?php



require_once '../load.php';
confirm_logged_in();
if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $delete_user_result = deleteUser($id);

    if (!$delete_user_result) {
        $message = 'Failed to delete user';
    }
}

$results = getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
</head>

<body>
    <table>
        <tr>
            <th>User ID</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>Delete</th>
        </tr>

        <?php
        while ($row = $results->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $row['user_id']; ?></td>
                <td><?php echo $row['user_fname']; ?></td>
                <td><?php echo $row['user_email']; ?></td>
                
                <td><a href="admin_deleteuser.php?id=<?php echo $row['user_id']; ?>">Delete</a></td>
            </tr>
        <?php endwhile; ?>

    </table>
    
    <a href="index.php">Back</a>
</body>

</html>