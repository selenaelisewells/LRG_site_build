<?php 
require_once '../load.php';

confirm_logged_in();

if (isset($_POST['submit'])) {
    
    $data = array(
        'avatar'=>$_FILES['avatar'],
        'name'=>$_POST['name'],
        'position'=>$_POST['position'],
        'email'=>$_POST['email']
        
    );

    $message = addContent($data);
}
?>
<?php include  './admin_head.php';?>
<body class="admin">
<h2 class="loginTitle">Add Employee</h2>
<?php echo !empty($message) ? $message : ''; ?>
    
    <form class="adminform" action="admin_addemployee.php" method="post" enctype="multipart/form-data">
        <label for="avatar">Image:</label>
        <input id="avatar" type="file" name="avatar" value=""><br>

        <label for="name">Name:</label>
        <input id="name" type="text" name="name" value=""><br>

        <label for="position">Position:</label>
        <input id="position" type="text" name="position" value=""><br>

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value=""><br>
        
        <button type="submit" name="submit">Add Employee</button>
    </form>

    <a class="back" class="back" href="index.php">Back</a>
</body>
</html>