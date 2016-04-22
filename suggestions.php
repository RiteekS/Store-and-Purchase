<?php
session_start();
if(!isset($_SESSION['login_user']))
{
  echo "Login First,";
  echo " Click <a href = 'index.php'> Here </a> for login" ;
}
else if(($_SESSION['utype'])=='admin')
{

  echo "page unavailable for admin";
}
else
{
require_once 'include/DB_Functions.php';
// include_once("Student.html");
//require_once 'include/nonlistedItems.php';
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
<title>Suggestions</title>
</head>

<body>


<div>
<div id="sidebar">
<?php
?>
</div>
<!-- InstanceBeginEditable name="EditRegion1" -->
<div>
 <?php
 ?>
</div>


<!-- <form action="suggestions.php" method="post" name="frm">
  <fieldset>
    

    Enter your suggestions here<br>
    <input name="itemDetails" type="text" size="100" /><br>
    
    <input  name= "sub" type="submit" value="submit"/>
  </fieldset>
</form> -->


<div class="container">
    <section class="register">
      <h1> Give Your Suggestions </h1>
     <form action="suggestions.php" method="post" name="frm">
      <div class="form-group">
      <h3>Suggestion</h3>
     <!-- <input name="suggestions" required ="required" type="text" size="100" />-->
     <textarea cols="50" rows="5">

</textarea>

      <div class="reg_section password">
      </div>
     <input name = "sub" type="submit" value="submit"/><br >
      </form>
    


    <?php
                    $user = $_SESSION['login_user'];
                    $query = "SELECT  * FROM Institute_member_DB WHERE username = '$user'";
                    $result = mysql_query($query) or die("query error");
                    $query_data = mysql_fetch_array($result);

                if($query_data['type']=='Faculty')       
    {?>

                     <br><br>
                       <a href="profile.php"><h1>Back</h1></a>
    <?php   }   ?>
    <?php
       if($query_data['type']=='Student')
        { ?>

    <br><br>
    <a href="Sprofile.php"><h1>Back</h1></a>
    
      <?php } 
      ?>


<?php
  if(isset($_POST['sub']))
  {
  	//echo"testing";
  	$login_user = $_SESSION['login_user'];
  	
    $suggestions = $_POST['suggestions'];
    
    ?>
    <br><br>

    <?php
    $db->Suggestions($login_user, $suggestions);
    ?>

    


<?php
  }
 ?>
 </section>
</div>
</div>
 </body>
</html>
<?php
}
?>