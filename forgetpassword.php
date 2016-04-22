<?php
session_start();

    require_once 'include/DB_Functions.php';
$db = new DB_Functions();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="admin.css" rel="stylesheet" type="text/css" />
<link href="s.css" rel = "stylesheet" type="text/css">

<script type="text/javascript" src="slider.js"></script>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
function goback()
{
	alert("hi");
	history.go(-1);
}
</script>
<title>Forget Password</title>
</head>

<body>

<!-- <div id="header">
Stores and Purchase Management

</div> -->
<div>
<div id="sidebar">
<?php
?>
</div>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div>
 <?php
// echo "Username: ".$_SESSION['login_user'];
 //$uname = $_SESSION['login_user'];
 //echo "testing: ".$uname;
 ?>
</div>
<div id="change_password">
<?php
//$SecQ = $db->getSecurityQuestion($uname);
//echo $SecQ ;
?>
<div class="container">
    <section class="register">
      <h1> Forget Password </h1>
      <form action="forgetpassword.php" method="post" name="frm">
      <div class="form-group">
      <h3>Username</h3>
      <input  required="required "name="username" type="text" size="40" />
      <div class="reg_section password">
      </div>
     <input name = "sub" type="submit" value="submit"/><br >
      </form>



<?php

  if(isset($_POST['username'])&&isset($_POST['sub']))
  {
    //echo "coming to if";
  //$SecA=$_POST['SecA'];
  //$correct = $db->checkSecurityAnswer($SecA, $uname);
    $correct = $db->checkUserValidity($_POST['username']);
  if($correct==1)
  {
    $_SESSION['login_user']=$_POST['username'] ;
    // echo "<a href='/tpa/changepassword1.php'> click to change password </a>";
      header("Location: changepassword1.php");


  } 
  else
  {
    echo "You are not a member of IIT Jodhpur";
  }
}

?>
</div>
</div>
</body>
</html>