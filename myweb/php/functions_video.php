<?php 
	include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
if(!isset($_GET["form"])){
		$form=$sql_video_hot;
	}
	else if($_GET["form"]==""){
		$form=$sql_video_hot;
	}
	switch($_GET["form"]){
		case 1:$form=$sql_video_hot;break;
		case 2:$form=$sql_video_zhongzhi;break;
		case 3:$form=$sql_video_xinxi;break;
		case 4:$form=$sql_video_sannong;break;
		default:$form=$sql_video_hot;break;
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



//------------content--------------
function  video($form,$page){
	$star=($page-1)*8;
	$result=open_form($form,$star,8);
	$li="<ul>";
	while($row=mysql_fetch_array($result)){
		$li.="<li><a href='video_detail.php?";
		$li.="form=".$_GET["form"];
		$li.="&id=".$row["id"]."'  target='_black'><img src='";
		$li.=$row["picture"]."'><p>";
		//判断字符串长度
		$get_row=substr_cut($row["title"],30);
		$li.=$get_row;
		$li.="</p>";
		$li.="</a></li>";
	}
	$li.="</ul>";
	echo $li;
	//------------banner--------------
	//获取总数据
			$total_sql="SELECT COUNT(*) FROM `$form` WHERE `view`='1'";
			$total_result=mysql_fetch_array(mysql_query($total_sql));
			$total=$total_result[0];
			$showPage=8;

			//计算共有多少页
			$total_pages=ceil($total/$showPage);
			//计算偏移量
			$pageOffset=($showPage-1)/2;
			//初始数据定义
			$page_banner="<div class='banner' >";
			$kaishi=1;
			$end=$total_pages;
			//显示banner
			if($page>1){
				$page_banner.="<a href=\"".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=1\">首页</a>";
				$page_banner.="<a href=\"".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page-1)."\">上一页</a>";
			}
			else{
				$page_banner.="<span class='disable'>首页</span>";
				$page_banner.="<span class='disable'>上一页</span>";
			}
			if($total_pages>$showPage){
				if($page>$pageOffset+1){
					$page_banner.="...";	
				}
				//-------------------------------------------
				if($page>$pageOffset){
					$kaishi=$page-$pageOffset;
					$end=$total_pages>($page+$pageOffset)?($page+$pageOffset):$total_pages;
				}
				else{
					$kaishi=1;
					$end=$total_pages>$showPage?$showPage:$total_pages;
				}
				if($page+$pageOffset>$total_pages){
					$kaishi=$kaishi-($page+$pageOffset-$end);
				}
			}
			//-------显示分页条
			for($i=$kaishi;$i<=$end;$i++){
				if($page==$i){
					$page_banner.="<span class='current'>{$i}</span>";
				}
				else{
					$page_banner.="<a href=\"".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$i."\">{$i}</a>";
				}
			}
			//-------------------------------------------
			if($total_pages>$showPage&&$total_pages>($page+$pageOffset)){
				$page_banner.="...";	
			}
			if($page<$total_pages){
				$page_banner.="<a href=\"".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page+1)."\">下一页</a>";
				$page_banner.="<a href=\"".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$total_pages."\">尾页</a>";
			}
			else{
				$page_banner.="<span class='disable'>下一页</span>";
				$page_banner.="<span class='disable'>尾页</span>";
			}
			//-------------------------------------------

			//-------------------------------------------
			$page_banner.="<form action='".$_SERVER['PHP_SELF']."' method='get'>";
			$page_banner.="共".$total_pages."页/".$total."个，";
			$page_banner.="<input type='hidden' name='form' value='{$_GET["form"]}'>";
			$page_banner.="跳到第<input class='in1' type='text' size='2' name='page'>页";
			$page_banner.="<input class='in2' type='submit' value='确定' />";
			$page_banner.="</form></div>";
			echo $page_banner; 
}

function img($form){
	$result=open_form($form,0,5);
	while($row=mysql_fetch_array($result)){
		$li="<li><div class='gla_inbox'>";
		$li.="<p>";
		//判断字符串长度
		$get_row=substr_cut($row["title"],60);
		$li.=$get_row."</p>";
		$li.="<img src='";	
		$li.=$row["picture"]."'>";
		$li.="<a href='video_detail?form=1&id=".$row["id"]."' title='播放视频' target='_black'></a>";
		$li.="</div></li>";	
		echo $li;
	}
	
}
?>