<?php
include("../config.php");
require_once('ly_check.php');

$sql="delete from jobs where jobid=".$_GET[jobid];
$arry=mysql_query($sql,$conn);
$sqlstr="delete from applyjob where jobid=".$_GET[jobid];
$arr=mysql_query($sqlstr,$conn);
if($arry&&$arr){
echo "<script> alert('É¾³ý³É¹¦');location='rindex.php';</script>";
}
else
echo "É¾³ýÊ§°Ü";
?>