<?php

function getUserLevelMap()
{
    return array(
        '0' => 'Web Editor',
        '1' => 'Web Admin',
    );
}

function getCurrentUserLevel()
{
    $user_level_map = getUserLevelMap();

    if (isset($_SESSION['user_level']) && array_key_exists($_SESSION['user_level'], $user_level_map)) {
        return $user_level_map[$_SESSION['user_level']];
    } else {
        return "Unrecognized";
    }
}


function createUser($user_data){

    if(empty($user_data['username']) || isUsernameExists($user_data['username'])){
        return 'Username is Invalid or Already Exists';
    }

    $random_password = createRandomPassword(); 

    $encrypted_password = createEncryptedPassword($random_password);   


    $pdo = Database::getInstance()->getConnection();

    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_lname, user_name, user_pass, user_email, user_level)';
    $create_user_query .= 'VALUES(:fname, :lname, :username,:password,:email, :user_level)';

 
    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result = $create_user_set->execute(
        array(
            ":fname"=>$user_data["fname"],
            ":lname"=>$user_data["lname"],
            ":username"=>$user_data["username"],
            ":password"=>$encrypted_password,
            ":email"=>$user_data["email"],
            ":user_level"=>$user_data["user_level"]
        )
    );
 

    if($create_user_result){
        
        var_dump($random_password);
        die;
        redirect_to('index.php');
    }else{
        return 'The user did not go through!!';
    }
}





function createRandomPassword(){
    $characterOptions = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $rand_password = array();
    $optionsLength = strlen($characterOptions) - 1;
    for ($i = 0; $i < 7; $i++) {
        $number = rand(0, $optionsLength);
        $rand_password[] = $characterOptions[$number];
    }
    return implode($rand_password); 
}



function createEncryptedPassword($password){
    
    return password_hash($password, PASSWORD_DEFAULT);  
}




function getSingleUser($id)
{
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user WHERE user_id = :id';
    $get_user_set   = $pdo->prepare($get_user_query);
    $results        = $get_user_set->execute(
        array(
            ':id' => $id,
        )
    );

    if ($results && $get_user_set->rowCount()) {
        return $get_user_set;
    } else {
        return false;
    }
}

function  getAllUsers(){
    $pdo = Database::getInstance()->getConnection();

    $get_user_query = 'SELECT * FROM tbl_user';
    $users = $pdo->query($get_user_query);

    if($users){
        return $users;
    }else{
        return false;
    }
}

function deleteUser($user_id){
    $pdo = Database::getInstance()->getConnection();
    $delete_user_query = 'DELETE FROM tbl_user WHERE user_id = :id';
    $delete_user_set = $pdo->prepare($delete_user_query);
    $delete_user_result = $delete_user_set->execute(
        array(
            ':id'=>$user_id
        )
    );

    if($delete_user_result && $delete_user_set->rowCount()>0){
        redirect_to('admin_deleteuser.php');
    }else{
        return false;
    }
}

function editUser($user_data)
{
 
    $pdo = Database::getInstance()->getConnection(); 


    $updated_password = $user_data["password"];
    
  
    $encrypted_password_update = createEncryptedPassword($updated_password);

    $is_new_password = $updated_password !== '';

    $password_sql_snippet = $is_new_password ? ', user_pass=:password ' : '';
    $update_user_query = 
        'UPDATE tbl_user SET user_fname=:fname, user_name=:username, user_email=:email, user_level=:user_level '. $password_sql_snippet .'WHERE user_id = :id';
    // var_dump($update_user_query); die;
    $update_user_set = $pdo->prepare($update_user_query);
    $placeholders = array(
        ":fname"    =>$user_data["fname"],
        ":username" =>$user_data["username"],
        ":email"    =>$user_data["email"],
        ":user_level"=>$user_data["user_level"],
        ":id"=>$user_data["id"]
    );

    if($is_new_password) {
        $placeholders[":password"] = $encrypted_password_update;
    }

    $update_user_result = $update_user_set->execute($placeholders);

    if($update_user_result){
        $_SESSION['user_name'] = $user_data['fname'];
        $_SESSION['user_level'] = $user_data['user_level'];
        redirect_to('index.php');
    }else{
        return 'Update did not go through.';
    }
}

function isCurrentUserAdminAbove()
{
    return !empty($_SESSION['user_level']);
}

function isUsernameExists($username)
{
    $pdo = Database::getInstance()->getConnection();

    $user_exists_query  = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :username';
    $user_exists_set    = $pdo->prepare($user_exists_query);
    $user_exists_result = $user_exists_set->execute(
        array(
            ':username' => $username,
        )
    );

    return !$user_exists_result || $user_exists_set->fetchColumn() > 0;
}
