<?php
include("config.php");
	if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('Äú»¹Ã»ÓÐµÇÂ½');window.location='candidateslogin.php'</script>";
			exit();
		}

$sql="delete from resumes where resumeid=".$_GET[resumeid];
$arry=mysql_query($sql,$conn);
if($arry){
echo "<script> alert('É¾³ý³É¹¦');location='resume.php';</script>";
}
else
echo "É¾³ýÊ§°Ü";
?>