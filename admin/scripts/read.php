<?php

// function getAllSections()
// {
//     $pdo      = Database::getInstance()->getConnection();
//     $queryAll = "SELECT * FROM tbl_sections";
//     $runAll   = $pdo->query($queryAll);
//     $sections   = $runAll->fetchAll(PDO::FETCH_ASSOC);

//     if ($sections) {
//         return $sections;
//     } else {
//         return 'There was a problem accessing this info';
//     }
// }

// function getSingleSection($id)
// {
//     $pdo = Database::getInstance()->getConnection();
    
//     $querySingle = 'SELECT * FROM tbl_sections WHERE ID = "' . $id . '"';
//     $runSingle   = $pdo->query($querySingle);

//     if ($runSingle) {
//         $section = $runSingle->fetch(PDO::FETCH_ASSOC);
//         return $section;
//     } else {
//         return 'There was a problem to fetch single section for ' . $id;
//     }
// }

// function getSectionsbyPages($page) {
//     $pdo = Database::getInstance()->getConnection();
  
//     $query = 'SELECT *, GROUP_CONCAT(g.genre_name) AS genre_name FROM tbl_movies m';
//     $query.= ' LEFT JOIN tbl_mov_genre link ON link.movies_id = m.movies_id'; 
//     $query.= ' LEFT JOIN tbl_genre g ON link.genre_id = g.genre_id';
//     $query.= ' GROUP BY m.movies_id HAVING genre_name LIKE "%'.$genre.'%"';

//     $runQuery = $pdo->query($query);
//     if ($runQuery){
//         $sections = $runQuery->fetchAll(PDO::FETCH_ASSOC);
//         return $sections;
//     } else{
//         return 'There was a problem fetching by the page'.$page;
//     }
// }
