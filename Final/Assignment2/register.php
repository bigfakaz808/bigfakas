<?php session_start();

$errors = array();
if(!isset($_POST['username']) && isset($_POST['submitted'])){
  echo "No Username Submitted";
  echo "<br>";
}

if(!isset($_POST['password']) && isset($_POST['submitted'])){
  echo "No Password Submitted";
  echo "<br>";
}

if(isset($_POST['username']) && isset($_POST['password'])){
  if(!empty($_POST['username']) && !empty($_POST['password'])){
    $_SESSION['UserData']['Username'] = $_POST['username'];
    $filename = fopen('./users.txt', 'a+');
    $userData = $_POST['username'] . "," . $_POST['password'] . ",";
    fwrite($filename, $userData);
    fclose($filename);
    if(!isset($_SESSION['items'])){
      header("Location: ass2.php");
      exit;
    } else {
      header("Location: invoice.php");
      exit;
    }
  }
}

?>

<form id='register' action='register.php' method='post'

    accept-charset='UTF-8'>

<fieldset >

<legend>Register</legend>

<input type='hidden' name='submitted' id='submitted' value='1'/>

<label for='username' >UserName*:</label>

<input type='text' name='username' id='username' maxlength="50" />



<label for='password' >Password*:</label>

<input type='password' name='password' id='password' maxlength="50" />

<input type='submit' name='Submit' value='Submit' />



</fieldset>

</form>
