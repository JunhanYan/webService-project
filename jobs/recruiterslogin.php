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
//��ʼ��session
if($_GET['tj'] == 'out'){
 session_destroy();
 echo "<script language=javascript>alert('�˳��ɹ���');window.location='recruiterslogin.php'</script>";
}
?>
<?
if($_POST['submit']){
// ����Ѿ���¼����ֱ���˳�
if(isset($_SESSION['rid'])) {
	//�ض��򵽹�������
	echo "<script language=javascript>alert('���ѵ�½');window.location='rindex.php'</script>";
	// ��¼���Ļ�����������
   exit;
}
// ��ò���
$nickname=$_POST['rname'];
$password=$_POST['rpassword'];
//$password=md5($password);

// ����ʺź������Ƿ���ȷ,
$sql="select * from recruiters where rname='$nickname' and rpassword='$password'";
$re=mysql_query($sql,$conn);
$result=mysql_fetch_array($re);
// ����û���¼��ȷ
if(!empty($result)) {
	//ע��session���������浱ǰ�Ự�û����ǳ�
	$_SESSION['rid']=$result['rid'];
	// ��¼�ɹ��ض��򵽹���ҳ��
	echo "<script language=javascript>alert('��½�ɹ�');window.location='rindex.php'</script>";
}
else { 
    // ����Ա��¼ʧ��
	echo "<script language=javascript>alert('���벻��ȷ');window.location='recruiterslogin.php'</script>";
	}
}
?>
<body>
<?php include("head.php");?>
<form  name="myform" method="post" onSubmit="return CheckPost()" action="" style="margin-bottom:5px;">
<table width="782" border="0" align="center" cellpadding="5" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
    <td height="30" colspan="2" bgcolor="#FFFFFF">��ҵ��¼</td>
    </tr>
  <tr>
    <td width="337" align="right" bgcolor="#FFFFFF">�û���:
      </td>
    <td width="422" bgcolor="#FFFFFF"><input type="text" name="rname"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">�� ��:
      </td>
    <td bgcolor="#FFFFFF"><input type="password" name="rpassword"></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><a href="regr.php">ע������ҵ�û�</a>
      </td>
    <td bgcolor="#FFFFFF"><input type="submit" name="submit" value="��¼"></td>
  </tr>
</table>
</form>
</body>
</html>
