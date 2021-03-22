<?php
require_once '../load.php';
confirm_logged_in(true);

if(isset($_GET['id'])){
    $delete_content_id = $_GET['id'];

    $delete_result = deleteMovie($delete_content_id);

    if(!$delete_result){
        $message = 'Failed to delete movie';
    }
}


$contents = getAllContentForDelete();

if(!$contents){
    $message = 'Failed to get movie list';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete content</title>
</head>
<body>
<h2>Delete content</h2>
<?php echo !empty($message) ? $message : ''; ?>

<a href="index.php">Back to Dashboard</a>

<table>
    <thead>
        <tr>
            <th>content ID</th>
            <th>content Title</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php while($single_content = $contents->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $single_content['ID'];?></td>
            <td><?php echo $single_content['title'];?></td>
            
            <td>
                <a href="admin_deletecontent.php?id=<?php echo $single_movie['ID'];?>">Delete</a>
            </td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>

</body>
</html>
