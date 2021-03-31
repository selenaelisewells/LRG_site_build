<?php
require_once '../load.php';



if(isset($_GET['ID'])){
    $delete_section_id = $_GET['ID'];

    $delete_result = deleteSection($delete_section_id);

    if(!$delete_result){
        $message = 'Failed to delete section';
    }
}


$sections = getAllSectionsForCMS();

if(!$sections){
    $message = 'Failed to get section list';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Section</title>
</head>
<body>
<h2>Delete Section</h2>
<?php echo !empty($message) ? $message : ''; ?>


<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Delete</th>
        </tr>
    </thead>

    <tbody>
        <?php while($single_section = $sections->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?php echo $single_section['ID'];?></td>
            <td><?php echo $single_section['section_id'];?></td>
            <td><?php echo $single_section['body'];?></td>
            
            <td>
                <a href="admin_deletesections.php?id=<?php echo $single_section['ID'];?>">Delete</a>
            </td>
        </tr>
        <?php endwhile;?>
    </tbody>
</table>

<a href="index.php">Back</a>

</body>
</html>
