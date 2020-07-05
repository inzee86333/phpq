<?php
require_once '@account.php';
require_once '_connect.php';
$result = (object) array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  //RESULT
  $result->success = false;
  $result->error_username = mysqli_num_rows(mysqli_query($conn, "SELECT username FROM accounts WHERE username = '$username'")) > 0 ? true : false;
  $result->error_phone_number = mysqli_num_rows(mysqli_query($conn, "SELECT phone_number FROM accounts WHERE phone_number = '$phone_number'")) > 0 ? true : false;
  $result->error_vehicle_registration = mysqli_num_rows(mysqli_query($conn, "SELECT vehicle_registration FROM accounts WHERE vehicle_registration = $vehicle_registration")) > 0 ? true : false;
  //SQLQuery
  if (!$result->error_username and !$result->error_phone_number and !$result->error_vehicle_registration) {
    if (mysqli_query($conn, "INSERT INTO accounts (username, password, first_name, last_name, phone_number, facebook, id_line, vehicle_registration, user_type)
    VALUES ('$username', '$password', '$first_name', '$last_name', '$phone_number', '$facebook', '$id_line', $vehicle_registration, '$user_type');")) {
      $result->success = true;
    } else {
      $result->error = mysqli_error($conn);
    }
  }
  echo json_encode($result);
  mysqli_close($conn);
}
?>