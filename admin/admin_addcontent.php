<?php 
require_once '../load.php';

confirm_logged_in();

if (isset($_POST['submit'])) {
  
    $data = array(
        'image'=>$_FILES['image'],
        'title'=>$_POST['title'],
        'body'=>$_POST['body'],
        'tagline'=>$_POST['tagline'],
        'all_text'=>$_POST['all_text']
        
    );

    $message = addContent($data);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Content</title>
</head>
<body>
<h2>Add Content</h2>
<?php echo !empty($message) ? $message : ''; ?>
    
    <form action="admin_addcontent.php" method="post" enctype="multipart/form-data">
        
        <label for="title">Section Title:</label><br>
        <input id="title" type="text" name="title" value=""><br><br>

        <label for="body">Content's body:</label><br>
        <input id="body" type="text" name="body" value=""><br><br>

        <label for="image">Image:</label><br>
        <input id="image" type="file" name="image" value=""><br><br>

        <!-- Do we need this one? I think we need to create an additional tbl -->
        <!-- <label for="page_id">Page id:</label><br>
        <input id="page_id" type="text" name="run" value=""><br><br> -->

        <label for="tagline">Tagline:</label><br>
        <input id="tagline" type="text" name="tagline" value=""><br><br>

        <!-- What is the purpose of this one? -->
        <label for="all_text">All text:</label><br>
        <input id="all_text" type="text" name="all_text" value=""><br><br>

       
        <button type="submit" name="submit">Add Content</button>
    </form>
</body>
</html>