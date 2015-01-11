<?php
include("config.php");
	if ($_SESSION['cid']==""){
			echo "<script language=javascript>alert('您还没有登陆');window.location='candidateslogin.php'</script>";
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
    alert("请输入姓名。");
    theForm.name.focus();
    return (false);
  }
    if (theForm.email.value == "")
  {
    alert("请输入邮箱。");
    theForm.email.focus();
    return (false);
  }
    if (theForm.skill.value == "")
  {
    alert("请输入技能。");
    theForm.skill.focus();
    return (false);
  }
 return (true);
 }

</script>
</head>
<?php
$sql="select * from resumes where resumeid=".$_GET[resumeid];
$arr=mysql_query($sql,$conn);
$rows=mysql_fetch_row($arr);
?>
<?php 
if($_POST[action]=="modify"){
$sqlstr = "update resumes set name = '".$_POST[name]."', age = '".$_POST[age]."', sex = '".$_POST[sex]."', tel = '".$_POST[tel]."', email = '".$_POST[email]."', education = '".$_POST[education]."', skill = '".$_POST[skill]."', about = '".$_POST[about]."' where resumeid = ".$_GET[resumeid];
$arry=mysql_query($sqlstr,$conn);
if ($arry){
				echo "<script> alert('修改成功');location='resume.php';</script>";
			}
			else{
				echo "<script>alert('修改失败');history.go(-1);</script>";
				}

		}
?>
<body>
<?php include("chead.php");?>
<form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript">
      <table width="782" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;简历&nbsp;&gt;&gt;&nbsp;更新简历</td>
        </tr>
        <tr>
          <td width="20%" align="right" class="td_bg">姓名：</td>
          <td width="80%" class="td_bg">
            <input name="name" type="text" id="name" value="<?php echo  $rows[1]; ?>" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">年龄：</td>
          <td class="td_bg">
             <input name="age" type="text" id="age" value="<?php echo  $rows[2]; ?>"  size="30" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">性别：</td>
          <td class="td_bg">
            <input name="sex" type="text" id="sex" value="<?php echo  $rows[3]; ?>"  size="15" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">电话：</td>
          <td class="td_bg">
            <input name="tel" type="text" id="tel"  value="<?php echo  $rows[4]; ?>" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">电子邮箱：</td>
          <td class="td_bg">
          <input name="email" type="text" id="email" value="<?php echo  $rows[5]; ?>"  size="30" maxlength="30" />              </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">教育经历：</td>
          <td class="td_bg">
          <input name="education" type="text" id="education" value="<?php echo  $rows[6]; ?>"  size="30" maxlength="30" />  
            </td>
        </tr>
  <tr>
          <td align="right" class="td_bg">技能：</td>
          <td class="td_bg"> <input name="skill" type="text" id="skill" value="<?php echo  $rows[7]; ?>"  size="30" maxlength="30" />              </td>
        </tr>

        <tr>
          <td align="right" class="td_bg">相关介绍：</td>
          <td class="td_bg"> <input name="about" type="text" id="about" value="<?php echo  $rows[8]; ?>"  size="30" maxlength="30" />              </td>
        </tr>

        <tr>
          <td align="right" class="td_bg">
          <input type="hidden" name="action" value="modify">
            <input type="submit" name="button" id="button" value="提交" />          </td>
          <td class="td_bg">　　
            <input type="reset" name="button2" id="button2" value="重置" />       </td>
        </tr>
  </table>
</form>
</body>
</html>
