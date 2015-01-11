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
if($_POST[action]=="insert"){
$sql = "insert into resumes (cid,name,age,sex,tel,email,education,skill,about) values('".$_SESSION['cid']."','".$_POST[name]."','".$_POST[age]."','".$_POST[sex]."','".$_POST[tel]."','".$_POST[email]."','".$_POST[education]."','".$_POST[skill]."','".$_POST[about]."')";
$arr=mysql_query($sql,$conn);
if ($arr){
		echo "<script language=javascript>alert('添加成功！');window.location='resume.php'</script>";
			}
			else{
				echo "<script>alert('添加失败');history.go(-1);</script>";
				}

		}
?>
<body>
<?php include("chead.php");?>
<form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript">
      <table width="782" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;简历&nbsp;&gt;&gt;&nbsp;新建简历</td>
        </tr>
        <tr>
          <td width="20%" align="right" class="td_bg">姓名：</td>
          <td width="80%" class="td_bg">
            <input name="name" type="text" id="name" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">年龄：</td>
          <td class="td_bg">
             <input name="age" type="text" id="age" size="30" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">性别：</td>
          <td class="td_bg">
            <input name="sex" type="text" id="sex" size="15" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">电话：</td>
          <td class="td_bg">
            <input name="tel" type="text" id="tel" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">电子邮箱：</td>
          <td class="td_bg">
          <input name="email" type="text" id="email" size="30" maxlength="30" />              </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">教育经历：</td>
          <td class="td_bg">
          <input name="education" type="text" id="education" size="30" maxlength="30" />  
            </td>
        </tr>
  <tr>
          <td align="right" class="td_bg">技能：</td>
          <td class="td_bg"> <input name="skill" type="text" id="skill" size="30" maxlength="30" />              </td>
        </tr>

        <tr>
          <td align="right" class="td_bg">相关介绍：</td>
          <td class="td_bg"> <input name="about" type="text" id="about" size="30" maxlength="30" />              </td>
        </tr>

        <tr>
          <td align="right" class="td_bg">
          <input type="hidden" name="action" value="insert">
            <input type="submit" name="button" id="button" value="提交" />          </td>
          <td class="td_bg">　　
            <input type="reset" name="button2" id="button2" value="重置" />       </td>
        </tr>
  </table>
</form>
</body>
</html>
