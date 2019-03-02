<?php
include("php/open.php");
//参数处理
//由界面传过来的module参数
	if(!isset($_GET["module"])){
		$module="information";
	}
	else if($_GET["module"]==""){
		$module="information";
	}
	else{
		$module=$_GET["module"];
	}
//---------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_news_hot;
	}
	else if($_GET["form"]==""){
		$form=$sql_news_hot;
	}
	else{
		$form=$_GET["form"];
	}
//陈列information 模块
function information($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `content`, `author`, `laiyuan`, `time`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[content]', '$_POST[author]', '$_POST[laiyuan]', '$_POST[time]', '$_POST[picture]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('添加失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}

}


//-------------------------------------------------------------------
//陈列zhengce 模块
function zhengce($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `content`,`time`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[content]', '$_POST[time]', '$_POST[picture]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo $form;
	}
}

///-------------------------------------------------------------------
//陈列nongzi模块
function nongzi($form,$module){
	switch($form){
		case "nongzi-nongyao-shachongji":$nav=1;break;
		case "nongzi-nongyao-chucaoji":$nav=1;break;
		case "nongzi-nongyao-shajunji":$nav=1;break;
		case "nongzi-nongyao-tiaojieji":$nav=1;break;
		default:$nav=0;break;
	}
	if($nav==1){
		$insert="INSERT INTO `$form` (`id`, `view`, `name`, `canshu`, `time`, `chanping`, `zhuyi`, `shiyong`, `fangzhi`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[name]', '$_POST[canshu]', '$_POST[time]', '$_POST[chanping]', '$_POST[zhuyi]', '$_POST[shiyong]', '$_POST[fangzhi]', '$_POST[picture]') ";
		$result=mysql_query($insert);
		if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
		else{
			echo"<script language='javascript'>
			alert('添加失败!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
	}
	else{
		$insert="INSERT INTO `$form` (`id`, `view`, `name`, `canshu`, `chanping`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[name]', '$_POST[canshu]', '$_POST[chanping]', '$_POST[picture]') ";
		$result=mysql_query($insert);
		if($result){
			echo"<script language='javascript'>
			alert('添加成功!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
		else{
			echo"<script language='javascript'>
			alert('添加失败!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
	}
}

//陈列information 模块
function video($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `content`,`picture`,`video`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[content]', '$_POST[picture]','$_POST[video]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('添加失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
}
//-------------------------------------------------------------------
//陈列information 模块
function teach($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `name`, `title`, `chapter`, `content`, `picture`, `video`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[name]', '$_POST[title]', '$_POST[chapter]', '$_POST[content]', '$_POST[picture]', '$_POST[video]') ";
	$result=mysql_query($insert);
		if($result){
			echo"<script language='javascript'>
			alert('添加成功!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
		else{
			echo"<script language='javascript'>
			alert('添加失败!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
}
//陈列information 模块
function bing_chong($form,$module){
	$insert="INSERT INTO `$form` (`id`, `view`, `title`, `content`,`time`, `picture`) VALUES ('$_POST[id]', '$_POST[view]', '$_POST[title]', '$_POST[content]', '$_POST[time]', '$_POST[picture]')";
	$result=mysql_query($insert);
	if($result){
		echo"<script language='javascript'>
		alert('添加成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('添加失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
}
//-------------------------------------------------------------------
//总调用函数
function all_enty($form,$module){
	switch($module){
		case "information":information($form,$module);break;
		case "zhengce":zhengce($form,$module);break;
		case "video":video($form,$module);break;
		case "teach":teach($form,$module);break;
		case "nongzi":nongzi($form,$module);break;
		case "bing_chong":bing_chong($form,$module);break;
		default:information($form,$module);break;
	}
}
all_enty($form,$module);
?>