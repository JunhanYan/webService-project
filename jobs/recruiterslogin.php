<?php
include("config.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Finding Jobs</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<?php
//初始化session
if($_GET['tj'] == 'out'){
 session_destroy();
 echo "<script language=javascript>alert('退出成功！');window.location='recruiterslogin.php'</script>";
}
?>
<?
if($_POST['submit']){
// 如果已经登录过，直接退出
if(isset($_SESSION['rid'])) {
	//重定向到管理留言
	echo "<script language=javascript>alert('您已登陆');window.location='rindex.php'</script>";
	// 登录过的话，立即结束
   exit;
}
// 获得参数
$nickname=$_POST['rname'];
$password=$_POST['rpassword'];
//$password=md5($password);

// 检查帐号和密码是否正确,
$sql="select * from recruiters where rname='$nickname' and rpassword='$password'";
$re=mysql_query($sql,$conn);
$result=mysql_fetch_array($re);
// 如果用户登录正确
if(!empty($result)) {
	//注册session变量，保存当前会话用户的昵称
	$_SESSION['rid']=$result['rid'];
	// 登录成功重定向到管理页面
	echo "<script language=javascript>alert('登陆成功');window.location='rindex.php'</script>";
}
else { 
    // 管理员登录失败
	echo "<script language=javascript>alert('密码不正确');window.location='recruiterslogin.php'</script>";
	}
}
?>
<body>
<?php include("head.php");?>
<form  name="myform" method="post" onSubmit="return CheckPost()" action="" style="margin-bottom:5px;">
<table width="782" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="30" colspan="2" bgcolor="#FFFFFF">企业登录</td>
    </tr>
  <tr>
    <td width="337" align="right" bgcolor="#FFFFFF">用户名:
      </td>
    <td width="422" bgcolor="#FFFFFF"><input type="text" name="rname"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">密 码:
      </td>
    <td bgcolor="#FFFFFF"><input type="password" name="rpassword"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><a href="regr.php">注册新企业用户</a>
      </td>
    <td bgcolor="#FFFFFF"><input type="submit" name="submit" value="登录"></td>
  </tr>
</table>
</form>
</body>
</html>
