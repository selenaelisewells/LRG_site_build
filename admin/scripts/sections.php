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
    //    var_dump($section_data);die;
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
        $insert_section_query = 'INSERT INTO tbl_sections(title, body, image, page_id, tagline, alt_text, component_type, button_text, button_link, section_id, section_order, is_overview)';
        $insert_section_query .= ' VALUES(:title, :body, :image, :page_id, :tagline, :alt_text, :component_type, :button_text, :button_link, :section_id, :section_order, :is_overview)';
        $insert_section       = $pdo->prepare($insert_section_query);
        $insert_section_result = $insert_section->execute(
            array( 
                ':title'   => $section_data['title'],
                ':body'    => $section_data['body'],
                ':image'     => $generated_filename,
                ':page_id'    => (int) $section_data['page_id'],
                ':tagline'    => $section_data['tagline'],
                ':alt_text'    => $section_data['alt_text'],
                ':component_type'    => $section_data['component_type'],
                ':button_text'=> $section_data['button_text'],
                ':button_link'=> $section_data['button_link'],
                ':section_id'    => $section_data['section_id'],
                ':section_order'    => $section_data['section_order'],
                ':is_overview'    => (int) $section_data['is_overview']
                
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
            ':id'=> (int) $section_id
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
    try {
        $pdo = Database::getInstance()->getConnection();
        $has_new_image = $section['image']['name'] !== '';
        
        // Verify we have uploaded an image to prevent array errors
        if ($has_new_image) {
            $image       = $section['image'];
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
        }
        $sql_fragment = $has_new_image ? ' image=:image,' : '';
        $update_section_query = 
        'UPDATE tbl_sections SET title=:title, tagline=:tagline, body=:body,'.$sql_fragment.' button_text=:button_text, button_link=:button_link WHERE ID = :ID';
        
        $update_section_set = $pdo->prepare($update_section_query);
        $placeholders = array(
            ':title'=> $section['title'],
            ':tagline'=> $section['tagline'],
            ':body'=> $section['body'],
            ':button_text'=> $section['button_text'],
            ':button_link'=> $section['button_link'],
            ":ID"=> (int) $section["ID"]
        );
        // var_dump($section);die;


        // Only bind placeholder when it is used
        if($has_new_image) {
            $placeholders[':image'] = $generated_filename;
        }

        $update_section_result = $update_section_set->execute($placeholders);
            redirect_to('index.php');

    } catch (Exception $e) {
            $err = $e->getMessage();
            return $err;
    }
}

