<?php

use Aws\S3\Exception\S3Exception;

require_once __DIR__ . '/start.php';

if (isset($_FILES['file'])) {

    $file = $_FILES['file'];

    //
    $name = $file['name'];
    $tmp_name =$file['tmp_name'];

    $extension = explode('.', $name);
    $extension = strtolower(end($extension));
    //
    $key = md5(uniqid());
    $tmp_file_name = "{$key}.{$extension}";
    $tmp_file_path = "gallery-images/{$tmp_file_name}";

    move_uploaded_file($tmp_name, $tmp_file_path);

    try{

        $s3->putObject([
            'Bucket' => $config['s3']['bucket'],
            'Key' => 'uploads/' . $name,
            'Body' => fopen($tmp_file_path, 'rb'),
            'ACL' => 'public-read'
        ]);

        //Remove file depois do upload para S3
       #unlink($tmp_file_path);
       header("Location: gallery.php?uploadsuccess");
    }catch (S3Exception $e){
        die ("  " . $e);
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <h2> Please choose a pic to upload to the gallery</h2>
        <meta charset="UTF-8">
        <title>UPLOAD</title>
    </head>
    <body>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit">
        </form>
    </body>
</html>

