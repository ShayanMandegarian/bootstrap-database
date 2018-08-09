<?php
//this is the 'index' page, ie the page accessed from 'localhost/ppt'
$link = mysqli_connect('localhost', 'root', 'Purpl3ti3_');
if ($link == FALSE)
{
  $error = 'Unable to connect to localhost';
  include 'err.html.php';
  exit();
}

if(!mysqli_set_charset($link, 'utf8'))
{
  $error = 'Unable to decode database, not UTF-8.';
  include 'err.html.php';
  exit();
}

if(!mysqli_select_db($link, 'ppt'))
{
  $error = 'Unable to connect to the PurpleTie database.';
  include 'err.html.php';
  exit();
}

$result = mysqli_query($link, 'SELECT user_id, first_name, last_name, email_id,
          user_name, passwd, phone_1, phone_2, photo_path, user_type, is_deleted,
          color FROM users');
if (!$result)
{
  $error = 'Error fetching users: ' . mysqli_error($link);
  include 'err.html.php';
  exit();
}

while ($row = mysqli_fetch_array($result))
{
  $users[] = array('id' => $row['user_id'], 'fn' => $row['first_name'],
             'ln' => $row['last_name'], 'em' => $row['email_id'],
             'un' => $row['user_name'], 'pw' => $row['passwd'],
             'p1' => $row['phone_1'], 'p2' => $row['phone_2'],
             'pp' => $row['photo_path'], 'ut' => $row['user_type'],
             'dl' => $row['is_deleted'], 'cl' => $row['color']);
}

// This section is the code associated with adding a user. 

if (isset($_GET['adduser']))
{
  include 'adduser.html.php';
  exit();
}

if (isset($_GET['back']))
{
  header('Location: .');
  exit();
}

if (isset($_POST['first_name']))
{
  $first = mysqli_real_escape_string($link, $_POST['first_name']);
  if ($first == '')
  {
    $fe = 'You must enter a first name.';
  } 
  if(strlen($first) > 20)
  {
    $fe = "You must enter a first name less than 21 characters.";

  }
  if (isset($_POST['last_name']))
  {
     $last = mysqli_real_escape_string($link, $_POST['last_name']);
     if ($last == '')
     {
       $le = 'You must enter a last name.';
     }
     if (strlen($last) > 20)
     {
       $le = "You must enter a last name less than 21 characters.";
     }

  }
  if (isset($_POST['email_id']))
  {
     $email = mysqli_real_escape_string($link, $_POST['email_id']);
     if ($email == '')
     {
       $ee = 'You must enter an email address.';
     } 
     if (strlen($email) > 50)
     {
       $ee = "You must enter an email address less than 51 characters.";
     }
  }
  if (isset($_POST['user_name']))
  {
    $user = mysqli_real_escape_string($link, $_POST['user_name']);
    if ($user == '')
    {
      $ue = 'You must enter a unique username.';
    }
    if (strlen($user) > 20)
    {
      $ue = 'You must enter a username less than 21 characters.';
    }
  }
  if (isset($_POST['passwd']))
  {
    $pass = mysqli_real_escape_string($link, $_POST['passwd']);
    if ($pass == '')
    {
      $pe = 'You must enter a password.';
    }
    if (strlen($pass) > 20)
    {
      $pe = 'You must enter a password less than 21 characters.';
    }

  }
  if (isset($_POST['phone_1']))
  {
    $phone1 = mysqli_real_escape_string($link, $_POST['phone_1']);
    if ($phone1 == '')
    {
      $p1e = 'You must enter a phone 1.';
    }
    if ($phone1[9] == '')
    {
      $p1e = 'You must enter a 10 digit phone number.';
    } 
    if(preg_match("/[a-z]/i", $phone1))
    {
      $p1e = 'Your phone number cannot contain letters.';
    }


  }
  if (isset($_POST['phone_2']))
  {
    $phone2 = mysqli_real_escape_string($link, $_POST['phone_2']);
    if ($phone2 == '' || (($phone2[0] == 'N') && ($phone2[1] == 'U') && ($phone2[2] == 'L') && ($phone2[3] == 'L')) || (($phone2[0] == 0 && $phone2[1] == ''))) 
    {
      $phone2 = NULL;
    }
    if (($phon2[9] == '') && !($phon2[0] == '') && !($phon2[0] == 'N') && !($phon2[1] == 'U') && !($phon2[2] == 'L') && !($phon2[3] == 'L'))
    {
      $p2e = 'You must enter a 10 digit phone number.';
    }
    if(preg_match("/[a-z]/i", $phone2))
    {
      $p2e = 'Your phone number cannot contain letters.';
    }

  }
  if (isset($_POST['photo_path']))
  {
    $path = mysqli_real_escape_string($link, $_POST['photo_path']);
    if ($path == '')
    {
      $path = NULL;
    }
    if (strlen($path) > 500)
    {
      $pthe = "You must enter a photo path less than 501 characters.";
    }
  }
  if (isset($_POST['user_type']))
  {
    $type = mysqli_real_escape_string($link, $_POST['user_type']);
    if ($type == '')
    {
      $type = 'Driver';
    }
  }
  if (isset($_POST['color']))
  {
    $col = mysqli_real_escape_string($link, $_POST['color']);
    if ($col == '')
    {
      //$col = '#ff00ff';
    }
  }
  if(!(empty($fe) && empty($le) && empty($ee) && empty($ue) && empty($pe) && empty($p1e) && empty($pthe)))
  {
    include 'adduser.html.php';
    exit();
  }
  $sql = 'INSERT INTO users SET first_name="' . $first . '",
          last_name ="' . $last . '",
          email_id ="' . $email . '",
          user_name ="' . $user . '",
          passwd = "' . $pass . '",
          phone_1 = "' . $phone1 . '",
          phone_2 = "' . $phone2 . '",
          photo_path = "' . $path . '",
          user_type = "' . $type . '",
          color = "' . $col . '"';

  if (!mysqli_query($link, $sql))
  {
    $error = 'Error adding user: ' . mysqli_error($link);
    include 'err.html.php';
    exit();
  }

  header('Location: .');
  exit();
}
// end of add user section.

// this section is code associated with deleting a user.
if (isset($_GET['deleteuser']))
{
  if(isset($_POST["id"]) && !empty($_POST["id"]))
  {
    $id = $_POST['id'];
  }
  else
  {
    $error = "Error could not delete user";
    include 'err.html.php';
    exit();
  }
  $sql = "UPDATE users SET is_deleted = '1' WHERE user_id='$id'";
   
  if (!mysqli_query($link, $sql))
  {
    $error = 'Error deleting user: ' . mysqli_error($link);
    include 'err.html.php';
    exit();
  }
  header('Location: .');
  exit();
}
// end of delete user section.

// this section is code associated with dealing with deleted users.
if (isset($_GET['deluser']))
{
  include 'deluser.html.php';
  exit();
}

if(isset($_GET['return']))
{
  header('Location: .');
  exit();
}

if (isset($_GET['restoreuser']))
{
  $id = mysqli_real_escape_string($link, $_POST['id']);
  $sql = "UPDATE users SET is_deleted = '0' WHERE user_id='$id'";

  if (!mysqli_query($link, $sql))
  {
    $error = 'Error restoring user: ' . mysqli_error($link);
    include 'err.html.php';
    exit();
  }
  header('Location: .');
  exit();
}
// end of deleted users section.

if(isset($_GET['reverse']))
{
  header('Location: .');
  exit();
}

include 'output.html.php';

?>
