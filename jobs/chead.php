<table width="780" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC" >
  <tr>
    <td bgcolor="#FFFFFF"><img src="images/aa.jpg" width="780" height="150" /></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFFF"><table width="780" height="30" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php" title="��ҳ">��ҳ</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('IT��');?>" title="IT��">IT��</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('������');?>" title="������">������</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('������');?>" title="������">������</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('������');?>" title="������">������</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="index.php?proid=<?php echo urlencode('�����');?>" title="�����">�����</a></td>
       <td align="center" background="images/button1_bg.jpg"><a href="search.php" title="�߼�����">�߼�����</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="resume.php" title="�ҵļ���">�ҵļ���</a></td>
        <td align="center" background="images/button1_bg.jpg"><a href="capplydetails.php" title="������ְλ">������ְλ</a></td>
        <td  width="100" align="center" background="images/button1_bg.jpg">
        <?php 
		
        if ($_SESSION['cid']){
            echo "<a href=# >".$_SESSION['cid']."</a>&nbsp;&nbsp";
			echo "<a href='candidateslogin.php?tj=out'  title='�˳�'>�˳�</a>";
		}else{
		echo "<a href='candidateslogin.php' >��ְ�ߵ�½</a>&nbsp;&nbsp";
		}
		?></td>

      </tr>
    </table></td>
  </tr>
</table>
