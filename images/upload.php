<?php
        if(isset($_FILES['img']) && $_FILES['img']['name'] != ""){
            date_default_timezone_set('Asia/Bangkok'); 
            $Year = date('Y', time());
            $Month = date('m', time());
            $Day = date('d', time());
            if ($_FILES['img']['name']) {
                if (!$_FILES['img']['error']) {
                    $ext = explode('.', $_FILES['img']['name']);
                    $name = $ext[0];
                    $filename = $name . '.' . $ext[1];
        
                    $path =  $Year . '/' . $Month . '/' . $Day . '/';

                    if (!file_exists( $path)) {
                        mkdir( $Year . '/');
                        mkdir( $Year . '/' . $Month . '/');
                        mkdir( $Year . '/' . $Month . '/' . $Day . '/');
                    }
        
                    $destination =  $path . $filename; //change this directory
                    $location = $_FILES["img"]["tmp_name"];
                    if (file_exists($destination)) {
                        $i = 1;
                        while(file_exists($path . $name . '_' . $i . '.' . $ext[1])) {
                            $i++;
                        }
                        $destination = $path . $name . '_' . $i . '.' . $ext[1];
                    }
                    move_uploaded_file($location, $destination);
                    if (isset($_POST['method']) && $_POST['method'] == "index") header("Location: " . $destination);
                    else echo $destination;
                }
            } 
        } else {
            return false;
        }
?>