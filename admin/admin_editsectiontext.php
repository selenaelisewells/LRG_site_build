<?php
require_once '../load.php';
confirm_logged_in();
$all_sectiontexts = getAllSectionTexts();
// $id           = $_SESSION['ID']??1;


// if(isset($_GET['ID'])) {
//     $id = $_GET['ID'];
// }

$current_sectiontext = getSingleSectionText($id);

if (empty($current_sectiontext)) {
    $message = 'Failed to get sextiontext info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        'title'      => trim($_POST['title']),
        'body'   => trim($_POST['body']),        
        'id'         => trim($_POST['current_ID'])
    );

    $message = editSectionText($data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Section Text</title>
</head>
<body>
    <h2>Edit Section Text</h2>
    <?php echo !empty($message) ? $message : ''; ?>
    
        <form action="admin_editsectiontext.php" method="get">
            <label for="ID">Selected Section</label>
            <select name="ID" id="ID">
                <?php foreach ($all_sectiontexts as $sectiontext): ?>
                    <option value="<?php echo $sectiontext["ID"] ?>" <?php echo $sectiontext["ID"] === $id ?"selected":"" ?>>
                        <?php echo $sectiontext["section_id"] ?>
                    </option>
                <?php endforeach ?>        
            </select>
            <button type="submit" name="submit">Select Section</button>
        </form>  
        <hr>
   

    <?php if (!empty($current_sectiontext)): ?>
    <form action="admin_editsectiontext.php" method="post">
        <?php while ($sectiontext_info = $current_sectiontext->fetch(PDO::FETCH_ASSOC)): ?>
            <input style="display: none;" type="text" id="current_ID" name="current_ID" value="<?php echo $id?>">
            
            <label for="title">Title:</label><br>
            <input id="title" type="text" name="title" value="<?php echo $sectiontext_info['title']; ?>"><br><br>

            <label for="body">Body:</label><br>
            <textarea id="body" name="body" value="<?php echo $sectiontext_info['body']; ?>"></textarea><br><br>
                      
            <button type="submit" name="submit">Update Section</button>
        <?php endwhile;?>
    </form>
    <?php endif;?>

    <a href="index.php">Back</a>
</body>
</html>