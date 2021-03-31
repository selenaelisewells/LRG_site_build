<?php
require_once '../load.php';


$all_contents = getAllContent();
$id = $_SESSION['employee_id']??1;


if(isset($_GET['employee_id'])) {
    $id = $_GET['employee_id'];
}

$current_content = getSingleContent($id);

if (empty($current_content)) {
    $message = 'Failed to get content info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        'avatar'      => $_FILES['avatar'],
        'name'      => trim($_POST['name']),
        'position'   => trim($_POST['position']),      
        'email'      => trim($_POST['email']),    
        'id'         => trim($_POST['current_employee_id'])
    );

    $message = editContent($data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit Employee Info</h2>
    <?php echo !empty($message) ? $message : ''; ?>
 
        <form action="admin_editemployee.php" method="get">
            <label for="employee_id">Selected User</label>
            <select name="employee_id" id="employee_id">
                <?php foreach ($all_contents as $content): ?>
                    <option value="<?php echo $content["employee_id"] ?>" <?php echo $content["employee_id"] === $id ?"selected":"" ?>>
                        <?php echo $content["employee_name"] ?>
                    </option>
                <?php endforeach ?>        
            </select>
            <button type="submit" name="submit">Select User</button>
        </form>  
        <hr>
    

    <?php if (!empty($current_content)): ?>
    <form action="admin_editemployee.php" method="post" enctype="multipart/form-data">
        <?php while ($content_info = $current_content->fetch(PDO::FETCH_ASSOC)): ?>
            <input style="display: none;" type="text" id="current_employee_id" name="current_employee_id" value="<?php echo $id?>">
            
            <label for="avatar">Image:</label><br>
            <input id="avatar" type="file" name="avatar" value=""><br><br>

            <label for="name">Name:</label><br>
            <input id="name" type="text" name="name" value="<?php echo $content_info['employee_name']; ?>"><br><br>

            <label for="position">Position:</label><br>
            <input id="position" type="text" name="position" value="<?php echo $content_info['employee_position']; ?>"><br><br>

            <label for="email">Email:</label><br>
            <input id="email" type="email" name="email" value="<?php echo $content_info['employee_email']; ?>"><br><br>
            
            <button type="submit" name="submit">Update Employee Info</button>
        <?php endwhile;?>
    </form>
    <?php endif;?>
    <a href="index.php">Back</a>
</body>
</html>