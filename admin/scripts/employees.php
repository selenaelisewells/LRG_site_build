<?php

function getSingleContent($id)
{
    $pdo = Database::getInstance()->getConnection();
    $get_content_query = 'SELECT * FROM tbl_employees WHERE employee_id = :id';
    $get_content_set   = $pdo->prepare($get_content_query);
    $results        = $get_content_set->execute(
        array(
            ':id' => $id,
        )
    );

    if ($results && $get_content_set->rowCount()) {
        return $get_content_set;
    } else {
        return false;
    }
}

function addContent($content_data)
{
    try {
       
        $pdo = Database::getInstance()->getConnection();

        $avatar         = $content_data['avatar'];
        $upload_file    = pathinfo($avatar['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'svg');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file types!');
        }

        # Move the uploaded file around (move the file from the tmp path to the /images)
        $image_path         = '../images/';
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $target_path        = $image_path . $generated_filename;
        if (!move_uploaded_file($avatar['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        
        # Generate an thumbnail from the original image
        $th_copy = $image_path . 'TH_' . $avatar['name'];
        if (!copy($target_path, $th_copy)) {
            throw new Exception('Whoooops, that thumbnail copy did not work!!');
        }

        # Insert into DB (tbl_employees)
        $insert_content_query = 'INSERT INTO tbl_employees(employee_avatar, employee_name, employee_position, employee_email)';
        $insert_content_query .= ' VALUES(:avatar, :name, :position, :email)';
        $insert_content       = $pdo->prepare($insert_content_query);
        $insert_content_result = $insert_content->execute(
            array(
                ':avatar'   => $generated_filename,
                ':name'   => $content_data['name'],
                ':position'    => $content_data['position'],
                ':email'     => $content_data['email']
                
            )
        );

        redirect_to('index.php');

    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }

}


function getAllContent(){
    $pdo = Database::getInstance()->getConnection();

    $get_content_query = 'SELECT * FROM tbl_employees';
    $contents = $pdo->query($get_content_query);

    if($contents){
        return $contents;
    }else{
        return false;
    }
}

function editContent($content){
    try {
        $pdo = Database::getInstance()->getConnection();

        $avatar         = $content['avatar'];
        $upload_file    = pathinfo($avatar['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'svg');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file types!');
        }

        # Move the uploaded file around (move the file from the tmp path to the /images)
        $image_path         = '../images/';
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $target_path        = $image_path . $generated_filename;
        if (!move_uploaded_file($avatar['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        
        # Generate an thumbnail from the original image
        $th_copy = $image_path . 'TH_' . $avatar['name'];
        if (!copy($target_path, $th_copy)) {
            throw new Exception('Whoooops, that thumbnail copy did not work!!');
        }


 
   

        $update_content_query =
        'UPDATE tbl_employee SET employee_name=:name, employee_position=:position, employee_email=:email, employee_avatar=:avatar WHERE employee_id = :id';
        // var_dump($update_user_query); die;
        $update_content_set = $pdo->prepare($update_content_query);
        $update_content_result = $update_content_set->execute(
            array(
        ":name"    =>$content["name"],
        ":position" =>$content["position"],
        ":email"    =>$content["email"],
        ":avatar"=>$content["avatar"],
        ":id"=>$content["id"]
            )
        );

    
        
        redirect_to('index.php');
    } catch (Exception $e) {
        $err = $e->getMessage();
        return $err;
    }
    
}

function deleteContent($content_id){
    $pdo = Database::getInstance()->getConnection();
    $delete_content_query = 'DELETE FROM tbl_employees WHERE employee_id = :id';
    $delete_content_set = $pdo->prepare($delete_content_query);
    $delete_content_result = $delete_content_set->execute(
        array(
            ':id'=>$content_id
        )
    );

    if($delete_content_result && $delete_content_set->rowCount()>0){
        redirect_to('admin_deleteemployee.php');
    }else{
        return false;
    }
}


