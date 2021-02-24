<?php
    require_once '../load.php';
    ini_set('display_errors', 1);

    $ip = $_SERVER['REMOTE_ADDR'];

    if(isset($_SESSION['user_id'])) {
        redirect_to("index.php");
}  

    if(isset($_POST['submit'])) {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        if(!empty($username) && !empty($password)) {
            $result = login($username, $password, $ip);
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
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <title>Welcome to admin panel</title>
</head>
<body>
<?php echo !empty($message)?$message:'';?>
<form action="admin_login.php" method="post" class="login">
<label for="username">Username</label>
<input id="username" type="text" name="username" value="">
<br><br>
<label for="password">Password:</label>
<input id="password" type="password" name="password">
<br><br>
<button class="log" type="submit" name="submit" >LOGIN</button>
</form>
    
</body>
</html>