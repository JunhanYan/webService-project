<?php
include("config.php");
	if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('����û�е�½');window.location='candidateslogin.php'</script>";
			exit();
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Finding jobs</title>
<link rel="stylesheet" href="admin/images/css.css" type="text/css"/>
</head>
<body>
<?php include("chead.php");?>
<?php
     $sql="select * from resumes where cid='".$_SESSION['cid']."'";
	$rs=mysql_query($sql);
?>
<table width="782" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;����&nbsp;&gt;&gt;&nbsp;�ҵļ���</td>
      </tr>
       <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF"><a href="addresume.php" class="trlink">���</a></td>
      </tr>
      <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">����</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">����</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">�Ա�</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">�绰</td>
        <td width="24%" align="center" bgcolor="#FFFFFF">����</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">����</td>
      </tr>
     <?php
	while($rows=mysql_fetch_assoc($rs))
	{
	?>
<tr align="center">
<td class="td_bg" height="26"><?php echo $rows["resumeid"]?></td>
<td class="td_bg" height="26"><?php echo $rows["name"]?></td>
<td class="td_bg" height="26"><?php echo $rows["age"]?></td>
<td height="26" class="td_bg"><?php echo $rows["sex"]?></td>
<td height="26" class="td_bg"><?php echo $rows["tel"]?></td>
<td height="26" class="td_bg"><?php echo $rows["email"]?></td>
<td class="td_bg">
<a href="updateresume.php?resumeid=<?php echo $rows[resumeid] ?>" class="trlink">�޸�</a>&nbsp;&nbsp;<a href="delresume.php?resumeid=<?php echo $rows[resumeid] ?>" class="trlink">ɾ��</a></td>
</tr>
	<?php
	}
?>
</table>
</body>
</html>
