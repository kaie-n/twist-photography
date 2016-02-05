<?php
include('connect.php');
// check album cover
if (isset($_FILES["album_cover"])) {
    $errors    = array();
    $file_name = $_FILES["album_cover"]['name'];
    $file_size = $_FILES["album_cover"]['size'];
    $file_tmp  = $_FILES["album_cover"]['tmp_name'];
    $file_type = $_FILES["album_cover"]['type'];
    $value1 = explode('.', $_FILES["album_cover"]['name']);
    $value2 = end($value1);
    $file_ext  = strtolower($value2);
    
    $expensions = array(
        "jpeg",
        "jpg",
        "png"
    );
    
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if ($file_size > 2097152) {
        $errors[] = 'Album cover file size must be below 2 MB';
    }
    
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
        $album_cover    = "img/portfolio/" . $file_name;
        $_GET["result"] = "success";
    } else {
        $_GET["result"] = "failed";
    }
}
//check album photos
if (isset($_FILES["album_photos"])) {
    $file_ary = reArrayFiles($_FILES['album_photos']);
    
    foreach ($file_ary as $file) {
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp  = $file['tmp_name'];
        $file_type = $file['type'];
        $value1 = explode('.', $file_name);
        $value2 = end($value1);
        $file_ext  = strtolower($value2);
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if ($file_size > 2097152) {
            $errors[] = $file_name . ' is too large. File size must be below 2 MB';
        }
    }
    foreach ($file_ary as $file) {
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp  = $file['tmp_name'];
        $file_type = $file['type'];
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
            $album_photos[] = "img/portfolio/" . $file_name;
            
        } else {
            
        }
    }

   $title = $_POST["title"];
   $category = $_POST["category"];
   $description = $_POST["description"];


// upload the portfolio data into database
// insert for first sql query
$sql = "INSERT INTO portfolio (`title`, `category`, `description`, `album_cover`)
VALUES ('$title', '$category', '$description', '$album_cover')";
if (mysqli_query($conn,$sql)) {
    //$_GET["result"] = "success";
} else {
    $_GET["result"] = "failed";
    $errors[] = "Error: " . mysql_error() . "<br>" . $conn->error;
}
foreach($album_photos as $albums){
    $sql2 = "INSERT INTO gallery (`url`, `photos`) VALUES ((SELECT MAX(url) FROM portfolio), '$albums')";
    if (mysqli_query($conn,$sql2)) {
        $_GET["result"] = "success";
    } else {
        $_GET["result"] = "failed";
        $errors[] = "Error: " . mysql_error() . "<br>" . $conn->error;
    }
}

}


function reArrayFiles(&$file_post)
{
    
    $file_ary   = array();
    $file_count = count($file_post['name']);
    $file_keys  = array_keys($file_post);
    
    for ($i = 0; $i < $file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }
    
    return $file_ary;
}
?>