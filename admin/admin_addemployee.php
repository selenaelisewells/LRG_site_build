<?php 
require_once '../load.php';

confirm_logged_in();

if (isset($_POST['submit'])) {
  
    $data = array(
        'image'=>$_FILES['image'],
        'name'=>$_POST['name'],
        'position'=>$_POST['position'],
        'email'=>$_POST['email']   
        
    );

    $message = addContent($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
</head>
<body>
<h2>Add Employee</h2>
<?php echo !empty($message) ? $message : ''; ?>
    
    <form action="admin_addemployee.php" method="post" enctype="multipart/form-data">
        
        <label for="image">Image:</label><br>
        <input id="image" type="file" name="image" value=""><br><br>

        <label for="name">Name:</label><br>
        <input id="name" type="text" name="name" value=""><br><br>

        <label for="position">Position:</label><br>
        <input id="position" type="text" name="position" value=""><br><br>

        <label for="email">Email:</label><br>
        <input id="email" type="email" name="email" value=""><br><br>

        <button type="submit" name="submit">Add Employee</button>
    </form>
</body>
</html>