<?php
function addContent($content)
{
    try {
        
        # 1. Connect to the DB
        $pdo = Database::getInstance()->getConnection();

        # 2. Validate the uploaded file
        $image        = $content['image'];
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpe', 'jpeg', 'png', 'svg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file types!');
        }

        # 3. Move the uploaded file around (move the file from the tmp path to the /images)
        $image_path         = '../images/';
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $target_path        = $image_path . $generated_filename;
        if (!move_uploaded_file($image['tmp_name'], $target_path)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        // ##(optional) Auto convert user uploads to .webp format
        // if (extension_loaded('gd')) {
        //     switch ($upload_file['extension']) {
        //         case 'jpg':
        //             $upload_source = imagecreatefromjpeg($target_path);
        //             break;

        //         case 'jpeg':
        //             $upload_source = imagecreatefromjpeg($target_path);
        //             break;
                    
        //         case 'png':
        //             $upload_source = imagecreatefrompng($target_path);
        //             break;

        //         case 'gif':
        //             $upload_source = imagecreatefromgif($target_path);
        //             break;
        //     }

        //     $convert_webp_result = imagewebp($upload_source, $image_path . $generated_name . '.webp');
        // }

        # Generate an thumbnail from the original image
        $th_copy = $image_path . 'TH_' . $image['name'];
        if (!copy($target_path, $th_copy)) {
            throw new Exception('Whoooops, that thumbnail copy did not work!!');
        }

        # 4. Insert into DB (tbl_sections)
        $insert_content_query = 'INSERT INTO tbl_sections(title, body, image, tagline, all_text)';
        $insert_content_query .= ' VALUES(title, body, image, tagline, all_text)';
        $insert_content        = $pdo->prepare($insert_content_query);
        $insert_content_result = $insert_content->execute(
            array(
                'image'   => $generated_filename,
                'title'   => $content['title'],
                'body'    => $content['body'],
       
                'tagline'   => $content['tagline'],
                'all_text'   => $content['all_text']
                
            )
        );

        // ## Only when the insert went through, we add the newly created movie to the proper genre
        // $last_updated_id = $pdo->lastInsertId();
        // if (!empty($last_updated_id) && $insert_movie_result) {
        //     $update_genre_query = 'INSERT INTO tbl_mov_genre(movies_id, genre_id) VALUES (:movies_id, :genre_id)';
        //     $update_genre       = $pdo->prepare($update_genre_query);
        //     $update_genre->execute(
        //         array(
        //             ':movies_id' => $last_updated_id,
        //             ':genre_id'  => $movie['genre'],
        //         )
        //     );
        // }

        # 5. If all of above works, redirect user to index.php
        redirect_to('index.php');
    } catch (Exception $e) {
        # Return a error message
        $error = $e->getMessage();
        return $error;
    }

}

function getAllContentForDelete(){
    $pdo = Database::getInstance()->getConnection();

    $get_content_query = 'SELECT * FROM tbl_sections';
    $contents = $pdo->query($get_content_query);

    if($contents){
        return $contents;
    }else{
        return false;
    }
}

function deleteContent($content_id){
    $pdo = Database::getInstance()->getConnection();
    $delete_content_query = 'DELETE FROM tbl_sections WHERE ID = ID';
    $delete_content_set = $pdo->prepare($delete_content_query);
    $delete_content_result = $delete_content_set->execute(
        array(
            'ID'=>$content_id
        )
    );

    if($delete_content_result && $delete_content_set->rowCount()>0){
        redirect_to('admin_deletecontent.php');
    }else{
        return false;
    }
}


