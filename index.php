<?php
error_reporting(0);
$target_dir = "uploads/";
$max_size = 5000000;
$log = "";
$files = $_FILES["files"];
for ($i=0; $i < count($files["name"]); $i++) {
    $target_file = $target_dir . basename($files["name"][$i]);
    $log .= $i+1 . ". Uploading ". basename($files["name"][$i]). " ...<br>";
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if file already exists
    if (file_exists($target_file)) {
        $log .= "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }
    // Check file size
    if ($files["size"][$i] > $max_size) {
        $log .= "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $log .= "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($files["tmp_name"][$i], $target_file)) {
            $log .= "++ ". basename( $files["name"][$i]). " has been uploaded -> ". $target_file. "<br>";
        } else {
            $log .= "Sorry, there was an error uploading your file.<br>";
        }
    }
    $log .= "<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>files-tunnel</title>
</head>
<body>
    <div>
        <?php echo $log ?>
    </div>
    <form method="post" enctype="multipart/form-data">
        Files to upload:
        <input type="file" name="files[]" id="files" multiple><br>
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>
