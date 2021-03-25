<?php

require_once '../load.php';
confirm_logged_in();

$contents = getAllContent();

if (!$contents) {
    $message = 'Failed to get user list';
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Content</title>
</head>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Body</th>
            <th>Image</th>
            <th>Tagline</th>
            <th>All text</th>

        </tr>

        <?php
        while ($single_content = $contents->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td><?php echo $single_content ['ID']; ?></td>
                <td><?php echo $single_content ['title']; ?></td>
              
                
                <td><a href="admin_editcontent.php?id=<?php echo $single_content ['ID']; ?>">Edit</a></td>
            </tr>
        <?php endwhile; ?>

    </table>
    
    <a href="index.php">Back</a>
</body>

</html>