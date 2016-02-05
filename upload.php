<?php
// check album cover
if (isset($_FILES["album_cover"])) {
    $errors    = array();
    $file_name = $_FILES["album_cover"]['name'];
    $file_size = $_FILES["album_cover"]['size'];
    $file_tmp  = $_FILES["album_cover"]['tmp_name'];
    $file_type = $_FILES["album_cover"]['type'];
    $file_ext  = strtolower(end(explode('.', $_FILES["album_cover"]['name'])));
    
    $expensions = array(
        "jpeg",
        "jpg",
        "png"
    );
    
    if (in_array($file_ext, $expensions) === false) {
        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    }
    
    if ($file_size > 2097152) {
        $errors[] = 'File size must be below 2 MB';
    }
    
    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
        $album_cover    = "img/portfolio/" . $file_name;
        $_GET["result"] = "success";
    } else {
        $_GET["result"] = "failed";
    }
}

if (isset($_FILES["album_photos"])) {
    $file_ary = reArrayFiles($_FILES['album_photos']);
    
    foreach ($file_ary as $file) {
        $file_name = $file['name'];
        $file_size = $file['size'];
        $file_tmp  = $file['tmp_name'];
        $file_type = $file['type'];
        $file_ext  = strtolower(end(explode('.', $file['name'])));
        if (in_array($file_ext, $expensions) === false) {
            $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if ($file_size > 2097152) {
            $errors[] = 'File size must be below 2 MB';
        }
        
        if (empty($errors) == true) {
            move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
            $album_cover    = "img/portfolio/" . $file_name;
            $_GET["result"] = "success";
        } else {
            $_GET["result"] = "failed";
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