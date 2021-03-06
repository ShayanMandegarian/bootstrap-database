<?php
// this file is accessed when clicking the 'restore' action on a deleted user.
$link = mysqli_connect('localhost', 'root', 'password');
if ($link == FALSE)
{
  $error = 'Unable to connect to localhost';
  include 'err.html.php';
  exit();
}

if(!mysqli_select_db($link, 'ppt'))
{
  $error = 'Unable to connect to the PurpleTie database.';
  include 'err.html.php';
  exit();
}

if(isset($_GET["id"])  && !empty($_GET["id"]))
{
  $id = $_GET['id'];
}
else
{
  $error = "Error could not delete user";
  include 'err.html.php';
  exit();
}
$sql = "UPDATE users SET is_deleted = '0' WHERE user_id='$id'";
if (!mysqli_query($link, $sql))
{
  $error = 'Error deleting user: ' . mysqli_error($link);
  include 'err.html.php';
  exit();
}
header('Location: ./?deluser');
exit();

?>
