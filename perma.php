<?php
//this file is accessed when using the 'delete' action from the view deleted users.
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
$sql = "DELETE FROM users WHERE user_id='$id'";
if (!mysqli_query($link, $sql))
{
  $error = 'Error deleting user: ' . mysqli_error($link);
  include 'err.html.php';
  exit();
}
$sql="SELECT * FROM users";
$result=mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
$count = $count + 1;
$sql="ALTER TABLE users AUTO_INCREMENT=$count";
//the above section resets the id incrementer so that when a user is deleted from
//the database, the ID that user had can be reused, this does not apply when
//is_deleted is changed to 1, only when the user is permanently deleted.

if(!mysqli_query($link, $sql))
{
  $error = 'Error resetting ID counter: ' . mysqli_error($link);
  include 'err.html.php';
  exit();
}
header('Location: ./?deluser');
exit();

?>
