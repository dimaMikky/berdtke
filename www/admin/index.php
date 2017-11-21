<?php
//header("Content-type: text/html; charset=utf-8");
//exit("<h1>Технічна перерва. Спробуйте пізніше ...</h1>");
include("../const.php");
function Login($userlogin, $usertype, $username, $userid)
{
	if ($username == '') return false;
	$_SESSION['userlogin'] = $userlogin;
	$_SESSION['usertype'] = $usertype;
	$_SESSION['username'] = $username;
	$_SESSION['userid'] = $userid;
	return true;
}
function Logout()
{
	unset($_SESSION['userlogin']);
	unset($_SESSION['usertype']);
	unset($_SESSION['username']);
	unset($_SESSION['userid']);
}
function cleanString($string)
{
	$detagged = strip_tags($string);
	if(get_magic_quotes_gpc())
	{
		$stripped = stripslashes($detagged);
		$escaped = mysql_real_escape_string($stripped);
	}
	else
	{
		$escaped = mysql_real_escape_string($detagged);
	}
	return $escaped;
}
//*************** Start of programm *****************
session_start();
$enter_site = false;
Logout();

if (count($_POST) > 0) {
	include("connect.php");
	$log = cleanString($_POST['login']) ;
	$pas = md5($_POST['password']);
	$result = mysql_query("SELECT * FROM regusers WHERE userlogin='$log' AND userpasw='$pas'");
	if(!$result) exit();
	$myrow = mysql_fetch_array($result);
	if($myrow) {$enter_site = Login($log, $myrow['usertype'], $myrow['username'], $myrow['userid']);}
}
if ($enter_site) {
	switch  ($_SESSION['usertype'])	{
		case ("1") : // Админ
			header("Location: admin.php");
			exit();
		case ("2") : // Редактор новостной ленты
			//header("Location: editor.php");
			//exit();
	}
}
?>

<!--<!DOCTYPE html>-->
<html>
<head>
    <title>Login</title>
	  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <!--<script src="js/bootstrap.min.js"></script>-->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="css/signin.css" rel="stylesheet" media="screen">
</head>

<body>
<div class="container">
	<h2 class="form-signin-heading"><? echo $T_OWNERNAME ?></h2>
	<form class="form-signin" role="form" action="" method="post">
		<input type="text" class="form-control" name="login" placeholder="Логін" required autofocus>
		<input type="password" class="form-control" name="password" placeholder="Пароль" required >
		<button class="btn btn-lg btn-primary btn-block" type="submit">Вхід</button>
	</form>
</div>
</body>
</html>
