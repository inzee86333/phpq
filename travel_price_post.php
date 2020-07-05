<?php
require_once '@price.php';
require_once '_connect.php';
$result = (object) array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //RESULT
  $result->success = false;
  //SQLQuery
  if (mysqli_query($conn, "INSERT INTO prices (tid, proid, price, status)
  VALUES ($tid, '$proid', $price, $status);")) {
    $result->success = true;
  } else {
    $result->error = mysqli_error($conn);
  }
  echo json_encode($result);
  mysqli_close($conn);
}
?>