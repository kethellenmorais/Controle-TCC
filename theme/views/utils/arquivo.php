
<?php

if (isset($_FILES['file']) && !empty($_FILES['file']['name'])) {

/*Arquivo está sendo enviado para pasta UPLOAD */
$move_upload_rs = move_uploaded_file($_FILES['file']['tmp_name'], dirname(__DIR__, 2) . "/assets/docs/" . $_FILES['file']['name']);

if($move_upload_rs){
    $callback["message"] = "FOI";
    $callback["type"] = "success";
    
    return json_encode($callback);
}else{
//    die("error");
}

} else { 
// die("error"); 
}
