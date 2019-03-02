<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录界面</title>
<style type="text/css">
*{ margin:0px; padding:0px;}
body{ font-size:12px; font-family:"Microsoft Yahei","宋体",Verdana, Geneva, sans-serif; color:#3E3E3E;}
ul,li{ list-style:none;}
.clear{ clear:both;}
table{ border:0; font-size:13px;}
a{ color:#3E3E3E; text-decoration:none;}
a:hover{ color:#555;}
img{ border:0;}
input{vertical-align:middle; display:inline;}
.button{ padding:3px 8px; line-height:20px; border:1px #7C7C7C solid;}

.buton{ padding:2px 4px; line-height:18px; border:1px #7C7C7C solid; line-height:18px;}

.input {
	BORDER-RIGHT: #cde6ff 1px solid; PADDING-RIGHT: 3px; BORDER-TOP: #cde6ff 1px solid; PADDING-LEFT: 3px; FONT-SIZE: 12px; BACKGROUND: #fff; PADDING-BOTTOM: 0px; BORDER-LEFT: #cde6ff 1px solid; COLOR: #505050; LINE-HEIGHT: 20px; PADDING-TOP: 0px; BORDER-BOTTOM: #cde6ff 1px solid; HEIGHT: 20px
}
/*login*/
#m_top{ width:100%; height:180px; overflow:hidden;/*border:1px solid red;*/}
#login{ width:750px; height:210px; margin:0px auto;/*border:1px solid red;*/}
.l_l{ width:400px; float:left;/*border:1px solid red;*/}
.l_l_c{ width:100%; height:210px; background:url(css/tips_picture/logo.png) no-repeat right top; overflow:hidden;}
.l_r{ width:345px; float:right;margin-top:20px;/*border:1px solid red;*/}
.l_r_form{ width:100%;}
.l_r_form .l_table{ border:0;}
.l_r_form .l_table .td1{ text-align:right;}
.l_r_form .l_table .td2{ text-align:center;}
.l_r_form .l_table .td3{ text-align:center; font:14px/30px "Microsoft Yahei"; color:#A5A5A5;}
.l_r_form span{ font:15px/30px "Microsoft Yahei";}
.l_r_form .u_input{ width:200px; height:25px; padding:3px; font-size:14px; line-height:20px; border:1px #C9C9C9 solid;}
.l_r_form .input_on{ width:200px; height:25px; padding:3px; font-size:14px; line-height:20px; border:1px #FD8C5B solid; background-color:#FFFFCC;}
.l_r_form .u_button{ padding:3px 8px; line-height:20px; border:1px #7C7C7C solid; background:url(css/tips_picture/button.gif) repeat-x;}
.l_r_form .u_yzm{ width:60px; height:18px; padding:2px 3px; border:1px #C9C9C9 solid; line-height:18px;}
.l_r_form .u_yzm_f{ width:60px; height:18px; padding:2px 3px; border:1px #FD8C5B solid; line-height:18px; background-color:#FFFFCC;}
.l_r_form .l_table .td4 img{ vertical-align:middle;}
.l_r_form .log_yzm{ width:70px; height:20px; padding:2px 3px; border:1px #C9C9C9 solid; line-height:18px;}

#copy{ width:100%; margin:70px auto; overflow:hidden;}
.copy{ width:1000px; margin:0px auto;  text-align:center; line-height:36px; overflow:hidden;}
.copy a:hover{background:#2ea760;border-radius:2px;color:#FFFFFF;}

.td{ border-bottom:1px #DBDBDB dotted; line-height:32px; font-size:13px; background-color:#FFF;}
</style>
</head>

<script language="javascript">
function check(){
	if(dl.zhanghao.value == ""){
		alert("账号不能为空！");
		return false;
	}
	if(dl.mima.value == ""){
		alert("密码不能为空！");
		login.mima.focus();
		return false;
	}
	if(dl.checkcode.value == ""){
		alert("验证码不能为空！");
		login.checkcod.focus();
		return false;
	}
}
</script>

<?php
session_start();
include("php/open.php");
$sql="SELECT * FROM `syt`";
$res=mysql_query($sql);
$row=mysql_fetch_array($res);
	
if (isset($_POST['submit'])){
	
	$sql="SELECT * FROM `syt` WHERE zhanghao = '$_POST[zhanghao]'";
	$query=mysql_query($sql);
	$arr=mysql_fetch_array($query);
	//print_r($arr);
	if($arr){
		if($_POST["checkcode"]!=$_SESSION["randval"]){
			echo"<script language='javascript'>
			alert('验证码错误！')
			</script>";
		}
		else if($_POST["mima"] == $arr["mima"]){
			setcookie("zhanghao","$_POST[zhanghao]");
			echo"<script language='javascript'>
			location.href=('houtai/houtai.php')
			</script>";
		}
		else{
			echo"<script language='javascript'>
			alert('密码错误！')
			</script>";
		}
	}
	else{
		echo"<script language='javascript'>
		alert('账号不存在！');
		</script>";
	}
}?>

<body>
<div id="m_top"></div>
<div id="login">
  <div class="l_l">
    <div class="l_l_c">
 
    </div>
  </div>
 
  <div class="l_r">
    <div class="l_r_form">
      <form name="dl" method="post" action="denglu.php" onSubmit="return check()">
      <table cellpadding="5" cellspacing="10" class="l_table">
        <tr>
          <td class="td1"><span>登录账号：</span></td>
          <td><input type="text" name="zhanghao" class="u_input" onfocus="this.className='input_on';this.onmouseout=''" onblur="this.className='u_input';this.onmouseout=function(){this.className='u_input'};" onmousemove="this.className='input_on'" onmouseout="this.className='u_input'" /></td>
        </tr>
        <tr>
          <td class="td1"><span>登录密码：</span></td>
          <td><input type="password" name="mima" class="u_input" onfocus="this.className='input_on';this.onmouseout=''" onblur="this.className='u_input';this.onmouseout=function(){this.className='u_input'};" onmousemove="this.className='input_on'" onmouseout="this.className='u_input'" /></td>
        </tr>
        <tr>
          <td class="td1"><span>验证码：</span></td>
          <td class="td4"><input type="text" name="checkcode" class="log_yzm" /> <img src="code.php?act=yes" align="middle"></td>
        </tr>
        <tr>
          <td colspan="2" class="td2"><input type="submit" value="提交" class="u_button" name="submit"  />&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" value="重填" class="u_button" /></td>
        </tr>
        <tr>
          <td colspan="2" class="td3">友情提示：非网站管理员自觉离开此页面</td>
        </tr>
      </table>
      </form>
    </div>
  </div>
  <div class="clear"></div>
</div>
<div id="copy">
  <div class="copy"><a href="index.php" target="_blank" >新疆农业技术学习平台</a></div>
</div>
</body>
</html>








