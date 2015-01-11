<?php
include("../config.php");
require_once('ly_check.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Finding jobs</title>
<link rel="stylesheet" href="images/css.css" type="text/css">
<script Language="JavaScript" Type="text/javascript">

function myform_Validator(theForm)
{

  if (theForm.jobname.value == "")
  {
    alert("请输入职位名称。");
    theForm.jobname.focus();
    return (false);
  }
    if (theForm.jobabout.value == "")
  {
    alert("请输入职位介绍。");
    theForm.jobabout.focus();
    return (false);
  }
    if (theForm.jobskill.value == "")
  {
    alert("请输入所需技能。");
    theForm.jobskill.focus();
    return (false);
  }
 return (true);
 }

</script>
</head>
<?php
if($_POST[action]=="insert"){
$sql = "insert into jobs (jobname,jobabout,jobskill,starttime,endtime,type,rname,rid) values('".$_POST[jobname]."','".$_POST[jobabout]."','".$_POST[jobskill]."','".$_POST[starttime]."','".$_POST[endtime]."','".$_POST[type]."','".$_POST[rname]."','admin')";
$arr=mysql_query($sql,$conn);
if ($arr){
		echo "<script language=javascript>alert('添加成功！');window.location='rindex.php'</script>";
			}
			else{
				echo "<script>alert('添加失败');history.go(-1);</script>";
				}

		}
?>
<body>
<form id="myform" name="myform" method="post" action="" onsubmit="return myform_Validator(this)" language="JavaScript">
      <table width="782" border="0" align="center" cellpadding="2" cellspacing="1" class="table">
        <tr>
          <td colspan="2" align="left" class="bg_tr">&nbsp;工作&nbsp;&gt;&gt;&nbsp;新建工作</td>
        </tr>
        <tr>
          <td width="20%" align="right" class="td_bg">名称：</td>
          <td width="80%" class="td_bg">
            <input name="jobname" type="text" id="jobname" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">工作介绍：</td>
          <td class="td_bg">
             <input name="jobabout" type="text" id="jobabout" size="30" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">技能需求：</td>
          <td class="td_bg">
            <input name="jobskill" type="text" id="jobskill" size="30" maxlength="30" />         </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">发布时间：</td>
          <td class="td_bg">
            <input name="starttime" type="text" id="starttime" size="30" maxlength="30" />          </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">截至时间：</td>
          <td class="td_bg">
          <input name="endtime" type="text" id="endtime" size="30" maxlength="30" />              </td>
        </tr>
        <tr>
          <td align="right" class="td_bg">类型：</td>
          <td class="td_bg">
          <input name="type" type="text" id="type" size="30" maxlength="30" />  
            </td>
        </tr>
  <tr>
          <td align="right" class="td_bg">发布人/公司：</td>
          <td class="td_bg"> <input name="rname" type="text" id="rname" size="30" maxlength="30" />              </td>
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