<?php
require_once '_connect.php';
$model = (object) array();
$result = array();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $tid = $_GET["tid"];
    $query = mysqli_query($conn, "SELECT * FROM prices WHERE status = '1'");
    if(mysqli_num_rows($query) > 0){
        while($row = mysqli_fetch_assoc($query)){
            $model->id = $row["id"];
            $model->useid = $row["proid"];
            $model->start = $row["price"];
            array_push($result, $model);
        }
    }else{
        echo json_encode(mysqli_error($conn));
    }
    echo json_encode($result);
    mysqli_close($conn);
}
?>