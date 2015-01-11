<?php
include("config.php");
	if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('您还没有登陆');window.location='candidateslogin.php'</script>";
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
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;简历&nbsp;&gt;&gt;&nbsp;我的简历</td>
      </tr>
       <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF"><a href="addresume.php" class="trlink">添加</a></td>
      </tr>
      <tr>
        <td width="6%" height="35" align="center" bgcolor="#FFFFFF">ID</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">姓名</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">年龄</td>
        <td width="10%" align="center" bgcolor="#FFFFFF">性别</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">电话</td>
        <td width="24%" align="center" bgcolor="#FFFFFF">电邮</td>
        <td width="20%" align="center" bgcolor="#FFFFFF">操作</td>
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
<a href="updateresume.php?resumeid=<?php echo $rows[resumeid] ?>" class="trlink">修改</a>&nbsp;&nbsp;<a href="delresume.php?resumeid=<?php echo $rows[resumeid] ?>" class="trlink">删除</a></td>
</tr>
	<?php
	}
?>
</table>
</body>
</html>
