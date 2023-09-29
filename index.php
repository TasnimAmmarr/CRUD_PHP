<?php
include_once('db.php');
$action = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];

  if ($_POST['save'] == "Save") {
    /******************************Create */
    $save_sql = "INSERT INTO `users`(`name`, `email`, `password`, `mobile`) VALUES ('$name','$email','$password','$mobile')";
  } else {
    $id = $_POST['id'];
    /******************************Update */
    $save_sql = "UPDATE `users` SET `name`='$name',`email`='$email' ,`mobile`='$mobile', `password`='$password' WHERE id =$id ";
  }

  $res_save = mysqli_query($con, $save_sql);
  if (!$res_save) {
    die(mysqli_error($con));
  } else {
    if (isset($_POST['id'])) {
      $action = "edit";
    } else {
      $action = "add";
    }
  }
}
/******************************DELETE */
if (isset($_GET['action']) && $_GET['action'] == 'del') {
  $id = $_GET['id'];
  $del_sql = "DELETE FROM users WHERE id = $id";
  $res_del = mysqli_query($con, $del_sql);
  if (!$res_del) {
    die(mysqli_error($con));
  } else {
    $action = "del";
  }
}
/******************************SELECT */
$users_sql = "SELECT * FROM users";
$all_user = mysqli_query($con, $users_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/toster.css">
  <title>Users App</title>
</head>
<body>
<?php 
  include('modal.tpl.php');
  include('modalRead.tpl.php'); 
?>
<div class="container">
  <div class="wrapper p-5 m-5">
    <div class="d-flex p-2 justify-content-between mb-2">
      <h2>All users</h2>
      <div><a href="add_user.php"><i data-feather="user-plus"></i></a>
        <a href="form.php"><i data-feather="plus"></i></a>
      </div>
    </div>
    <hr>
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Mobile</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($user = $all_user->fetch_assoc()) { ?>
          <tr>
            <td><?php echo $user['id']; ?></td>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['mobile']; ?></td>
            <td>
              <div class="d-flex p-2 justify-content-evenly mb-2">
                <i onclick="confirm_delete(<?php echo $user['id']; ?>);" class="text-danger" data-feather="trash-2"></i>
                <i onclick="editUser(<?php echo $user['id']; ?>);" class="text-success" data-feather="edit"></i>
                <i onclick="consulter(<?php echo $user['id']; ?>);" class="text-success" data-feather="eye"></i>
              </div>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

<script src="js/jq.js"></script>
<script>

  /************************ fonction Consulter TPL ( modalRead.tpl.php)******************* */
    function consulter(userId) {
      var modalTitle = $('#viewModalLabel').text().replace('{userId}', userId);
  $('#viewModalLabel').text(modalTitle);
  $.ajax({
    url: 'consulter.php',
    method: 'GET',
    data: { id: userId },
    dataType: 'json',
    success: function(data) {
      if (data.error) {
        alert(data.error);
      } else {
        $('#viewUserName').text(data.name);
        $('#viewUserEmail').text(data.email);
        $('#viewUserMobile').text(data.mobile);

        $('#viewModal').modal('show');
        
      }
    },
    error: function() {
      alert('Error fetching user data.');
    }
  });
}

  function editUser(userId) {
    $.ajax({
      url: 'getUser.php',
      method: 'GET',
      data: { id: userId },
      success: function(data) {
        if (data) {
          // Populate the modal fields with user data
          $('#editUserId').val(data.id);
          $('#editUserName').val(data.name);
          $('#editUserEmail').val(data.email);
          $('#editUserMobile').val(data.mobile);
          $('#editUserPassword').val(data.password);
          // Show the modal
          $('#editModal').modal('show');
        } else {
          alert('User not found.'); // Handle the case when the user is not found
        }
      },
      error: function() {
        alert('Error fetching user data.'); // Handle AJAX errors
      }
    });
  }

  function updateUser() {
  var userId = $('#editUserId').val(); // Récupérer l'ID de l'utilisateur depuis le champ caché
  var formData = $('#editForm').serialize();

  $.ajax({
    url: 'updateUser.php',
    method: 'PUT',
    data: formData,
    dataType: 'json',
    success: function(data) {
      alert(data.message);
      $('#editModal').modal('hide');
      location.reload();
    },
    error: function() {
      alert('Error updating user.');
    }
  });
}
$(document).ready(function() {
  $('#saveChangesButton').click(function() {
    updateUser(); // Appeler la fonction updateUser lorsque le bouton est cliqué
  });
});
 /* $(document).ready(function() {
    // Handle the "Save changes" button click event
    $('#saveChangesButton').click(function() {
      $('#editForm').submit();
    }); 
  });*/
</script>

<script src="js/bootstrap.min.js"></script>
<script src="js/icons.js"></script>
<script src="js/toster.js"></script>
<script src="js/main.js"></script>
<script>
  feather.replace();
</script>
</body>
</html>
