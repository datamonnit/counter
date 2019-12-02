<?php 
function upload_files($files_array, $target_dir){  
    
    $ok = 1;
    $errors = [];
    $messages = [];

    $target_file = $target_dir . md5(uniqid(rand(), true)) . basename($files_array['bg_image']['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file is an image
    $check = getimagesize($files_array['bg_image']['tmp_name']);
    if($check !== false) {
        $messages[] = "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $erros[] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        
        $errors[] = "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($files_array['bg_image']['size'] > 50000000) {
        $errors[] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errors[] = "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($files_array['bg_image']['tmp_name'], $target_file)) {
            $messages[] = "The file ". basename( $files_array['bg_image']['name']). " has been uploaded.";
            return $files_array['bg_image']['name'];
        } else {
            $errors[] = "Sorry, there was an error uploading your file.";
        }
    }
    
    return false;

    var_dump($errors);
    var_dump($messages);

}



