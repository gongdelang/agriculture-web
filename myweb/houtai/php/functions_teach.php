<?php 
	include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_news_hot;
	}
	else if($_GET["form"]==""){
		$form=$sql_news_hot;
	}
	switch($_GET["form"]){
		case 1:$form=$sql_teach_guaguo;break;
		case 2:$form=$sql_teach_shucai;break;
		case 3:$form=$sql_teach_tree;break;
		case 4:$form=$sql_teach_funguns;break;
		case 5:$form=$sql_teach_foodcrop;break;
		case 6:$form=$sql_teach_cashcrop;break;
		default:$form=$sql_teach_guaguo;break;
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
$module="teach";
function left_nav($form){
	$nav0_first="<p class='p2'>教&nbsp;&nbsp;&nbsp;&nbsp;学</p>";
	$nav0="<p class='p3'><a  href='teach.php?form=1&page=1'>瓜果<span>></span></a></p>";
	$nav1="<p class='p3'><a href='teach.php?form=2&page=1'>蔬菜<span>></span></a></p>";
	//--------------------------------------------------------------------------------------
	$nav2="<p class='p3'><a href='teach.php?form=3&page=1'>果树<span>></span></a></p>";
		$nav3="<p class='p3'><a href='teach.php?form=4&page=1'>食用菌<span>></span></a></p>";
	$nav4="<p class='p3'><a href='teach.php?form=5&page=1'>粮食作物<span>></span></a></p>";
	$nav5="<p class='p3'><a href='teach.php?form=6&page=1'>经济作物<span>></span></a></p>";
	/*$nav6="<p class='p3'><a href='information.php?form=7&page=1'>行情明细<span>></span></a></p>";*/
	//根据不同的form来选择指定的样式
	switch($form){
		case "teach-guaguo":$nav0="<p class='p3'><a class='active' href='teach.php?form=1&page=1'>瓜果<span>></span></a></p>";break;
		case "teach-shucai":$nav1="<p class='p3'><a class='active' href='teach.php?form=2&page=1'>蔬菜<span>></span></a></p>";break;
		case "teach-tree":$nav2="<p class='p3'><a class='active' href='teach.php?form=3&page=1'>果树<span>></span></a></p>";break;
			case "teach-funguns":$nav3="<p class='p3'><a class='active' href='teach.php?form=4&page=1'>食用菌<span>></span></a></p>";break;
		case "teach-cashcrop":$nav4="<p class='p3'><a class='active' href='teach.php?form=5&page=1'>粮食作物<span>></span></a></p>";break;
		case "teach-foodcrop":$nav5="<p class='p3'><a class='active' href='teach.php?form=6&page=1'>经济作物<span>></span></a></p>";break;
		
		/*case "information-market":$nav6="<p class='p3'><a class='active' href='information.php?form=7&page=1'>行情明细<span>></span></a></p>";break;*/
		default:$nav0="<p class='p3'><a class='active' href='teach.php?form=1&page=1'>瓜果<span>></span></a></p>";break;
	}
	$nav_all=$nav0_first;
	$nav_all.=$nav0;
	$nav_all.=$nav1;
	$nav_all.=$nav2;
	$nav_all.=$nav3;
	$nav_all.=$nav4;
	$nav_all.=$nav5;
	/*$nav_all.=$nav6;*/
	echo $nav_all;		
}

//-----------------------------------------------------
//内导航
function nei_nav($form){
	switch($form){
		case "teach-guaguo":$nav="<span>瓜果</span>";break;
		case "teach-shucai":$nav="<span>蔬菜</span>";break;
		case "teach-tree":$nav="<span>果树</span>";break;
		case "teach-funguns":$nav="<span>食用菌</span>";break;
			case "teach-cashcrop":$nav="<span>粮食作物</span>";break;
			case "teach-foodcrop":$nav="<span>经济作物</span>";break;
		default:$nav="<span>瓜果</span>";break;
	}
	
  
	echo $nav;		
}
//-------------------------------------------------------------------
//陈列新闻
function  fengye($form,$page,$module){
	$star=($page-1)*8;
	$end=($page)*8;
	$dao=open_form_id_daoxu($form);
	$i=0;
	$li="<ul class='ul'>";
	while($row=mysql_fetch_array($dao)){
		if($star<=$i&&$i<$end){
			if($star<$end){
				++$star;
					$li.="<li><a href='teach.php?form=".$_GET["form"]."&id=";
					$li.=$row["id"];
					$li.="";
					//只有当有图片时才输出
					if($row["picture"]){
						$li.="<img src='../../teach/";
						$li.=$row["picture"];
						$li.="'/>";
					}
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<a class='tit' href='teach.php?form=".$_GET["form"]."&id=".$row["id"];
					$li.="&page=".$_GET["page"]."'>";
					//判断tite字符串长度
					$get_row=substr_cut($row["name"],60);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<a class='cont' href='teach.php?form=".$_GET["form"]."&id=".$row["id"];
					$li.="&page=".$_GET["page"]."'>";
					//判断content字符串长度
					$get_row=substr_cut($row["content"],60);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					
					
					$li.="<a id='shanchu' href='../shanchu.php?form=".$form."&id=".$row["id"]."'>删除</a>";
					$li.="<a class='xiugai' href='../houtai_detail.php?form=".$form."&id=".$row["id"]."&module=".$module."'>修改</a>";
				
				if($row["view"]==1){
					$li.="<p class='shenghe1'>通过</p>";
				}
				else{
					$li.="<p class='shenghe2'>未审核</p>";
				}
					
		
				
					//-----------------------------------------------------
					$li.="<p class=\"xian\">----------------------------------------------------------------------------------------------------</p></li>";		
			}
		}
	  	++$i;
		
	}
	$li.="</ul>";
	echo $li;
}
	
//------------分页--------------
function banner($form,$page){
			//获取总数据
			$total_sql="SELECT COUNT(*) FROM `$form`";
			$total_result=mysql_fetch_array(mysql_query($total_sql));
			$total=$total_result[0];
			$showPage=8;

			//计算共有多少页
			$total_pages=ceil($total/$showPage);
			//计算偏移量
			$pageOffset=($showPage-1)/2;
			//初始数据定义
			$page_banner="";
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
			$page_banner.="</form>";
			echo $page_banner; 
	}
?>