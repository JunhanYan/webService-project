<?php
include("config.php");
	if ($_SESSION['rid']==""){
			echo "<script language=javascript>alert('您还没有登陆');window.location='recruiterslogin.php'</script>";
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
<?php include("rhead.php");?>
<?php
	$pagesize=20;
    $jobid = $_GET[jobid];
	$sql="select * from resumes where cid in (select cid from applyjob where jobid = $jobid)";
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
	$sql="select * from resumes where cid in (select cid from applyjob where jobid = $jobid) order by resumeid desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
?>
<table width="783" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      <tr>
        <td height="27" colspan="7" align="left" bgcolor="#FFFFFF" class="bg_tr">&nbsp;简历&nbsp;&gt;&gt;&nbsp;浏览简历</td>
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
    <a href="showresume.php?resumeid=<?php echo $rows[resumeid] ?>" class="trlink">查看简历</a>
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