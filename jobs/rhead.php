<table width="780" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
  <tr>
    <td bgcolor="#FFFFFF"><img src="images/aa.jpg" width="780" height="150" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="780" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php" title="��ҳ">��ҳ</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('IT��');?>" title="IT��">IT��</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('������');?>" title="������">������</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('������');?>" title="������">������</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('������');?>" title="������">������</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rindex.php?proid=<?php echo urlencode('�����');?>" title="�����">�����</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="rsearch.php" title="�߼�����">�߼�����</a></td>
       
           <td width="100"  align="center" background="images/button1_bg.jpg">
           <?php 
	   
    	if ($_SESSION['rid']){
    	     echo "<a href=# >".$_SESSION['rid']."</a>&nbsp;&nbsp";
			echo "<a href='recruiterslogin.php?tj=out'  title='�˳�'>�˳�</a>";
		}else{
		echo "<a href='recruiterslogin.php' >��ҵ��½</a>&nbsp;&nbsp";
		}
		?></td>

      </tr>
    </table></td>
  </tr>
</table>
