<?php 
	include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_illness_guaguo;
	}
	else if($_GET["form"]==""){
		$form=$sql_illness_guaguo;
	}
	switch($_GET["form"]){
		case 1:$form=$sql_illness_guaguo;break;
		case 2:$form=$sql_illness_shucai;break;
		case 3:$form=$sql_illness_tree;break;
		case 4:$form=$sql_illness_datian;break;
			
		case 5:$form=$sql_wrom_guaguo;break;
		case 6:$form=$sql_wrom_shucai;break;
		case 7:$form=$sql_wrom_tree;break;
		case 8:$form=$sql_wrom_datian;break;
			
		default:$form=$sql_illness_guaguo;break;
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
//-----------------------------------------------------
//------------title--------------
function titile($form){
	$div="<div class='title'>";
	$div.="<div class='nav'>";
	$div.="<span>您当前的位置是:</span>";
	$div.="<a href='../index.php' target='_blank'>首页></a><span>病虫害防治></span>";
	switch($form){
			case "illness-guaguo":$div.="<span>瓜果病害</span></div>";break;
			case "illness-shucai":$div.="<span>蔬菜病害</span></div>";break;
			case "illness-tree":$div.="<span>果树病害</span></div>";break;
			case "illness-datian":$div.="<span>大田作物病害</span></div>";break;
								
			case "wrom-guaguo":$div.="<span>瓜果虫害</span></div>";break;
			case "wrom-shucai":$div.="<span>蔬菜虫害</span></div>";break;
			case "wrom-tree":$div.="<span>果树虫害</span></div>";break;
			case "wrom-datian":$div.="<span>大田作物虫害</span></div>";break;
								
			default:$div.="<span>瓜果病害</span></div>";break;
	
						}
	
	$div.="<div class='background'></div></div>";
	echo $div;			
}

//-----------------------------------------------------
//------------content--------------
function  fengye($form,$page){
	$star=($page-1)*5;
	$result=open_form($form,$star,5);
	$li="<ul class='ul'>";
	while($row=mysql_fetch_array($result)){
			$li.="<li><a href='bing_chong_detail.php?form=".$_GET["form"]."&id=";
			$li.=$row["id"];
			$li.="' target='_blank'><img src=\"";
			$li.=$row["picture"];
			$li.="\"/></a>";
			//-----------------------------------------------------
			$li.="<a class='tit' href='bing_chong_detail.php?form=".$_GET["form"]."&id=".$row["id"];
			$li.="&page=".$_GET["page"];
			$li.="' target='_blank'>";
			//判断tite字符串长度
			$get_row=substr_cut($row["title"],60);
			$li.=$get_row;
			$li.="</a>";
			//-----------------------------------------------------
			$li.="<a class='cont' href='bing_chong_detail.php?form=".$_GET["form"]."&id=".$row["id"];
			$li.="&page=".$_GET["page"];
			$li.="' target='_blank'>";
			//判断content字符串长度
			$get_row=substr_cut($row["content"],80);
			$li.=$get_row;
			$li.="</a>";
			//-----------------------------------------------------
			$li.="<p class=\"time\">";
			$li.=$row["time"];
			$li.="</p>";
			//-----------------------------------------------------
			$li.="<p class=\"xian\">----------------------------------------------------------------------------------------------------</p></li>";		
	}
	$li.="</ul>";
	echo $li;
	
	
	//------------banner--------------
	//获取总数据
			$total_sql="SELECT COUNT(*) FROM `$form` WHERE `view`='1'";
			$total_result=mysql_fetch_array(mysql_query($total_sql));
			$total=$total_result[0];
			$showPage=5;

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
?>