<?php
require_once '../load.php';
confirm_logged_in();

// ini_set('display_errors', 1);
$all_sections = getAllSections();
$id = $_SESSION['ID'];



$current_section= getSingleSection($id);

if (empty($current_section)) {
    $message = 'Failed to get section text info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        'title'      => trim($_POST['title']),
        'body'   => trim($_POST['body']),
        'ID'     => trim($_POST['current_section_id'])
        
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
    <title>Edit Body Text</title>
</head>
<body>
    <h2>Edit Section Body Text</h2>
    <?php echo !empty($message) ? $message : ''; ?>

        <form action="admin_editsectiontext.php" method="get">
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
            <label for="title">Title</label>
            <input id="title" type="text" name="title" value="<?php echo $section_info['title']; ?>"><br><br>

            <label for="body">Body Text</label>
            <textarea id="body" type="text" name="body" value="<?php echo $section_info['body']; ?>"></textarea><<br><br>

            <button type="submit" name="submit">Update Body Text</button>
        <?php endwhile;?>
    </form>
    <?php endif;?>

    <a href="index.php">Back</a>
</body>
</html>