<?php

// function getSingleSection($id)
// {
//     $pdo = Database::getInstance()->getConnection();

//     $get_section_query = 'SELECT * FROM tbl_sections WHERE ID = :ID';
//     $get_section_set   = $pdo->prepare($get_section_query);
//     $results        = $get_section_set->execute(
//         array(
//             ':ID' => $id,
//         )
//     );

//     if ($results && $get_section_set->rowCount()) {
//         return $get_section_set;
//     } else {
//         return false;
//     }
// }

// function  getAllSections(){
//     $pdo = Database::getInstance()->getConnection();

//     $get_section_query = 'SELECT * FROM tbl_sections';
//     $sections = $pdo->query($get_section_query);

//     if($sections){
//         return $sections;
//     }else{
//         return false;
//     }
// }



function editSection($section_data)
{
 
    $pdo = Database::getInstance()->getConnection(); 

    $update_section_query = 
        'UPDATE tbl_sections SET title=:title, body=:body WHERE ID = :ID';
    
    $update_section_set = $pdo->prepare($update_section_query);
    $placeholders = array(
        ":title"    =>$section_data["title"],
        ":body" =>$section_data["body"],
        ":ID"=>$section_data["ID"]
    );
 

    $update_section_result = $update_section_set->execute($placeholders);

    if($update_section_result){
        $_SESSION['ID'] = $section_data['ID'];
     
        redirect_to('index.php');
    }else{
        return 'Update did not go through.';
    }
}
