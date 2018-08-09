<?php

$id = $_GET["id"];
$reset = 0; //reset variable used to determine if page needs to be 'reset'
include 'edituser.html.php';

//this section checks to see if the required variables have been entered correctly
//and will not allow user to be editted if they aren't
//the two letter varibles are the errors, eg $fe stands for "first_name error"
if (isset($_POST['first_name2']))
{
  $firs = mysqli_real_escape_string($link, $_POST['first_name2']);
  if ($firs == '')
  {
    $fe = 'You must enter a first name.';
  } 
  if(strlen($firs) > 20)
  {
    $fe = "You must enter a first name less than 21 characters.";
  }

  if (isset($_POST['last_name']))
  {
     $las = mysqli_real_escape_string($link, $_POST['last_name']);
     if ($las == '')
     {
       $le = 'You must enter a last name.';
     }
     if (strlen($las) > 20)
     {
       $le = "You must enter a last name less than 21 characters.";
     }

  }
  if (isset($_POST['email_id']))
  {
     $emai = mysqli_real_escape_string($link, $_POST['email_id']);
     if ($emai == '')
     {
       $ee = 'You must enter an email address.';
     } 
     if (strlen($emai) > 50)
     {
       $ee = "You must enter an email address less than 51 characters.";
     }
  }
  if (isset($_POST['user_name']))
  {
    $use = mysqli_real_escape_string($link, $_POST['user_name']);
    if ($use == '')
    {
      $ue = 'You must enter a unique username.';
    }
    if (strlen($use) > 20)
    {
      $ue = 'You must enter a username less than 21 characters.';
    }
  }
  if (isset($_POST['passwd']))
  {
    $pas = mysqli_real_escape_string($link, $_POST['passwd']);
    if ($pas == '')
    {
      $pe = 'You must enter a password.';
    }
    if (strlen($pas) > 20)
    {
      $pe = 'You must enter a password less than 21 characters.';
    }

  }
  if (isset($_POST['phone_1']))
  {
    $phon1 = mysqli_real_escape_string($link, $_POST['phone_1']);
    if ($phon1 == '')
    {
      $p1e = 'You must enter a phone 1.';
    }
    if ($phon1[9] == '')
    {
     $p1e = 'You must enter a 10 digit phone number.';
    } 
    if(preg_match("/[a-z]/i", $phon1))
    {
      $p1e = 'Your phone number cannot contain letters.';
    }

  }
  if (isset($_POST['phone_2']))
  {
    $phon2 = mysqli_real_escape_string($link, $_POST['phone_2']);
    if ($phon2 == '' || (($phon2[0] == 'N') && ($phon2[1] == 'U') && ($phon2[2] == 'L') && ($phon2[3] == 'L')) || (($phon2[0] == 0 && $phon2[1] == '')))
    {
      $phon2 = NULL;
    }
    if (($phon2[9] == '') && !($phon2[0] == '') && !($phon2[0] == 'N') && !($phon2[1] == 'U') && !($phon2[2] == 'L') && !($phon2[3] == 'L'))
    {
      $p2e = 'You must enter a 10 digit phone number.';
    }
    if(preg_match("/[a-z]/i", $phon2))
    {
      $p2e = 'Your phone number cannot contain letters.';
    }
  }

  if (isset($_POST['photo_path']))
  {
    $pat = mysqli_real_escape_string($link, $_POST['photo_path']);
    if ($pat == '')
    {
      $pat = NULL;
    }
    if (strlen($pat) > 500)
    {
      $pthe = "You must enter a photo path less than 501 characters.";
    }
  }
  if (isset($_POST['user_type']))
  {
    $typ = mysqli_real_escape_string($link, $_POST['user_type']);
    if ($typ == '')
    {
      $typ = 'Driver';
    }
  }
  if (isset($_POST['color']))
  {
    $co = mysqli_real_escape_string($link, $_POST['color']);
    if ($co == '')
    {
      $co = '#ff00ff';
    }
    if ($co[0] == '#')
    {
      $str=substr($co,1,6);
      $co = $str;
    }
  }
  if(!(empty($fe) && empty($le) && empty($ee) && empty($ue) && empty($pe) && empty($p1e) && empty($pthe) && empty($p2e)))
  {
    $reset = 1; //there was an error and the page needs to be reset before rewritten
    include 'edituser.html.php';
    exit();
  } 
  $command = "UPDATE users SET first_name='$firs',
          last_name ='$las',
          email_id ='$emai',
          user_name ='$use',
          passwd = '$pas',
          phone_1 = '$phon1',
          phone_2 = '$phon2',
          photo_path = '$pat',
          user_type = '$typ',
          color = '$co' WHERE user_id='$id'";


  if (!mysqli_query($link, $command))
  {
    $error = 'Error adding user: ' . mysqli_error($link);
    include 'err.html.php';
    exit();
  }
  include 'reset.html';
  echo "<script>window.location = 'http://localhost/ppt'</script>";
  //forces the page to return to the dashboard, couldn't get this to work
  //any other way from this file.
  exit();   
}


?>
