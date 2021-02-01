<?php
    require_once '../load.php';
    ini_set('display_errors', 1);
    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['username']);
        if(!empty($username) && !empty($password)) {
            $result = login($username, $password);
            $message = $result;
        } else {
            $message = 'Please fill out the requaired fields.';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to admin panel</title>
</head>
<body>
<?php echo !empty($message)?$message:'';?>
<form action="admin_login.php" method="post">
<label for="username">Username</label>
<input id="username" type="text" name="username" value="">
<br><br>
<label for="password">Password:</label>
<input id="password" type="password" name="password">
<br><br>
<button type="submit" name="submit">Show me the money</button>
</form>
    
</body>
</html>