<?php 
require_once '../load.php';

confirm_logged_in();

if (isset($_POST['submit'])) {
    
    $data = array(  
        'title'=>$_POST['title'],
        'body'=>$_POST['body'],
        'image'=>$_FILES['image'],
        'page_id'=>$_POST['page_id'],
        'tagline'=>$_POST['tagline'],
        'alt_text'=>$_POST['alt_text'],
        'component_type'=>$_POST['component_type'],
        'button_text'=>$_POST['button_text'],
        'button_link'=>$_POST['button_link'],
        'section_id'=>$_POST['section_id'],
        'section_order'=>$_POST['section_order'],
        'is_overview'=>$_POST['is_overview']
             
    );

    $message = addSection($data);
}
?>
<?php include  './admin_head.php';?>
<body class="admin">
    <h2 class="loginTitle">Add Section</h2>
    <?php echo !empty($message) ? $message : ''; ?>
    
    <form class="adminform" action="admin_addsections.php" method="post" enctype="multipart/form-data">

        <label for="title">Title:</label><br>
        <input id="title" type="text" name="title" value=""><br><br>

        <label for="body">Body:</label><br>
        <textarea id="body" name="body" value=""></textarea><br><br>

        <label for="image">Image:</label><br>
        <input id="image" type="file" name="image" value=""><br><br>

        <label for="page_id">Page ID:</label><br>
        <input id="page_id" type="number" name="page_id" value=""><br><br>

        <label for="tagline">Tagline:</label><br>
        <textarea id="tagline"  name="tagline" value=""></textarea><br><br>

        <label for="alt_text">Alt text:</label><br>
        <input id="alt_text" name="alt_text" value=""><br><br>

        <label for="component_type">Component type:</label><br>
            <select id="component_type" name="component_type">
                <option value="white">white</option>
                <option value="black">black</option>
            </select><br><br>
      
        <label for="button_text">Button text:</label><br>
        <input id="button_text" type="text" name="button_text" value=""><br><br>

        <label for="button_link">Button link:</label><br>
        <input id="button_link" type="text" name="button_link" value=""><br><br>

        <label for="section_id">Section Name:</label><br>
        <input id="section_id" type="text" name="section_id" value=""><br><br>

        <label for="section_order">Section order:</label><br>
        <input id="section_order" type="number" name="section_order" value=""><br><br>

        <label for="is_overview">is overview:</label><br>
        <input id="is_overview" type="checkbox" name="is_overview" value=""><br><br>
        
        <button type="submit" name="submit">Add Section</button>
    </form>

    <a href="index.php">Back</a>
</body>
</html>