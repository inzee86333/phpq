<?php
require_once '_connect.php';
$result = (object) array();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $username = $_GET['username'];
    $result->success = false;
    if(mysqli_query($conn, "DELETE FROM accounts WHERE username = '$username'")){
        $result->success = true;
    }else{
        $result->success = false;
    }
    echo json_encode($result);
    mysqli_close($conn);
}
?>