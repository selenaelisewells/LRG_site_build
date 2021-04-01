<?php
require_once '../load.php';
confirm_logged_in();

$all_sections = getAllSectionsForCMS();
$id = 2;

// Initialize session variable
if(!isset($_SESSION['ID'])) {
    $_SESSION['ID']= $id;
}

if(isset($_GET['ID'])) {
    $id = $_GET['ID'];
    // Update Session variable based of new value
    $_SESSION['ID'] = $id;
}

$current_section= getSingleSectionForCMS($id);

if (empty($current_section)) {
    $message = 'Failed to get section info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        'title'=>trim($_POST['title']),
        'body'=> trim($_POST['body']),
        'image'=> $_FILES['image'], 
        'button_text'=> trim($_POST['button_text']),
        'button_link'=> trim($_POST['button_link']),
        'ID'     => trim($_POST['current_ID'])
        
    );

    $message = editSection($data);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sections</title>
</head>
<body>
    <h2>Edit Sections</h2>
    <?php echo !empty($message) ? $message : ''; ?>

        <form action="admin_editsections.php" method="get">
            <label for="ID">Selected Section</label>
            <select name="ID" id="ID">
                <?php foreach ($all_sections as $section): ?>
                    <option value="<?php echo $section["ID"] ?>" <?php echo $section["ID"] === $id ?"selected":"" ?>>
                        <?php echo $section["section_id"] ?>
                    </option>
                <?php endforeach ?>        
            </select>
            <button type="submit" name="submit">Select Section</button>
        </form>  
        <hr>
    

    <?php if (!empty($current_section)): ?>
    <form action="admin_editsections.php" method="post"  enctype="multipart/form-data">
        <?php while ($section_info = $current_section->fetch(PDO::FETCH_ASSOC)): ?>
            <input style="display: none;" type="text" id="current_ID" name="current_ID" value="<?php echo $id?>">

            <label for="title">Title:</label><br>
            <input id="title" type="text" name="title" value="<?php echo $section_info['title']; ?>"><br><br>

            <label for="body">Body:</label><br>
            <textarea id="body" name="body"><?php echo $section_info['body']; ?></textarea><br><br>

            <label for="image">Image:</label><br>
            <input id="image" type="file" name="image" value=""><br><br>

            <label for="button_text">Button text:</label><br>
            <input id="button_text" type="text" name="button_text" value="<?php echo $section_info['button_text']; ?>"><br><br>

            <label for="button_link">Button link:</label><br>
            <input id="button_link" type="text" name="button_link" value="<?php echo $section_info['button_link']; ?>"><br><br>
            
            <button type="submit" name="submit">Update Section</button>

        <?php endwhile;?>
    </form>
    <?php endif;?>

    <a href="index.php">Back</a>
</body>
</html>