<?php
require_once('../vendor/autoload.php');
require_once('../config.php');

\Cloudinary::config($CloudinaryConfig);

$options = [
    folder => "photos/",
    public_id => "senphoto", 
    overwrite => true, 
]; 

if (is_uploaded_file($_FILES['upfile']['tmp_name'])) {
    $result = print_r(\Cloudinary\Uploader::upload($_FILES['upfile']['tmp_name'],$options), true);
}


?>
<!DOCTYPE html>
<html>
<body>
<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upfile"><br>
    <input type="submit" value="Upload" name="submit">
</form>
<pre>
<?=$result?>
</pre>
<a href="./list.php">list</a>
</body>
</html>
