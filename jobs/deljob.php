<?php
include("config.php");
	if ($_SESSION['rid']==""){
			echo "<script language=javascript>alert('����û�е�½');window.location='recruiterslogin.php'</script>";
			exit();
		}

$sql="delete from jobs where jobid=".$_GET[jobid];
$arry=mysql_query($sql,$conn);
$sqlstr="delete from applyjob where jobid=".$_GET[jobid];
$arr=mysql_query($sqlstr,$conn);
if($arry&&$arr){
echo "<script> alert('ɾ���ɹ�');location='rindex.php';</script>";
}
else
echo "ɾ��ʧ��";
?>