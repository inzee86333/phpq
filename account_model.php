<?php
require_once '_connect.php';
$model = (object) array();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $username = $_GET['username'];
    $query = mysqli_query($conn, "SELECT * FROM accounts WHERE username = '$username'");
    if(mysqli_num_rows($query) > 0){
        $row = mysqli_fetch_assoc($query);
        $model->username = $row["username"];
        $model->password = $row["password"];
        $model->first_name = $row["first_name"];
        $model->last_name = $row["last_name"];
        $model->phone_number = $row["phone_number"];
        $model->facebook = $row["facebook"];
        $model->email = $row["email"];
        $model->id_line = $row["id_line"];
        $model->vehicle_registration = $row["vehicle_registration"];
        $model->user_type = $row["user_type"];
    }else{
        echo json_encode(mysqli_error($conn));
    }
    echo json_encode($model);
    mysqli_close($conn);
}
?>