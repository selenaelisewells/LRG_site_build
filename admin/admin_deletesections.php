<?php
require_once '../load.php';

confirm_logged_in();

if(isset($_GET['id'])){
    $delete_section_id = $_GET['id'];

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

<?php include  './admin_head.php';?>
<body class="admin">
<h2 class="loginTitle">Delete Section</h2>
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
