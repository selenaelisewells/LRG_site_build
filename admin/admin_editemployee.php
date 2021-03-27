<?php
require_once '../load.php';
confirm_logged_in();
$all_content = getAllContent();
$id = $_SESSION['employee_id'];

$current_user = getSingleContent($id);

if (empty($current_content)) {
    $message = 'Failed to get employee info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        'avatar'      => trim($_POST['avatar']),
        'name'   => trim($_POST['name']),
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
    <title>Edit Employee Info</title>
</head>
<body>
    <h2>Edit Employee Info</h2>
    <?php echo !empty($message) ? $message : ''; ?>
    
        <form action="admin_editemployee.php" method="get">
            <label for="Edit Employee Info_id">Selected User</label>
            <select name="employee_id" id="employee_id">
                <?php foreach ($all_content as $content): ?>
                    <option value="<?php echo $content["employee_id"] ?>" <?php echo $user["employee_id"] === $id ?"selected":"" ?>>
                        <?php echo $content["employee_name"] ?>
                    </option>
                <?php endforeach ?>        
            </select>
            <button type="submit" name="submit">Select Employee</button>
        </form>  
        <hr>
    

    <?php if (!empty($current_content)): ?>
    <form action="admin_editemployee.php" method="post">
        <?php while ($content_info = $current_content->fetch(PDO::FETCH_ASSOC)): ?>
            <input style="display: none;" type="text" id="current_employee_id" name="current_employee_id" value="<?php echo $id?>">
           
            <label for="avatar">Image:</label><br>
            <input id="avatar" type="file" name="avatar" value="<?php echo $content_info['employee_avatar']; ?>"><br><br>
            
            <label for="name">Name:</label>
            <input id="name" type="text" name="name" value="<?php echo $content_info['employee_name']; ?>"><br><br>

            <label for="position">Position:</label>
            <input id="position" type="text" name="position" value="<?php echo $content_info['employee_position']; ?>"><br><br>

            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="<?php echo $content_info['employee_email']; ?>"><br><br>

            <button type="submit" name="submit">Update User</button>
     
            <?php endwhile;?>
    </form>
    <?php endif;?>

    <a href="index.php">Back</a>
</body>
</html>