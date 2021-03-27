<?php
require_once '../load.php';
confirm_logged_in(true);



if(isset($_GET['id'])){
    $delete_content_id = $_GET['id'];

    $delete_result = deleteContent($delete_content_id);

    if(!$delete_result){
        $message = 'Failed to delete movie';
    }
}


$contents = getAllContent();

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
    <title>Delete Employee</title>
</head>
<body>
<h2>Delete Employee</h2>
<?php echo !empty($message) ? $message : ''; ?>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Position</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php while($single_content = $contents->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $single_content['employee_id'];?></td>
            <td><?php echo $single_content['employee_name'];?></td>
            <td><?php echo $single_content['employee_position'];?></td>
            
            <td>
                <a href="admin_deleteemployee.php?id=<?php echo $single_content['employee_id'];?>">Delete</a>
            </td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>

<a href="index.php">Back</a>

</body>
</html>
