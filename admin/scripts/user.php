<?php

function getUserLevelMap()
{
    return array(
        '0'=>'Editor',
        '1'=>'Admin',
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
        return 'Username is invalid!!';
    }

    $random_password= createRandomPassword();

    $encrypted_password = createEncryptedPassword($random_password);

   ## 1. Run the proper SQL query to insert user
    $pdo = Database::getInstance()->getConnection();

    $create_user_query = 'INSERT INTO tbl_user(user_fname, user_lname,user_name, user_pass, user_email, user_level)';
    $create_user_query .= 'VALUES(:fname, :lname, :username, :password, :email, :user_level)';


    $create_user_set = $pdo->prepare($create_user_query);
    $create_user_result =$create_user_set->execute(
        array(

            ':fname'=>$user_data['fname'],
            ':lname'=>$user_data['lname'],
            ':username'=>$user_data['username'],
            ":password"=>$encrypted_password,
            ':email'=>$user_data['email'],
            ':user_level'=>$user_data['user_level'],

        )
    );

   ## 2. Redirect to index.php if create user succesfully, (maybe with some message???)
   # otherwise, showing the error message

   if ($create_user_result){

        
        redirect_to('index.php');
        
    } 
    else {
        return 'This user cannot be registred.';
    }

}

function createRandomPassword(){
    $characterOptions = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $rand_password = array();
    //account for index lengths
    $optionsLength = strlen($characterOptions) - 1;
    //loop over and choose a random character
    for ($i = 0; $i < 7; $i++) {
        $number = rand(0, $optionsLength);
        $rand_password[] = $characterOptions[$number];
    }
    return implode($rand_password);
}

function createEncryptedPassword($password){
        //the has of the password that can be stored in a database
        return password_hash($password, PASSWORD_DEFAULT);  
}




function getSingleUser($id){
    $pdo = Database::getInstance()->getConnection();

   
    $get_user_query = 'SELECT * FROM tbl_user WHERE user_id = :id';
    $get_user_set =$pdo->prepare($get_user_query);
    $results = $get_user_set->execute(
        array(
            ':id'=>$id,
        )
    );

    if($results && $get_user_set->rowCount()){
        return $get_user_set;
    }else{
        return false;
    }
}

function editUser($user_data){
    if(empty($user_data['username']) || isUsernameExists($user_data['username'])){
        return 'Username is invalid!!';
    }
    
    $pdo = Database::getInstance()->getConnection();

    ## TODO: finish the following lines, so that your user profile is updated
    $update_user_query = 'UPDATE tbl_user SET user_fname = :fname, user_lname = :lname, user_name=:username, user_pass=:password, user_email=:email, user_level=:level WHERE user_id=:id';
    $update_user_set = $pdo->prepare($update_user_query);
    $update_user_result = $update_user_set->execute(
        array(
            ':fname'=>$user_data['fname'],
            ':lname'=>$user_data['lname'],
            ':username'=>$user_data['username'],
            ':password'=>$user_data['password'],
            ':email'=>$user_data['email'],
            ':level'=>$user_data['user_level'],
            ':id'=>$user_data['id']
        )
    );
    // $update_user_set->debugDumpParams();
    // exit;

    if($update_user_result){
        $_SESSION['user_level'] = $user_data['user_level'];
        redirect_to('index.php');
    }else{
        return 'Guess you got canned....';
    }
}

function isCurrentUserAdminAbove(){
    return !empty($_SESSION['user_level']);
}

function isUsernameExists($username){
    $pdo = Database::getInstance()->getConnection();
    ## TODO: finish the following lines to check if there is another row in the tbl_user that has the given username
    $user_exists_query = 'SELECT COUNT(*) FROM tbl_user WHERE user_name = :username';
    $user_exists_set = $pdo->prepare($user_exists_query);
    $user_exists_result = $user_exists_set->execute(
        array(
            ':username'=>$username
        )
    );

    return !$user_exists_result || $user_exists_set->fetchColumn()>0;
}


// reference https://www.studentstutorial.com/php/php-mysql-data-delete.php

function getAllUsers()
{
    $pdo = Database::getInstance()->getConnection();
    $user_delete_query = "SELECT user_id, user_fname, user_email FROM tbl_user";

    $user_delete_set = $pdo->prepare($user_delete_query);
    $user_delete_set->execute();

    return $user_delete_set;
}

function deleteUser($id)
{
    $pdo = Database::getInstance()->getConnection();
    if (isset($_SESSION['user_id'])) {
        if ($_SESSION['user_id'] == $id) {
            return 'cannot delete yourself';
        } else {
            $user_delete_query = "DELETE FROM tbl_user WHERE user_id = :id";

            $user_delete_set = $pdo->prepare($user_delete_query);

            $result_user_delete = $user_delete_set->execute(
                array(
                    ":id" => $id
                )
            );


            if ($result_user_delete  && $user_delete_set->rowCount() > 0) {
                redirect_to('admin_deleteuser.php');
            } else {
                return false;
            }
        }
    } else {
        return "There is a problem";
    }
}
