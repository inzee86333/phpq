<?php
if($_SERVER['REQUEST_METHOD']=='GET'){
    $result = (object) array();
    $result->success = "false";
    echo json_encode ($result);
}
?>