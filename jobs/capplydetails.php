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
	$pagesize=20;
    $cid =$_SESSION['cid'];
	$sql="select * from jobs where jobid in (select jobid from applyjob where cid = $cid)";
	$rs=mysql_query($sql);
	$recordcount=mysql_num_rows($rs);
	$pagecount=($recordcount-1)/$pagesize+1;
	$pagecount=(int)$pagecount;
	$pageno=$_GET["pageno"];
	if($pageno=="")
	{
		$pageno=1;
	}
	if($pageno<1)
	{
		$pageno=1;
	}
	if($pageno>$pagecount)
	{
		$pageno=$pagecount;
	}
	$startno=($pageno-1)*$pagesize;
	$sql="select * from jobs where jobid in (select jobid from applyjob where cid = $cid) order by jobid desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
<table width="783" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;ְλ&nbsp;&gt;&gt;&nbsp;����ְλ</td>
      </tr>
       <tr>
      <td width="5%" height="30" align="center" bgcolor="#FFFFFF" class="line2">ID</td>
	    <td width="20%" align="center" bgcolor="#FFFFFF" class="line2">��������</td>
	    <td width="10%" align="center" bgcolor="#FFFFFF" class="line2">����ʱ��</td>
	    <td width="10%" align="center" bgcolor="#FFFFFF" class="line2">����ʱ��</td>
	    <td width="8%" align="center" bgcolor="#FFFFFF" class="line2">���</td>
	    <td width="17%" align="center" bgcolor="#FFFFFF" class="line2">������/��˾</td>
	    <td width="23%" align="center" bgcolor="#FFFFFF" colspan="2" class="line2">����</td>
	    </tr>
     <?php
	while($rows=mysql_fetch_assoc($rs))
	{
    	?>
   <tr>
	  <td height="30" align="center" bgcolor="#FFFFFF"><?php echo $rows["jobid"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["jobname"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["starttime"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["endtime"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["type"];?></td>
	  <td align="center" bgcolor="#FFFFFF"><?php echo $rows["rname"];?></td>
    <td align="center" class="td_bg">
    <a href="details.php?jobid=<?php echo $rows["jobid"] ?>" class="trlink">�鿴����</a>
    </tr>
	<?php
	}
?>
	   <tr>
      <th height="25" colspan="7" align="center" class="bg_tr">
    <?php
	if($pageno==1)
	{
	?>
	��ҳ | ��һҳ | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $id?>">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $id?>">ĩҳ</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1&id=<?php echo $id?>">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $id?>">��һҳ</a> | ��һҳ | ĩҳ
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1&id=<?php echo $id?>">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $id?>">��һҳ</a> | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $id?>" class="forumRowHighlight">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $id?>">ĩҳ</a>
	<?php
	}
?>
	&nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ </th>
	  </tr> 
</table>
</body>
</html>