<?php 
function sendFileToIMGHost($file) {
    $data = array(
        'img' => new CURLFile($file['tmp_name'],$file['type'], $file['name']),
    ); 
    
    //**Note :CURLFile class will work if you have PHP version >= 5**
    
     $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, 'https://img.p0nd.ga/upload.php');
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_TIMEOUT, 86400); // 1 Day Timeout
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60000);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_REFERER, $_SERVER['HTTP_HOST']);
    
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $msg = FALSE;
    } else {
        $msg = $response;
    }
    
    curl_close($ch);
    return $msg;
}

    if(isset($_FILES['img'])) {
        echo sendFileToIMGHost($_FILES['img']);
    }

    
    ?>