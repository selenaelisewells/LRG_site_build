<?php

function getAllSections()
{
    $pdo      = Database::getInstance()->getConnection();
    $queryAll = "SELECT * FROM tbl_sections";
    $runAll   = $pdo->query($queryAll);
    $sections   = $runAll->fetchAll(PDO::FETCH_ASSOC);

    if ($sections) {
        return $sections;
    } else {
        return 'There was a problem accessing this info';
    }
}

function getSingleSection($id)
{
    $pdo = Database::getInstance()->getConnection();
    
    $querySingle = 'SELECT * FROM tbl_sections WHERE ID = "' . $id . '"';
    $runSingle   = $pdo->query($querySingle);

    if ($runSingle) {
        $section = $runSingle->fetch(PDO::FETCH_ASSOC);
        return $section;
    } else {
        return 'There was a problem to fetch single section for ' . $id;
    }
}

function getSectionsbyPages($page) {
    $pdo = Database::getInstance()->getConnection();
  
    $query = 'SELECT * FROM `tbl_sections` ';
    $query.= ' LEFT JOIN tbl_pages ON tbl_sections.page_id = tbl_pages.ID'; 
    // $query.= ' GROUP BY page_id;'

    $runQuery = $pdo->query($query);
    if ($runQuery){
        $sections = $runQuery->fetchAll(PDO::FETCH_ASSOC);
        return $sections;
    } else{
        return 'There was a problem fetching by the page'.$page;
    }
}
