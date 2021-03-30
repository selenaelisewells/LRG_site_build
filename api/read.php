<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// include database and object files
include_once '../config/database.php';
include_once './sections.php';

// instantiate database and movie object
$database = Database::getInstance();
$db       = $database->getConnection();


// query sections
if (isset($_GET['path'])) {
    $path = $_GET['path'];

    if(isset($_GET['overview'])) {
        $stmt = getOverviewbyPages($path);
    } else {
        $stmt = getSectionsbyPages($path);
    }
}  
else {
    echo json_encode(
        array(
            "message" => "ITS FUCKED",
        )
    );
}
// var_dump($stmt);die;
// print_r($stmt);die;
$num = $stmt->rowCount();
// var_dump($num);die;
// check if more than 0 record found
if ($num > 0) {

    // movies array
    $results = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $single_section = $row;
        $results[]    = $single_section;
    }

    //TODO:chat about JSON_PRETTY_PRINT vs not
    echo json_encode($results, JSON_PRETTY_PRINT);
} else {
    echo json_encode(
        array(
            "message" => "No sections found.",
        )
    );
}
