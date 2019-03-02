<?php
include("php/open.php");
//参数处理
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
		$id='';
	}
	else if($_GET["id"]==""){
		$id='';
	}
	else{
		$id=$_GET["id"];
	}

	$shanchu="DELETE FROM `$form` WHERE `$form`.`id` = $id";
	$result=mysql_query($shanchu);

	if($result){
		echo"<script language='javascript'>
		alert('删除成功!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
	else{
		echo"<script language='javascript'>
		alert('删除失败!');
		</script>";
		echo
		"<script language='javascript'>
		window.history.back();
		</script>";
	}
?>