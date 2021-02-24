<?php
require_once '../load.php';
//confirm_logged_in();
ini_set('display_errors', 1);

// The hash of the password that 
//random password set up
// $random_pass = random_pass(12);

    if (isset($_POST['submit'])) {

        $data = array(
            'fname' => trim($_POST['fname']),
            'lname' => trim($_POST['lname']),
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
        );
// trying to emplement into the code
        //  if(empty($_POST['random_pass'])){
        //     $data['password'] = password_hash(trim($_POST['random_pass']), PASSWORD_DEFAULT);
        //  } else {
        //      $data['password'] = password_hash($_POST['random_pass'], PASSWORD_DEFAULT);
        //  }

         $message = createUser($data);

    }

  // hash will be stored in the database 
//   $hash = password_hash($random_pass,  PASSWORD_DEFAULT); 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <title>Create User</title>
</head>
<body>
<h2>Create User</h2>
<?php echo !empty($message)?$message:'';?>
<form action="admin_createuser.php" method="post">
    <label for="first_name">First name</label>
    <input id="first_name" type="text" name="fname" value=""><br><br>

    <label for="last_name">Last name</label>
    <input id="last_name" type="text" name="lname" value=""><br><br>

    <label for="username">Username</label>
    <input id="username" type="text" name="username" value=""><br><br>

    <label for="email">Email</label>
    <input id="email" type="email" name="email" value=""><br><br> 
    <button class="log" type="submit" name="submit">Create User</button>

    <label for="password">Password</label>
    <input id="password" type="text" name="password" value=""><br><br>
    

   

</form>
    
</body>
</html>