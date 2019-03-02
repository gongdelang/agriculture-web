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
//由界面传过来的id参数
if(!isset($_GET["id"])){
		$id=1;
	}
	else if($_GET["id"]==""){
		$id=1;
	}
	else{
		$id=$_GET["id"];
	}
//由界面传过来的page参数
	if(!isset($_GET["page"])){
		$page=1;
	}
	else if($_GET["page"]==""){
		$page=1;
	}
	else{
		$page=$_GET["page"];
	}

//陈列information 模块
function information($form,$id,$page,$module){
	$update="UPDATE `$form` SET `id` = '$_POST[id]', `view` = '$_POST[view]', `title` = '$_POST[title]', `content` = '$_POST[content] ', `author` = '$_POST[author]', `laiyuan` = '$_POST[laiyuan]', `time` = '$_POST[time]', `picture` = '$_POST[picture]' WHERE `$form`.`id` = $id";
	$result=mysql_query($update);
	if($result){
		echo"<script language='javascript'>
		alert('修改成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('修改失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}

}


//-------------------------------------------------------------------
//陈列zhengce 模块
function zhengce($form,$id,$page,$module){
	$update="UPDATE `$form` SET `id` = '$_POST[id]', `view` = '$_POST[view]', `title` = '$_POST[title]', `content` = '$_POST[content] ', `time` = '$_POST[time]', `picture` = '$_POST[picture]' WHERE `$form`.`id` = $id";
	$result=mysql_query($update);
	if($result){
		echo"<script language='javascript'>
		alert('修改成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('修改失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
}

///-------------------------------------------------------------------
//陈列nongzi模块
function nongzi($form,$id,$page,$module){
	switch($form){
		case "nongzi-nongyao-shachongji":$nav=1;break;
		case "nongzi-nongyao-chucaoji":$nav=1;break;
		case "nongzi-nongyao-shajunji":$nav=1;break;
		case "nongzi-nongyao-tiaojieji":$nav=1;break;
		default:$nav=0;break;
	}
	if($nav==1){
		$update="UPDATE `$form` SET `id` = '$_POST[id]', `view` = '$_POST[view]', `name` = '$_POST[name]', `canshu` = '$_POST[canshu]', `time` = '$_POST[time]', `chanping` = '$_POST[chanping]', `zhuyi` = '$_POST[zhuyi]', `shiyong` = '$_POST[shiyong]', `fangzhi` = '$_POST[fangzhi]', `picture` = '$_POST[picture]' WHERE `$form`.`id` = $id";
		$result=mysql_query($update);
		if($result){
			echo"<script language='javascript'>
			alert('修改成功!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
		else{
			echo"<script language='javascript'>
			alert('修改失败!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
	}
	else{
		$update="UPDATE `$form` SET `id` = '$_POST[id]', `view` = '$_POST[view]', `name` = '$_POST[name]', `canshu` = '$_POST[canshu]',  `chanping` = '$_POST[chanping]',`picture` = '$_POST[picture]' WHERE `$form`.`id` = $id";
		$result=mysql_query($update);
		if($result){
			echo"<script language='javascript'>
			alert('修改成功!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
		else{
			echo"<script language='javascript'>
			alert('修改失败!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
	}
}

//陈列information 模块
function video($form,$id,$page,$module){
	$update="UPDATE `$form` SET `id` = '$_POST[id]',`view` = '$_POST[view]',`title` = '$_POST[title]', `content` = '$_POST[content] ',`picture` = '$_POST[picture]',`video` = '$_POST[video]' WHERE `$form`.`id` = $id";
	$result=mysql_query($update);
	if($result){
		echo"<script language='javascript'>
		alert('修改成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('修改失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
}
//-------------------------------------------------------------------
//陈列information 模块
function teach($form,$id,$page,$module){
	$update="UPDATE `$form` SET `id` = '$_POST[id]', `view` = '$_POST[view]', `name` = '$_POST[name]', `chapter` = '$_POST[chapter]',`picture` = '$_POST[picture]',`video` = '$_POST[video]' WHERE `$form`.`id` = $id";
		$result=mysql_query($update);
		if($result){
			echo"<script language='javascript'>
			alert('修改成功!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
		else{
			echo"<script language='javascript'>
			alert('修改失败!');
			</script>";
			echo
			"<script language='javascript'>
			window.history.back();
			</script>";
		}
}
//陈列information 模块
function bing_chong($form,$id,$page,$module){
	$update="UPDATE `$form` SET `id` = '$_POST[id]', `view` = '$_POST[view]', `title` = '$_POST[title]', `content` = '$_POST[content] ',`time` = '$_POST[time]', `picture` = '$_POST[picture]' WHERE `$form`.`id` = $id";
	$result=mysql_query($update);
	if($result){
		echo"<script language='javascript'>
		alert('修改成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('修改失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
}
//-------------------------------------------------------------------
//总调用函数
function all_enty($form,$id,$page,$module){
	switch($module){
		case "information":information($form,$id,$page,$module);break;
		case "zhengce":zhengce($form,$id,$page,$module);break;
		case "video":video($form,$id,$page,$module);break;
		case "teach":teach($form,$id,$page,$module);break;
		case "nongzi":nongzi($form,$id,$page,$module);break;
		case "bing_chong":bing_chong($form,$id,$page,$module);break;
		default:information($form,$id,$page,$module);break;
	}
}
all_enty($form,$id,$page,$module);
?>