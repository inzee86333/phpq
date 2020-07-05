<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone_number = $_POST['phone_number'];
    $facebook = $_POST['facebook'];
    $id_line = $_POST['id_line'];
    $email = $_POST['email'];
    $vehicle_registration = $_POST['vehicle_registration'];
    $user_type = $_POST['user_type'];
    $vehicle_registration = $user_type == "used" ? "NULL" : "'$vehicle_registration'";
