<?php
require_once '../load.php';
confirm_logged_in();

// ini_set('display_errors', 1);
$all_sections = getAllSections();
$id = $_SESSION['ID'];

$current_section= getSingleSection($id);

if (empty($current_section)) {
    $message = 'Failed to get section info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        'title'=>trim($_POST['title']),
        'body'=> trim($_POST['body']),
        'image'=> trim($_FILES['image']),
        'page_id'=> trim($_POST['page_id']),
        'tagline'=> trim($_POST['tagline']),
        'alt_text'=> trim($_POST['alt_text']),
        'component_type'=> trim($_POST['component_type']),
        'section_id'=> trim($_POST['section_id']),
        'section_order'=> trim($_POST['section_order']),
        'is_overview'=> trim($_POST['is_overview']),
        'ID'     => trim($_POST['current_section_id'])
        
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
    <form action="admin_editsections.php" method="post">
        <?php while ($section_info = $current_section->fetch(PDO::FETCH_ASSOC)): ?>
            <input style="display: none;" type="text" id="current_section_id" name="current_section_id" value="<?php echo $id?>">

            <label for="title">Title:</label><br>
            <input id="title" type="text" name="title" value="<?php echo $section_info['title']; ?>"><br><br>

            <label for="body">Body:</label><br>
            <textarea id="body" name="body" value="<?php echo $section_info['body']; ?>"></textarea><br><br>

            <label for="image">Image:</label><br>
            <input id="image" type="file" name="image" value=""><br><br>

            <label for="page_id">Page ID:</label><br>
            <input id="page_id" type="text" name="page_id" value="<?php echo $section_info['page_id']; ?>"><br><br>

            <label for="tagline">Tagline:</label><br>
            <textarea id="tagline"  name="tagline" value="<?php echo $section_info['tagline']; ?>"></textarea><br><br>

            <label for="alt_text">All text:</label><br>
            <textarea id="alt_text" name="alt_text" value="<?php echo $section_info['all_text']; ?>"></textarea><br><br>

            <label for="component_type">Component type:</label><br>
            <input id="component_type" type="text" name="component_type" value="<?php echo $section_info['component_type']; ?>">
           
            <label for="button_text">Button text:</label><br>
            <input id="button_text" type="text" name="button_text" value="<?php echo $section_info['button_text']; ?>"><br><br>

            <label for="section_id">Section Name:</label><br>
            <input id="section_id" type="text" name="section_id" value="<?php echo $section_info['section_id']; ?>"><br><br>

            <label for="section_order">Section order:</label><br>
            <input id="section_order" type="text" name="section_order" value="<?php echo $section_info['section_order']; ?>"><br><br>

            <label for="is_overview">is overview:</label><br>
            <input id="is_overview" type="text" name="is_overview" value="<?php echo $section_info['is_overview']; ?>"><br><br>
            
            <button type="submit" name="submit">Update Section</button>

        <?php endwhile;?>
    </form>
    <?php endif;?>

    <a href="index.php">Back</a>
</body>
</html>