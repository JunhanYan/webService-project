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
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;职位&nbsp;&gt;&gt;&nbsp;已申职位</td>
      </tr>
       <tr>
      <td width="5%" height="30" align="center" bgcolor="#FFFFFF" class="line2">ID</td>
	    <td width="20%" align="center" bgcolor="#FFFFFF" class="line2">工作名称</td>
	    <td width="10%" align="center" bgcolor="#FFFFFF" class="line2">发布时间</td>
	    <td width="10%" align="center" bgcolor="#FFFFFF" class="line2">结束时间</td>
	    <td width="8%" align="center" bgcolor="#FFFFFF" class="line2">类别</td>
	    <td width="17%" align="center" bgcolor="#FFFFFF" class="line2">发布人/公司</td>
	    <td width="23%" align="center" bgcolor="#FFFFFF" colspan="2" class="line2">操作</td>
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
    <a href="details.php?jobid=<?php echo $rows["jobid"] ?>" class="trlink">查看详情</a>
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
	首页 | 上一页 | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $id?>">下一页</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $id?>">末页</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1&id=<?php echo $id?>">首页</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $id?>">上一页</a> | 下一页 | 末页
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1&id=<?php echo $id?>">首页</a> | <a href="?pageno=<?php echo $pageno-1?>&id=<?php echo $id?>">上一页</a> | <a href="?pageno=<?php echo $pageno+1?>&id=<?php echo $id?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>&id=<?php echo $id?>">末页</a>
	<?php
	}
?>
	&nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息 </th>
	  </tr> 
</table>
</body>
</html>