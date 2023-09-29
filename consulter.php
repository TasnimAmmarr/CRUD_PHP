<?php
include_once('db.php');

if (isset($_GET['id'])) {
  $userId = $_GET['id'];
  /******************************* a verifier  */
  $user_sql = "SELECT * FROM users WHERE id = $userId";
  $user_result = mysqli_query($con, $user_sql);

  if ($user_result) {
    $user_data = mysqli_fetch_assoc($user_result);
    echo json_encode($user_data);
  } else {
    echo json_encode(array('error' => 'User not found'));
  }
} else {
  echo json_encode(array('error' => 'ID not provided'));
}
?>
