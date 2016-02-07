<?php
    ini_set("memory_limit", "200000000"); // for large images so that we do not get "Allowed memory exhausted"
    include('connect.php');
    // 1a - Upload a new portfolio function
    if (isset($_POST['submit'])) {
            // setting of variables;    
            $title       = mysqli_real_escape_string($conn, $_POST["title"]);
            $category    = mysqli_real_escape_string($conn, $_POST["category"]);
            $description = mysqli_real_escape_string($conn, $_POST["description"]);
        if (isset($_FILES["album_cover"])) {
            $errors            = array();
            $file_name         = $_FILES["album_cover"]['name'];
            $file_size         = $_FILES["album_cover"]['size'];
            $file_tmp          = $_FILES["album_cover"]['tmp_name'];
            $file_type         = $_FILES["album_cover"]['type'];
            $value1            = explode('.', $_FILES["album_cover"]['name']);
            $value2            = end($value1);
            $file_ext          = strtolower($value2);
            $max_upload_width  = 400;
            $max_upload_height = 289;
            $expensions        = array(
                "jpeg",
                "jpg",
                "png"
            );
            if(file_exists("img/portfolio/" . $file_name)){
                // adding the "title" tag infront of the file name if file existed and rename it
                $rand = substr(md5(microtime()),rand(0,26),5);
                $array_title = explode(' ',trim($title));
                $lower_title = strtolower($array_title[0]);
                $lower_title = $lower_title . "_" . $rand . "_";
                $file_name = $lower_title . $file_name;
            }
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
            }
    
            if ($file_size > 2097152) {
                $errors[] = 'Album cover file size must be below 2 MB';
            }
    
            if (empty($errors) == true) {
                // if uploaded image was JPG/JPEG
                if ($file_type == "image/jpeg" || $file_type == "image/pjpeg") {
                    $image_source = imagecreatefromjpeg($file_tmp);
                }
                // if uploaded image was GIF
                if ($file_type == "image/gif") {
                    $image_source = imagecreatefromgif($file_tmp);
                }
                // BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
                // if uploaded image was BMP
                if ($file_type == "image/bmp") {
                    $image_source = imagecreatefromwbmp($file_tmp);
                }
                // if uploaded image was PNG
                if ($file_type == "image/x-png") {
                    $image_source = imagecreatefrompng($file_tmp);
                }
    
    
                $remote_file = "img/portfolio/" . $file_name;
    
                imagejpeg($image_source, $remote_file, 100);
                chmod($remote_file, 0644);
    
    
    
                // get width and height of original image
                list($image_width, $image_height) = getimagesize($remote_file);
    
                if ($image_width > $max_upload_width || $image_height > $max_upload_height) {
                    $proportions = $image_width / $image_height;
    
                    if ($image_width > $image_height) {
                        $new_width  = $max_upload_width;
                        $new_height = round($max_upload_width / $proportions);
                    } else {
                        $new_height = $max_upload_height;
                        $new_width  = round($max_upload_height * $proportions);
                    }
    
    
                    $new_image    = imagecreatetruecolor($new_width, $new_height);
                    $image_source = imagecreatefromjpeg($remote_file);
    
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagejpeg($new_image, $remote_file, 100);
                    imagedestroy($new_image);
                }
    
    
                imagedestroy($image_source);
                //move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
                $album_cover = "img/portfolio/" . $file_name;
            } else {
                $_GET["result"] = "failed";
            }
        }
        //check album photos
        if (isset($_FILES["album_photos"])) {
            $file_ary      = reArrayFiles($_FILES['album_photos']);
            $album_photos  = array();
            $album_photos2 = array();
            foreach ($file_ary as $file) {
                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_tmp  = $file['tmp_name'];
                $file_type = $file['type'];
                $value1    = explode('.', $file_name);
                $value2    = end($value1);
                $file_ext  = strtolower($value2);
    
                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
                }
    
                if ($file_size > 2097152) {
                    $errors[] = $file_name . ' is too large. File size must be below 2 MB';
                }
            }
            $max_upload_width  = 220;
            $max_upload_height = 159;
            foreach ($file_ary as $file) {
                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_tmp  = $file['tmp_name'];
                $file_type = $file['type'];
                if(file_exists("img/portfolio/" . $file_name)){
                    // adding the "title" tag infront of the file name if file existed and rename it
                     $rand = substr(md5(microtime()),rand(0,26),5);
                    $array_title = explode(' ',trim($title));
                    $lower_title = strtolower($array_title[0]);
                    $lower_title = $lower_title . "_" . $rand . "_";
                    $file_name = $lower_title . $file_name;
                }
                if (empty($errors) == true) {
                    $album_photos[]  = "img/portfolio/" . $file_name;
                    $album_photos2[] = "img/portfolio/thumbs/" . $file_name;
    
    
                    // if uploaded image was JPG/JPEG
                    if ($file_type == "image/jpeg" || $file_type == "image/pjpeg") {
                        $image_source = imagecreatefromjpeg($file_tmp);
                    }
                    // if uploaded image was GIF
                    if ($file_type == "image/gif") {
                        $image_source = imagecreatefromgif($file_tmp);
                    }
                    // BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
                    // if uploaded image was BMP
                    if ($file_type == "image/bmp") {
                        $image_source = imagecreatefromwbmp($file_tmp);
                    }
                    // if uploaded image was PNG
                    if ($file_type == "image/x-png") {
                        $image_source = imagecreatefrompng($file_tmp);
                    }
    
                    $remote_file = "img/portfolio/thumbs/" . $file_name;
    
                    imagejpeg($image_source, $remote_file, 100);
                    chmod($remote_file, 0644);
    
                    // get width and height of original image
                    list($image_width, $image_height) = getimagesize($remote_file);
    
                    if ($image_width > $max_upload_width || $image_height > $max_upload_height) {
                        $proportions = $image_width / $image_height;
    
                        if ($image_width > $image_height) {
                            $new_width  = $max_upload_width;
                            $new_height = round($max_upload_width / $proportions);
                        } else {
                            $new_height = $max_upload_height;
                            $new_width  = round($max_upload_height * $proportions);
                        }
    
    
                        $new_image    = imagecreatetruecolor($new_width, $new_height);
                        $image_source = imagecreatefromjpeg($remote_file);
    
                        imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                        imagejpeg($new_image, $remote_file, 100);
                        imagedestroy($new_image);
                    }
    
    
                    imagedestroy($image_source);
                    move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
                    //copy("img/portfolio/" . $file_name, "img/portfolio/thumbs/" . $file_name);
                } else {
    
                }
            }
    
    
            // upload the portfolio data into database
            // insert for first sql query
            if (empty($errors) == true) {
            $sql = "INSERT INTO portfolio (`title`, `category`, `description`, `album_cover`) VALUES ('$title', '$category', '$description', '$album_cover')";
            if (mysqli_query($conn, $sql)) {
                //$_GET["result"] = "success";
            } else {
                $_GET["result"] = "failed";
                $errors[]       = "Error: " . mysql_error() . "<br>" . $conn->error;
            }
            $_number = 0;
            foreach ($album_photos as $albums) {
                $port1 = $albums;
                $port2 = $album_photos2[$_number];
                $sql2  = "INSERT INTO gallery (`url`, `photos`, `thumbs`) VALUES ((SELECT MAX(url) FROM portfolio), '$port1', '$port2')";
                if (mysqli_query($conn, $sql2)) {
                    $_GET["result"] = "success";
                } else {
                    $_GET["result"] = "failed";
                    $errors[]       = "Error: " . mysql_error() . "<br>" . $conn->error;
                }
                $_number++;
            }
            }
        }
    }
    // 1b - End of upload a new Portfolio
    // 2a - Remove Promotions picture
    if (isset($_POST['remove-promo'])) {
        $_blank = '';
        removePromo();
    }
    // 2b - Updating of Promotion picture
    if (isset($_POST['update-promo'])){
           if (isset($_FILES["promo"])) {
            $errors            = array();
            $file_name         = $_FILES["promo"]['name'];
            $file_size         = $_FILES["promo"]['size'];
            $file_tmp          = $_FILES["promo"]['tmp_name'];
            $file_type         = $_FILES["promo"]['type'];
            $value1            = explode('.', $_FILES["promo"]['name']);
            $value2            = end($value1);
            $file_ext          = strtolower($value2);
            $expensions        = array(
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
                move_uploaded_file($file_tmp, "img/" . $file_name);
                $promo_url = "img/" . $file_name;
                $_blank = $promo_url;
                removePromo();
            } else {
                $empty_promo = FALSE;
                $_GET["promo-result"] = 'failed';
            }
        }
    }
    // 3a - Deleting portfolio and all of their pictures
    if (isset($_POST['remove_portfolio'])){
        deletePhotos();
        removePortfolio();
    }
    // 4a - Editing portfolio
    if (isset($_POST['update-portfolio'])) {
            // setting of variables;  
            $errors            = array();  
            echo empty($errors);
            print_r($_FILES['album_photos']['size']);
            $title       = mysqli_real_escape_string($conn, $_POST["title"]);
            $category    = mysqli_real_escape_string($conn, $_POST["category"]);
            $description = mysqli_real_escape_string($conn, $_POST["description"]);
            $url = mysqli_real_escape_string($conn, $_POST["url"]);
            $expensions        = array(
                "jpeg",
                "jpg",
                "png"
            );
            $image_source = '';

        if (isset($_FILES["album_cover"]) && $_FILES['album_cover']['size'][0] > 0) {
            $file_name         = $_FILES["album_cover"]['name'];
            $file_size         = $_FILES["album_cover"]['size'];
            $file_tmp          = $_FILES["album_cover"]['tmp_name'];
            $file_type         = $_FILES["album_cover"]['type'];
            $value1            = explode('.', $_FILES["album_cover"]['name']);
            $value2            = end($value1);
            $file_ext          = strtolower($value2);
            $max_upload_width  = 400;
            $max_upload_height = 289;
            if(file_exists("img/portfolio/" . $file_name)){
                // adding the "title" tag infront of the file name if file existed and rename it
                $rand = substr(md5(microtime()),rand(0,26),5);
                $array_title = explode(' ',trim($title));
                $lower_title = strtolower($array_title[0]);
                $lower_title = $lower_title . "_" . $rand . "_";
                $file_name = $lower_title . $file_name;
            }
            if (in_array($file_ext, $expensions) === false) {
                $errors[] = $file_name . "'s extension not allowed, please choose a JPEG or PNG file.";
            }
            if ($file_size > 2097152) {
                $errors[] = 'Album cover file size must be below 2 MB';
            }
            if (empty($errors) == true) {
                // if uploaded image was JPG/JPEG
                if ($file_type == "image/jpeg" || $file_type == "image/pjpeg") {
                    $image_source = imagecreatefromjpeg($file_tmp);
                }
                // if uploaded image was GIF
                if ($file_type == "image/gif") {
                    $image_source = imagecreatefromgif($file_tmp);
                }
                // BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
                // if uploaded image was BMP
                if ($file_type == "image/bmp") {
                    $image_source = imagecreatefromwbmp($file_tmp);
                }
                // if uploaded image was PNG
                if ($file_type == "image/x-png") {
                    $image_source = imagecreatefrompng($file_tmp);
                }
                $remote_file = "img/portfolio/" . $file_name;
    
                imagejpeg($image_source, $remote_file, 100);
                chmod($remote_file, 0644);
                // get width and height of original image
                list($image_width, $image_height) = getimagesize($remote_file);
    
                if ($image_width > $max_upload_width || $image_height > $max_upload_height) {
                    $proportions = $image_width / $image_height;
    
                    if ($image_width > $image_height) {
                        $new_width  = $max_upload_width;
                        $new_height = round($max_upload_width / $proportions);
                    } else {
                        $new_height = $max_upload_height;
                        $new_width  = round($max_upload_height * $proportions);
                    }
                    $new_image    = imagecreatetruecolor($new_width, $new_height);
                    $image_source = imagecreatefromjpeg($remote_file);
    
                    imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                    imagejpeg($new_image, $remote_file, 100);
                    imagedestroy($new_image);
                }
                imagedestroy($image_source);
                //move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
                $album_cover = "img/portfolio/" . $file_name;
            } else {
                $_GET["result"] = "failed";
            }
        }
        else{
            $album_cover = $_POST["album_cover_empty"];
        }
        //check album photos
        if (isset($_FILES["album_photos"]) && $_FILES['album_photos']['size'][0] > 0) {
            $file_ary      = reArrayFiles($_FILES['album_photos']);
            $album_photos  = array();
            $album_photos2 = array();
            foreach ($file_ary as $file) {
                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_tmp  = $file['tmp_name'];
                $file_type = $file['type'];
                $value1    = explode('.', $file_name);
                $value2    = end($value1);
                $file_ext  = strtolower($value2);
    
                if (in_array($file_ext, $expensions) === false) {
                    $errors[] = $file_name . "'s extension not allowed, please choose a JPEG or PNG file.";
                }
    
                if ($file_size > 2097152) {
                    $errors[] = $file_name . ' is too large. File size must be below 2 MB';
                }
            }
            $max_upload_width  = 220;
            $max_upload_height = 159;
            foreach ($file_ary as $file) {
                $file_name = $file['name'];
                $file_size = $file['size'];
                $file_tmp  = $file['tmp_name'];
                $file_type = $file['type'];
                if(file_exists("img/portfolio/" . $file_name)){
                    // adding the "title" tag infront of the file name if file existed and rename it
                     $rand = substr(md5(microtime()),rand(0,26),5);
                    $array_title = explode(' ',trim($title));
                    $lower_title = strtolower($array_title[0]);
                    $lower_title = $lower_title . "_" . $rand . "_";
                    $file_name = $lower_title . $file_name;
                }
                if (empty($errors) == true) {
                    $album_photos[]  = "img/portfolio/" . $file_name;
                    $album_photos2[] = "img/portfolio/thumbs/" . $file_name;
    
                    // if uploaded image was JPG/JPEG
                    if ($file_type == "image/jpeg" || $file_type == "image/pjpeg") {
                        $image_source = imagecreatefromjpeg($file_tmp);
                    }
                    // if uploaded image was GIF
                    if ($file_type == "image/gif") {
                        $image_source = imagecreatefromgif($file_tmp);
                    }
                    // BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
                    // if uploaded image was BMP
                    if ($file_type == "image/bmp") {
                        $image_source = imagecreatefromwbmp($file_tmp);
                    }
                    // if uploaded image was PNG
                    if ($file_type == "image/x-png") {
                        $image_source = imagecreatefrompng($file_tmp);
                    }
    
                    $remote_file = "img/portfolio/thumbs/" . $file_name;
                    imagejpeg($image_source, $remote_file, 100);
                    chmod($remote_file, 0644);
                    // get width and height of original image
                    list($image_width, $image_height) = getimagesize($remote_file);
    
                    if ($image_width > $max_upload_width || $image_height > $max_upload_height) {
                        $proportions = $image_width / $image_height;
                        if ($image_width > $image_height) {
                            $new_width  = $max_upload_width;
                            $new_height = round($max_upload_width / $proportions);
                        } else {
                            $new_height = $max_upload_height;
                            $new_width  = round($max_upload_height * $proportions);
                        }
                        $new_image    = imagecreatetruecolor($new_width, $new_height);
                        $image_source = imagecreatefromjpeg($remote_file);
    
                        imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
                        imagejpeg($new_image, $remote_file, 100);
                        imagedestroy($new_image);
                    }
                    imagedestroy($image_source);
                    move_uploaded_file($file_tmp, "img/portfolio/" . $file_name);
                    //copy("img/portfolio/" . $file_name, "img/portfolio/thumbs/" . $file_name);
                } else {
    
                }
            }
            // update the portfolio data into database
            // sql query
    
        }

          if (empty($errors) == true) {
                $sql = "UPDATE portfolio SET `title` = '$title', `category` = '$category', `description` = '$description', `album_cover` = '$album_cover'  WHERE url = '$url'";
                if (mysqli_query($conn, $sql)) {
                    $_GET["result"] = "success";
                } else {
                    $_GET["result"] = "failed";
                    $errors[]       = "Error: " . mysql_error() . "<br>" . $conn->error;
                }
                if (isset($_FILES["album_photos"]) && $_FILES['album_photos']['size'][0] > 0) {
                    $_number = 0;
                    foreach ($album_photos as $albums) {
                        $port1 = $albums;
                        $port2 = $album_photos2[$_number];
                        $sql2  = "INSERT INTO gallery (`url`, `photos`, `thumbs`) VALUES ('$url', '$port1', '$port2')";
                        if (mysqli_query($conn, $sql2)) {
                            $_GET["result"] = "success";
                        } else {
                            $_GET["result"] = "failed";
                            $errors[]       = "Error: " . mysql_error() . "<br>" . $conn->error;
                        }
                        $_number++;
                    }
                }
            }
    }
    // 4b - End of editing portfolio
    // 0 - List of functions
    function deletePhotos(){
        global $conn;
        $id = $_POST['portfolio_list'];
        $gallery        = "SELECT e.album_cover, u.photos,u.thumbs FROM portfolio AS e, gallery AS u WHERE e.url = '$id' AND e.url = u.url ";
        $result_gallery = mysqli_query($conn, $gallery);
        $galleryinfo    = array();
        if (mysqli_num_rows($result_gallery) > 0) {
            while ($r2 = mysqli_fetch_assoc($result_gallery)) {
                $galleryinfo[] = $r2;
                $empty_portfolio = FALSE;
            }
        } else {
            $empty_portfolio = TRUE;
            echo "<script> console.log(\"0 results\")</script>";
        }
        $_del_album_cover = FALSE;
        foreach ($galleryinfo as $filename) {
               unlink($filename['photos']);
               unlink($filename['thumbs']);
               if($_del_album_cover == FALSE){
                    unlink($filename['album_cover']);
                    $_del_album_cover = TRUE;
               }
         }
    }
    function removePortfolio(){
            global $conn;
    
            $id = $_POST['portfolio_list'];
            $sql = "DELETE FROM portfolio WHERE url = '$id'";
            $result_promo = mysqli_query($conn, $sql) or trigger_error(mysql_error()." in ".$sql);
    }
    function removePromo(){
        global $conn;
        global $_blank;
        $url          = "UPDATE promotions SET url = '$_blank' WHERE id = 1";
        $result_promo = mysqli_query($conn, $url) or trigger_error(mysql_error()." in ".$url);
        $empty_promo = TRUE;
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