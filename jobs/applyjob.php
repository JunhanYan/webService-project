<?php include("config.php");?>
<html>

<body>
<?
// ���ͼ����û��д����ʾ�û�
		$jobid=$_GET['jobid'];
		if ($jobid==""){
			echo "<script language=javascript>alert('��Ų���ȷ');window.location='index.php'</script>";
			exit();
		}
		else {
		?>
	<?
	// ����
		// �鿴�û�ID�Ƿ�����
		if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('����û�е�½');window.location='candidateslogin.php'</script>";
			exit();
		}else{
		// �����������飬��¼֮
		// ��õ�ǰ����
	//	$now = date("Y-m-d");
		$sqlstr="insert into applyjob(cid, jobid) values('".$_SESSION['cid']."','$jobid')";
	
        $arry=mysql_query($sqlstr,$conn);
        if ($arry){
				echo "<script> alert('����ɹ�');location='capplydetails.php';</script>";
			}
			else{
				echo "<script>alert('����ʧ��');history.go(-1);</script>";
				}

		
		
			?>
<?
}
	}
?>
</body>
</html>
