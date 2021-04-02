<?php
require_once '../load.php';


$all_sectiontexts = getAllSectionTexts();
$id = $_SESSION['ID']??2;


if(isset($_GET['ID'])) {
    $id = $_GET['ID'];
}

$current_sectiontext = getSingleSectionText($id);

if (empty($current_sectiontext)) {
    $message = 'Failed to get sectiontext info!';
}

if (isset($_POST['submit'])) {
    $data = array(
        
        'title'   => trim($_POST['title']),      
        'body'      => trim($_POST['body']),   
        'tagline'      => trim($_POST['tagline']),     
        'id'         => trim($_POST['current_section_id'])
    );

    $message = editSectionText($data);
}
?>

<?php include  './admin_head.php';?>
<body class="admin">
    <h2 class="loginTitle">Edit Section Text</h2>
    <?php echo !empty($message) ? $message : ''; ?>
 
        <form class="adminform" action="admin_editsectiontext.php" method="get">
            <label for="ID">Selected Section</label>
            <select name="ID" id="ID">
                <?php foreach ($all_sectiontexts as $sectiontext): ?>
                    <option value="<?php echo $sectiontext["ID"] ?>" <?php echo $sectiontext["ID"] === $id ?"selected":"" ?>>
                        <?php echo $sectiontext["section_id"] ?>
                    </option>
                <?php endforeach ?>        
            </select>
            <button type="submit" name="submit">Select Section Text</button>
        </form>  
        <hr>
    

    <?php if (!empty($current_sectiontext)): ?>
    <form class="adminform" action="admin_editsectiontext.php" method="post">
        <?php while ($sectiontext_info = $current_sectiontext->fetch(PDO::FETCH_ASSOC)): ?>
            <input style="display: none;" type="text" id="current_section_id" name="current_section_id" value="<?php echo $id?>">
            
           
            <label for="title">Title:</label><br>
            <input id="title" type="text" name="title" value="<?php echo $sectiontext_info['title']; ?>"><br><br>

            <label for="tagline">Tagline:</label><br>
            <input id="tagline" type="text" name="tagline" value="<?php echo $sectiontext_info['tagline']; ?>"><br><br>

            <label for="body">Section Text:</label><br>
            <textarea id="body" type="text" name="body" value="<?php echo $sectiontext_info['body']; ?>"></textarea><br><br>
            
            <button type="submit" name="submit">Update Section</button>
        <?php endwhile;?>
    </form>
    <?php endif;?>
    <a href="index.php">Back</a>
</body>
</html>