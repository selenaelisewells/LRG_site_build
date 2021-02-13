<?php 
function login($username, $password, $ip)
{ // return 'U are trying to login with u:'.$username.'p:'.$password;

        $pdo = Database::getInstance()->getConnection();

        #TODO: Finish the following query to chec
        $get_user_query = 'SELECT * FROM tbl_user WHERE user_name= :username AND user_pass= :password';
        $user_set = $pdo->prepare($get_user_query);
        $user_set->execute(
                array(
                        ':username'=>$username,
                        ':password'=>$password

                )
        );

        if($found_user = $user_set->fetch(PDO::FETCH_ASSOC)){
                // we found user in the DB, get him in
                $found_user_id = $found_user['user_id'];

                // Write the username ad userid into session
                $_SESSION['user_id'] = $found_user_id;
                $_SESSION['user_name'] = $found_user['user_fname'];

                // update the user IP by the current login in
                $update_user_query = 'UPDATE tbl_user SET user_ip= :user_ip WHERE user_id= :user_id';
               

                $update_user_set = $pdo->prepare($update_user_query);
                $update_user_set->execute(
                        array(
                                ':user_ip'=>$ip,
                                ':user_id'=>$found_user_id
        
                        )   
                );

                // redirect user back to index.php
                redirect_to('index.php');


        } else {
                return 'Wrong password, try again';
        }


}

function confirm_logged_in(){
    if(!isset($_SESSION['user_id'])) {
            redirect_to("admin_login.php");
    }    
}

function logout(){
        session_destroy();

        redirect_to('admin_login.php');
}