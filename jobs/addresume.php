<?php
include("config.php");
	if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('����û�е�½');window.location='candidateslogin.php'</script>";
			exit();
		}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Finding jobs</title>
<link rel="stylesheet" href="admin/images/css.css" type="text/css">
<script Language="JavaScript" Type="text/javascript">

function myform_Validator(theForm)
{

  if (theForm.name.value == "")
  {
    alert("������������");
    theForm.name.focus();
    return (false);
  }
    if (theForm.email.value == "")
  {
    alert("���������䡣");
    theForm.email.focus();
    return (false);
  }
    if (theForm.skill.value == "")
  {
    alert("�����뼼�ܡ�");
    theForm.skill.focus();
    return (false);
  }
 return (true);
 }

</script>
</head>
<?php
if($_POST[action]=="insert"){
$sql = "insert into resumes (cid,name,age,sex,tel,email,education,skill,about) values('".$_SESSION['cid']."','".$_POST[name]."','".$_POST[age]."','".$_POST[sex]."','".$_POST[tel]."','".$_POST[email]."','".$_POST[education]."','".$_POST[skill]."','".$_POST[about]."')";
$arr=mysql_query($sql,$conn);
if ($arr){
		echo "<script language=javascript>alert('��ӳɹ���');window.location='resume.php'</script>";
			}
			else{
				echo "<script>alert('���ʧ��');history.go(-1);</script>";
				}

		}
?>
<body>
<?php include("chead.php");?>
<form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript">
      <table width="782" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;����&nbsp;&gt;&gt;&nbsp;�½�����</td>
        </tr>
        <tr>
          <td width="20%" align="right" class="td_bg">������</td>
          <td width="80%" class="td_bg">
            <input name="name" type="text" id="name" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">���䣺</td>
          <td class="td_bg">
             <input name="age" type="text" id="age" size="30" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">�Ա�</td>
          <td class="td_bg">
            <input name="sex" type="text" id="sex" size="15" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">�绰��</td>
          <td class="td_bg">
            <input name="tel" type="text" id="tel" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">�������䣺</td>
          <td class="td_bg">
          <input name="email" type="text" id="email" size="30" maxlength="30" />              </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">����������</td>
          <td class="td_bg">
          <input name="education" type="text" id="education" size="30" maxlength="30" />  
            </td>
        </tr>
  <tr>
          <td align="right" class="td_bg">���ܣ�</td>
          <td class="td_bg"> <input name="skill" type="text" id="skill" size="30" maxlength="30" />              </td>
        </tr>

        <tr>
          <td align="right" class="td_bg">��ؽ��ܣ�</td>
          <td class="td_bg"> <input name="about" type="text" id="about" size="30" maxlength="30" />              </td>
        </tr>

        <tr>
          <td align="right" class="td_bg">
          <input type="hidden" name="action" value="insert">
            <input type="submit" name="button" id="button" value="�ύ" />          </td>
          <td class="td_bg">����
            <input type="reset" name="button2" id="button2" value="����" />       </td>
        </tr>
  </table>
</form>
</body>
</html>
