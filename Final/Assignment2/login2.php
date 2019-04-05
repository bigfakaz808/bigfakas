<?php
session_start(); /* Starts the session */

if(isset($_POST['Go_Home'])){
  header("Location: ass2.php");
  exit;
}
if(isset($_POST['Go_Reg'])){
  header("Location: register.php");
  exit;
}
if(isset($_SESSION['UserData']['Username'])){
  header("Location: invoice.php");
  exit;
}

/* Check Login form submitted */
if(isset($_POST['Submit'])){
/* Define username and associated password array */
//$logins = array('Alex' => '123456','username1' => 'password1','username2' => 'password2');

/* Check and assign submitted Username and Password to new variable */
$Username = isset($_POST['Username']) ? $_POST['Username'] : '';
$Password = isset($_POST['Password']) ? $_POST['Password'] : '';

//$filename = fopen('./users.txt', 'r');
$filename = file_get_contents('./users.txt');
//stream_get_contents($stream, -1, 10);
$users = explode(",", $filename);

for($i = 0; $i < count($users); $i++){
  if($users[$i] == $Username && $users[$i+1] == $Password){
    //fclose($filename);
/* Check Username and Password existence in defined array */
// if (isset($logins[$Username]) && $logins[$Username] == $Password){
/* Success: Set session variables and redirect to Protected page  */
    $_SESSION['UserData']['Username']=$Username;
    if(!isset($_SESSION['items'])){
      header("Location: ass2.php");
      exit;
    } else {
      header("Location: invoice.php");
      exit;
  }
}
/*Unsuccessful attempt: Set error message */$msg="<span style='color:red'>Invalid Login Details</span>";
}
}
 ?>
<form action="" method="post" name="Login_Form">
  <table width="400" border="0" align="center" cellpadding="5" cellspacing="1" class="Table">
    <?php if(isset($msg)){?>
    <tr>
      <td colspan="2" align="center" valign="top"><?php echo $msg;?></td>
    </tr>
    <?php } ?>
    <tr>
      <td colspan="2" align="left" valign="top"><h3>Login</h3></td>
    </tr>
    <tr>
      <td align="right" valign="top">Username</td>
      <td><input name="Username" type="text" class="Input"></td>
    </tr>
    <tr>
      <td align="right">Password</td>
      <td><input name="Password" type="password" class="Input"></td>
    </tr>
    <tr>
      <td> </td>
      <td><input name="Submit" type="submit" value="Login" class="Button3"></td>
      <td><input name="Go_Home" type="submit" value="Go Home" class="Button3"></td>
      <td><input name="Go_Reg" type="submit" value="Register" class="Button3"></td>
    </tr>
  </table>
</form>




