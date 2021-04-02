<?php
require_once '../load.php';


if(isset($_GET['id'])){
    $delete_content_id = $_GET['id'];

    $delete_result = deleteContent($delete_content_id);

    if(!$delete_result){
        $message = 'Failed to delete Employee Info';
    }
}


$contents = getAllContent();

if(!$contents){
    $message = 'Failed to get Employee Info list';
}
?>

<?php include  './admin_head.php';?>
<body class="admin">
<h2 class="loginTitle">Delete Employee</h2>
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

<a class="back" href="index.php">Back</a>

</body>
</html>
