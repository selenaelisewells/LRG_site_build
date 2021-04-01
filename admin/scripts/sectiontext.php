<?php

function getSingleSectionText($id)
{
    $pdo = Database::getInstance()->getConnection();

    $get_sectiontext_query = 'SELECT * FROM tbl_sections WHERE ID = :ID';
    $get_sectiontext_set   = $pdo->prepare($get_sectiontext_query);
    $results        = $get_sectiontext_set->execute(
        array(
            ':ID' => $id,
        )
    );

    if ($results && $get_sectiontext_set->rowCount()) {
        return $get_sectiontext_set;
    } else {
        return false;
    }
}

function  getAllSectionTexts()
{
    $pdo = Database::getInstance()->getConnection();

    $get_sectiontext_query = 'SELECT * FROM tbl_sections';
    $sectiontexts = $pdo->query($get_sectiontext_query);

    if($sectiontexts){
        return $sectiontexts;
    }else{
        return false;
    }
}


function editSectionText($section_text)
{
 
    $pdo = Database::getInstance()->getConnection(); 

    $update_sectiontext_query = 
        'UPDATE tbl_sections SET title=:title, body=:body WHERE ID = :id';
    // var_dump($update_user_query); die;
    $update_sectiontext_set = $pdo->prepare($update_sectiontext_query);
    $placeholders = array(
        ":title"    =>$section_text["title"],
        ":body" =>$section_text["body"],
        ":id"=>$section_text["id"]
    );

    $update_sectiontext_result = $update_sectiontext_set->execute($placeholders);

    if($update_sectiontext_result){
        $_SESSION['title'] = $section_text['title'];
   
        redirect_to('index.php');
    }else{
        return 'Update did not go through.';
    }
}


