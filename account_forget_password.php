<?php
require_once '_connect.php';
$model = (object) array();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $username = $_GET['username'];
    $query = mysqli_query($conn, "SELECT password FROM accounts WHERE username = '$username'");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $model->password = $row["password"];
    }else{
        echo json_encode(mysqli_error($conn));
    }
    echo json_encode($model);
    mysqli_close($conn);
}
?>