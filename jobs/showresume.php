<?php
include("config.php");
	if ($_SESSION['rid']==""){
			echo "<script language=javascript>alert('����û�е�½');window.location='recruiterslogin.php'</script>";
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
	$resumeid=$_GET['resumeid'];


// ����ʺź������Ƿ���ȷ,
$sql="select * from resumes where resumeid=$resumeid";
$re=mysql_query($sql,$conn);
$result=mysql_fetch_array($re);

?>
<body>
<?php include("rhead.php");?>

<table width="782" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td width="200" align="right" bgcolor="#FFFFFF">����:
      </td>
    <td bgcolor="#FFFFFF"><?php echo $result["name"];?></td>
  <tr>
    <td align="right" bgcolor="#FFFFFF">����:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["age"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">�Ա�:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["sex"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">�绰:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["tel"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">�ʼ�:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["email"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">��������:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["education"];?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">����:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["skill"];?></td>
  </tr>
  <td align="right" bgcolor="#FFFFFF">��ؽ���:
      </td>
     <td bgcolor="#FFFFFF"><?php echo $result["about"];?></td>
  </tr>

 </table>
</body>
</html>
