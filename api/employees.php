<?php 
function getEmployees() {
    $pdo = Database::getInstance()->getConnection();
  

    $query = 'SELECT * FROM `tbl_employees`';
    $statement = $pdo->prepare($query);    
    $statement->execute();

    if(!$statement) {
        echo "\PDO::errorInfo():\n";
        print_r($pdo->errorInfo());
        die;
    }
    
    return $statement;
}
