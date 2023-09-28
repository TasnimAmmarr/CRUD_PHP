<?php
include_once('db.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // fetch by id
  $query = "SELECT * FROM users WHERE id = $id";
  $result = mysqli_query($con, $query);

  if ($result) {
    $user = mysqli_fetch_assoc($result);

    // Send user data as JSON response
    header('Content-Type: application/json');
    echo json_encode($user);
  } else {
    // Handle the case when the query fails
    echo json_encode(null);
  }
} else {
  // Handle the case when the 'id' parameter is not provided
  echo json_encode(null);
}
?>
