<?php include("config.php");?>
<html>

<body>
<?
// 如果图书编号没填写，提示用户
		$jobid=$_GET['jobid'];
		if ($jobid==""){
			echo "<script language=javascript>alert('编号不正确');window.location='index.php'</script>";
			exit();
		}
		else {
		?>
	<?
	// 借书
		// 查看用户ID是否已填
		if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('您还没有登陆');window.location='candidateslogin.php'</script>";
			exit();
		}else{
		// 可以正常借书，记录之
		// 获得当前日期
	//	$now = date("Y-m-d");
		$sqlstr="insert into applyjob(cid, jobid) values('".$_SESSION['cid']."','$jobid')";
	
        $arry=mysql_query($sqlstr,$conn);
        if ($arry){
				echo "<script> alert('申请成功');location='capplydetails.php';</script>";
			}
			else{
				echo "<script>alert('申请失败');history.go(-1);</script>";
				}

		
		
			?>
<?
}
	}
?>
</body>
</html>
