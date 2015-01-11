<?php
include("config.php");
	if ($_SESSION['rid']==""){
			echo "<script language=javascript>alert('您还没有登陆');window.location='recruiterslogin.php'</script>";
			exit();
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Finding Jobs</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<?
	$jobid=$_GET['jobid'];


// 检查帐号和密码是否正确,
$sql="select * from jobs where jobid='$jobid' and rid = '".$_SESSION['rid']."'";
$re=mysql_query($sql,$conn);
$result=mysql_fetch_array($re);

?>
<body>
<?php include("rhead.php");?>

<table width="782" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="200" align="right" bgcolor="#FFFFFF">职位名:
      </td>
    <td bgcolor="#FFFFFF"><?php echo $result["jobname"];?></td>
  <tr>
    <td align="right" bgcolor="#FFFFFF">职位介绍:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["jobabout"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">职位需求:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["jobskill"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">发布日期:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["starttime"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">截止日期:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["endtime"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">职位类型:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["type"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">发布人/公司:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["rname"];?></td>
  </tr>

 </table>
</body>
</html>
