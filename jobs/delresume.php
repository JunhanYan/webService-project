<?php
include("config.php");
	if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('����û�е�½');window.location='candidateslogin.php'</script>";
			exit();
		}

$sql="delete from resumes where resumeid=".$_GET[resumeid];
$arry=mysql_query($sql,$conn);
if($arry){
echo "<script> alert('ɾ���ɹ�');location='resume.php';</script>";
}
else
echo "ɾ��ʧ��";
?>