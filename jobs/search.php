<?php
include("config.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Finding jobs</title>
<link rel="stylesheet" href="admin/images/css.css" type="text/css">
</head>
<?php
	$pagesize=10;
	$sql = "select * from jobs where ".$_POST[seltype]." like ('%".$_POST[coun]."%')";
	$rs=mysql_query($sql);// or die("请输入查询条件!!!");
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
	$sql="select * from jobs where ".$_POST[seltype]." like ('%".$_POST[coun]."%') order by jobid desc limit $startno,$pagesize";
	$rs=mysql_query($sql);
    
?>
<body>
<?	if ($_SESSION['cid']==""){
        include("head.php");
    }else{
         include("chead.php");
    }
    ?>
<table width="786" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
  <tr>
    <td width="786" height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr">&nbsp;搜索&nbsp;&gt;&gt;&nbsp;高级搜索</td>
  <tr>
    <td height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr"><form id="form1" name="form1" method="post" action="" style="margin:0px; padding:0px;">
        <table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">
          <tr>
            <td width="36%" align="center">
              <select name="seltype" id="seltype">
               
                <option value="jobname">职位名称</option>
                <option value="jobskill">所需技能</option>
                <option value="rname">发布人/公司</option>
               
              </select>            </td>
            <td width="31%" align="center">
              <input type="text" name="coun" id="coun" />            </td>
            <td width="33%" align="center">
            <input type="submit" name="button" id="button" value="查询" onClick="return q_cont();" />            </td>
          </tr>
        </table>
    </form></td>  
  </table>
</td>
  </tr>
</table>
<table width="786" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      
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
   <td align="center" class="td_bg" width="20%">
     <a href="details.php?jobid=<?php echo $rows["jobid"] ?>" class="trlink">查看详情</a></td>
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
	首页 | 上一页 | <a href="?pageno=<?php echo $pageno+1?>">下一页</a> | <a href="?pageno=<?php echo $_POST[seltype]?>">末页</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上一页</a> | 下一页 | 末页
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1">首页</a> | <a href="?pageno=<?php echo $pageno-1?>">上一页</a> | <a href="?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">下一页</a> | <a href="?pageno=<?php echo $pagecount?>">末页</a>
	<?php
	}
?>
	&nbsp;页次：<?php echo $pageno ?>/<?php echo $pagecount ?>页&nbsp;共有<?php echo $recordcount?>条信息 </th>
	  </tr>
</table>
</body>
</html>