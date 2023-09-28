<?php
include_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
  parse_str(file_get_contents("php://input"), $_PUT);

  $id = $_PUT['id'];
  $name = $_PUT['name'];
  $email = $_PUT['email'];
  $mobile = $_PUT['mobile'];
  $password = $_PUT['password'];

  $update_sql = "UPDATE `users` SET `name`='$name', `email`='$email', `mobile`='$mobile', `password`='$password' WHERE id =$id";

  $res_update = mysqli_query($con, $update_sql);
  if (!$res_update) {
    die(mysqli_error($con));
  } else {
    echo json_encode(array('message' => 'User updated successfully'));
  }
}
?>
