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
	$rs=mysql_query($sql);// or die("�������ѯ����!!!");
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
    <td width="786" height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr">&nbsp;����&nbsp;&gt;&gt;&nbsp;�߼�����</td>
  <tr>
    <td height="27" valign="top" bgcolor="#FFFFFF" class="bg_tr"><form id="form1" name="form1" method="post" action="" style="margin:0px; padding:0px;">
        <table width="45%" height="42" border="0" align="center" cellpadding="0" cellspacing="0" class="bk">
          <tr>
            <td width="36%" align="center">
              <select name="seltype" id="seltype">
               
                <option value="jobname">ְλ����</option>
                <option value="jobskill">���輼��</option>
                <option value="rname">������/��˾</option>
               
              </select>            </td>
            <td width="31%" align="center">
              <input type="text" name="coun" id="coun" />            </td>
            <td width="33%" align="center">
            <input type="submit" name="button" id="button" value="��ѯ" onClick="return q_cont();" />            </td>
          </tr>
        </table>
    </form></td>  
  </table>
</td>
  </tr>
</table>
<table width="786" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" class="table" >
      
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
   <td align="center" class="td_bg" width="20%">
     <a href="details.php?jobid=<?php echo $rows["jobid"] ?>" class="trlink">�鿴����</a></td>
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
	��ҳ | ��һҳ | <a href="?pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="?pageno=<?php echo $_POST[seltype]?>">ĩҳ</a>
	<?php
	}
	else if($pageno==$pagecount)
	{
	?>
	<a href="?pageno=1">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>">��һҳ</a> | ��һҳ | ĩҳ
	<?php
	}
	else
	{
	?>
	<a href="?pageno=1">��ҳ</a> | <a href="?pageno=<?php echo $pageno-1?>">��һҳ</a> | <a href="?pageno=<?php echo $pageno+1?>" class="forumRowHighlight">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>">ĩҳ</a>
	<?php
	}
?>
	&nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ </th>
	  </tr>
</table>
</body>
</html>