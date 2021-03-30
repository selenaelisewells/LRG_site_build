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

function getSectionsbyPages($path) {
    $pdo = Database::getInstance()->getConnection();
  

    $query = 'SELECT sections.*, pages.path FROM `tbl_sections` as sections LEFT JOIN tbl_pages as pages ON sections.page_id = pages.ID WHERE pages.path = :path AND sections.is_overview = false';
    $statement = $pdo->prepare($query);
    $statement->bindParam(':path', $path);
    $statement->execute();

    if(!$statement) {
        echo "\PDO::errorInfo():\n";
        print_r($pdo->errorInfo());
        die;
    }
    
    return $statement;
}

function getOverviewbyPages($path) {
    $pdo = Database::getInstance()->getConnection();
  

    $query = 'SELECT sections.*, pages.path FROM `tbl_sections` as sections LEFT JOIN tbl_pages as pages ON sections.page_id = pages.ID WHERE pages.path = :path AND sections.is_overview = true';
    $statement = $pdo->prepare($query);
    $statement->bindParam(':path', $path);
    $statement->execute();

    if(!$statement) {
        echo "\PDO::errorInfo():\n";
        print_r($pdo->errorInfo());
        die;
    }
    
    return $statement;
}

