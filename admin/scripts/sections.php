<?php

function getSingleSectionForCMS($id)
{
    $pdo = Database::getInstance()->getConnection();

    $get_section_query = 'SELECT * FROM tbl_sections WHERE ID = :ID';
    $get_section_set   = $pdo->prepare($get_section_query);
    $results        = $get_section_set->execute(
        array(
            ':ID' => $id,
        )
    );

    if ($results && $get_section_set->rowCount()) {
        return $get_section_set;
    } else {
        return false;
    }
}

function  getAllSectionsForCMS()
{
    $pdo = Database::getInstance()->getConnection();

    $get_section_query = 'SELECT * FROM tbl_sections';
    $sections = $pdo->query($get_section_query);

    if($sections){
        return $sections;
    }else{
        return false;
    }
}

function addSection($section_data)
{
    try {
       
        $pdo = Database::getInstance()->getConnection();

        $image         = $section_data['image'];
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'svg');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file types!');
        }

        # Move the uploaded file around (move the file from the tmp path to the /images)
        $image_path         = '../images/';
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $target_path        = $image_path . $generated_filename;
        if (!move_uploaded_file($image['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        
        # Generate an thumbnail from the original image
        $th_copy = $image_path . 'TH_' . $image['name'];
        if (!copy($target_path, $th_copy)) {
            throw new Exception('Whoooops, that thumbnail copy did not work!!');
        }

        # Insert into DB (tbl_sections)
        $insert_section_query = 'INSERT INTO tbl_sections(title, body, image, page_id, tagline, alt_text, component_type, section_id, section_order, is_overview)';
        $insert_section_query .= ' VALUES(:title, :body, :image, :page_id, :tagline, :alt_text, :component_type, :section_id, :section_order, :is_overview)';
        $insert_section       = $pdo->prepare($insert_section_query);
        $insert_section_result = $insert_section->execute(
            array( 
                ':title'   => $section_data['title'],
                ':body'    => $section_data['body'],
                ':image'     => $generated_filename,
                ':page_id'    => $section_data['page_id'],
                ':tagline'    => $section_data['tagline'],
                ':alt_text'    => $section_data['alt_text'],
                ':component_type'    => $section_data['component_type'],
                ':section_id'    => $section_data['section_id'],
                ':section_order'    => $section_data['section_order'],
                ':is_overview'    => $section_data['is_overview']
                
            )
        );

        redirect_to('index.php');

    } catch (Exception $e) {
        $error = $e->getMessage();
        return $error;
    }

}

function deleteSection($section_id)
{
    $pdo = Database::getInstance()->getConnection();
    $delete_section_query = 'DELETE FROM tbl_sections WHERE ID = :id';
    $delete_section_set = $pdo->prepare($delete_section_query);
    $delete_section_result = $delete_section_set->execute(
        array(
            ':id'=>$section_id
        )
    );

    if($delete_section_result && $delete_section_set->rowCount()>0){
        redirect_to('admin_deletesections.php');
    }else{
        return false;
    }
}

function editSection($section)
{
    // try {
       
        // $pdo = Database::getInstance()->getConnection();

        // $image         = $section['image'];
        // $upload_file    = pathinfo($image['name']);
        // $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'svg');
        // if (!in_array($upload_file['extension'], $accepted_types)) {
        //     throw new Exception('Wrong file types!');
        // }

        // # Move the uploaded file around (move the file from the tmp path to the /images)
        // $image_path         = '../images/';
        // $generated_name     = md5($upload_file['filename'] . time());
        // $generated_filename = $generated_name . '.' . $upload_file['extension'];
        // $target_path        = $image_path . $generated_filename;
        // if (!move_uploaded_file($image['tmp_name'], $target_path)) {
        //     throw new Exception('Failed to move uploaded file, check permission!');
        // }

        
        // # Generate an thumbnail from the original image
        // $th_copy = $image_path . 'TH_' . $image['name'];
        // if (!copy($target_path, $th_copy)) {
        //     throw new Exception('Whoooops, that thumbnail copy did not work!!');
        // }
 
    $pdo = Database::getInstance()->getConnection(); 

    $update_section_query = 
        'UPDATE tbl_sections SET title=:title, boby=:body, page_id=:page_id, tagline=:tagline, alt_text=:alt_text, component_type=:component_type, button_text=:button_text, section_id=:section_id, section_order=:section_order, is_overview=:is_overview WHERE ID = :ID';
    
    $update_section_set = $pdo->prepare($update_section_query);
    $placeholders = array(
        ':title'=> $section['title'],
        ':body'=> $section['body'],
        // ':image'=> $section['image'],
        ':page_id'=> $section['page_id'],
        ':tagline'=> $section['tagline'],
        ':alt_text'=> $section['alt_text'],
        ':component_type'=> $section['component_type'],
        ':button_text'=> $section['button_text'],
        ':section_id'=> $section['section_id'],
        ':ection_order'=> $section['section_order'],
        ':is_overview'=> $section['is_overview'],
        ":ID"=>$section["ID"]
    );
 

    $update_section_result = $update_section_set->execute($placeholders);

    if($update_section_result){
        $_SESSION['tagline'] = $section['tagline'];
     
        redirect_to('index.php');
    }else{
        return 'Update did not go through.';
    }

     //         redirect_to('index.php');
    // } catch (Exception $e) {
    //         $err = $e->getMessage();
    //         return $err;
    // }
}
