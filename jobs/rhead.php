<table width="780" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
  <tr>
    <td bgcolor="#FFFFFF"><img src="images/aa.jpg" width="780" height="150" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="780" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php" title="首页">首页</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('IT类');?>" title="IT类">IT类</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('销售类');?>" title="销售类">销售类</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('金融类');?>" title="金融类">金融类</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('人事类');?>" title="人事类">人事类</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('广告类');?>" title="广告类">广告类</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rsearch.php" title="高级搜索">高级搜索</a></td>
       
           <td width="100"  align="center" background="images/button1_bg.jpg">
           <?php 
	   
    	if ($_SESSION['rid']){
    	     echo "<a href=# >".$_SESSION['rid']."</a>&nbsp;&nbsp";
			echo "<a href='recruiterslogin.php?tj=out'  title='退出'>退出</a>";
		}else{
		echo "<a href='recruiterslogin.php' >企业登陆</a>&nbsp;&nbsp";
		}
		?></td>

      </tr>
    </table></td>
  </tr>
</table>
