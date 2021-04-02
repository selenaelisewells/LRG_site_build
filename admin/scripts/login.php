<?php 
function login($username, $password, $ip)
{ 
        $pdo = Database::getInstance()->getConnection();

        #TODO: Finish the following query to chec
        $get_user_query = 'SELECT * FROM tbl_user WHERE user_name= :username'; //AND user_pass=:password AND blocked=0';
        $user_set = $pdo->prepare($get_user_query);
        $user_set->execute(
                array(
                        ':username'=>$username
                        // ':password'=>$password     

                )
        );

        $found_user = $user_set->fetch(PDO::FETCH_ASSOC);
        $verify = password_verify($password, $found_user['user_pass']);

        if($found_user && $verify){
                // we found user in the DB, get him in
                $found_user_id = $found_user['user_id'];

                // Write the username ad userid into session
                $_SESSION['user_id'] = $found_user_id;
                $_SESSION['user_name'] = $found_user['user_fname'];
                $_SESSION['user_level'] = $found_user['user_level'];
                $_SESSION['user_date'] = $found_user['user_date'];
                //$_SESSION['user_login_num'] = $found_user['user_login_num']+1;
                

                // update the user IP by the current login in
                $update_user_query = 'UPDATE tbl_user SET user_ip= :user_ip,  user_date = now() WHERE user_id= :user_id';

                // user_login_num = user_login_num +1, fail_login = 0,
               

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

        // else {
        //         $get_user_query = 'SELECT user_id, fail_login, blocked FROM tbl_user WHERE user_name =:username';
        //         $user_set = $pdo->prepare($get_user_query);
        //         $user_set->execute(
        //             array(
        //                 ':username' => $username,
        //             )
        //         );
        
        //         // if username is found get failed login attempts from DB
        //         if($found_user = $user_set->fetch(PDO::FETCH_ASSOC)) {
                    
        //             $found_user_id = $found_user['user_id'];
        //             // we found the number of failed attempts
        //             $attempts = $found_user['fail_login'];
        
        //             // If there is one last attempt to enter
        //             if($attempts >= 2) {
        //                 $update_user_query = 'UPDATE tbl_user SET blocked=1 WHERE user_id=:user_id'; 
        //                 $update_user_set = $pdo->prepare($update_user_query);
        //                 $update_user_set->execute(
        //                     array(
        //                         ':user_id' =>$found_user_id
        //                     )
        //                 );
        //                 return 'Account is blocked. Contact the student moral support and psychological assistance service.';
        
        //             //if less than 3 unsuccessful attempts, the data is added to the database
        //             }else{
        //                 $attempt = $attempts+1;
        //                 $update_user_query = 'UPDATE tbl_user SET fail_login = :attempt WHERE user_id = :user_id';
        //                 $update_user_set = $pdo->prepare($update_user_query);
        //                 $update_user_set->execute(
        //                     array(
        //                         ':attempt' =>$attempt,
        //                         ':user_id' =>$found_user_id
        //                     )
        //                 );
        //                 $attempts_left = 3 - $attempt;
        //                 return 'Password incorrect. You have '.$attempts_left.' attempts left before the account is blocked.';
        //              }
        
        //         }else{
                        
        //             return 'The user you entered was not found. Please try again.';
        //         }
        //     }

}


function confirm_logged_in()
// $admin_above_only=false
{
    if (!isset($_SESSION['user_id'])) {
        redirect_to("admin_login.php");
    }

//     if (!empty($admin_above_only) && empty($_SESSION['user_level'])) {
//         redirect_to('index.php');
//     }
}

function logout(){
        session_destroy();

        redirect_to('admin_login.php');
}