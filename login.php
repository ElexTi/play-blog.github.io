	<?php require_once("includes/connection.php"); ?>
	<?php include("includes/header.php"); ?>	 
	<?php
	
	if(isset($_SESSION["session_username"])){
	header("Location: play-blog.com/intropage.php");
	}
?>
<?php
	if(isset($_POST["login"])){

	if(!empty($_POST['username']) && !empty($_POST['password'])) {
	$username=htmlspecialchars($_POST['username']);
	$password=htmlspecialchars($_POST['password']);
	$query =mysql_query("SELECT * FROM usertbl WHERE username='".$username."' AND password='".$password."'");
	$numrows=mysql_num_rows($query);
	if($numrows!=0)
 {
while($row=mysql_fetch_assoc($query))
 {
	$dbusername=$row['username'];
  $dbpassword=$row['password'];
 }
  if($username == $dbusername && $password == $dbpassword)
 {
	 $_SESSION['session_username']=$username;	 
   // header("Location: play-blog.com/intropage.php");
   // exit();
	}
	} else {
	
	echo  "Неправильный логин или пароль!";
 }
	} else {
    $message = "Все поля обязательны для заполнения!";
	}
	}
	?>
<div style="margin-top: 40px;">
</div>
<div style="margin-top: 20px;" class="container mlogin">
<div id="login">
<h3>Вход</h3>
<form action="" id="loginform" method="post"name="loginform">
<p><label for="user_login">Имя пользователя<br>
<input class="input" id="username" name="username"size="20"
type="text" value=""></label></p>
<p><label for="user_pass">Пароль<br>
 <input class="input" id="password" name="password"size="20"
  type="password" value=""></label></p> 
	<p class="submit"><input class="button" name="login"type= "submit" value="Вход"></p>
	<p class="regtext">Еще не зарегистрированы? <a href= "register.php">Регистрация</a>!</p>
   </form>
 </div>
  </div>
<?php 
include("includes/footer.php"); 
?>
