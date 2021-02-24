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
                $_SESSION['user_level'] = $found_user['user_level'];
                $_SESSION['user_date'] = $found_user['user_date'];
                $_SESSION['user_login_num'] = $found_user['user_login_num']+1;

                // update the user IP by the current login in
                $update_user_query = 'UPDATE tbl_user SET user_ip= :user_ip,  user_date = now(), user_login_num = user_login_num +1 WHERE user_id= :user_id';
               

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

function confirm_logged_in($admin_above_only=false)
{
    if (!isset($_SESSION['user_id'])) {
        redirect_to("admin_login.php");
    }

    if (!empty($admin_above_only) && empty($_SESSION['user_level'])) {
        redirect_to('index.php');
    }
}

function logout(){
        session_destroy();

        redirect_to('admin_login.php');
}