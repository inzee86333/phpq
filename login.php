<?php
require_once '@login.php';
require_once '_connect.php';
$result = (object) array();
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (mysqli_num_rows(mysqli_query($conn, "SELECT username FROM accounts WHERE username = '$username'")) != 0) {
        $result->username_found = "true";
    }else{
        $result->username_found = "false";
    }
    if($result->username_found){
        if(mysqli_num_rows(mysqli_query($conn, "SELECT username, password FROM accounts WHERE username = '$username' and password = '$password'")) != 0){
            $result->login_success = "true";
        }else{
            $result->login_success = "false";
        }
    }
    echo json_encode ($result);
}
mysqli_close($conn);
?>