<?php 
	include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form=$sql_nongzi_nongyao_shachongji;
	}
	else if($_GET["form"]==""){
		$form=$sql_nongzi_nongyao_shachongji;
	}
	switch($_GET["form"]){
		case 1:$form=$sql_nongzi_nongyao_shachongji;break;
		case 2:$form=$sql_nongzi_nongyao_shajunji;break;
		case 3:$form=$sql_nongzi_nongyao_chucaoji;break;
		case 4:$form=$sql_nongzi_nongyao_tiaojieji;break;
			
		case 5:$form=$sql_nongzi_huafei_fuhe;break;
		case 6:$form=$sql_nongzi_huafei_shenwu;break;
		case 7:$form=$sql_nongzi_huafei_jia;break;
		case 8:$form=$sql_nongzi_huafei_youji;break;
			
		case 9:$form=$sql_nongzi_zhongzi_datian;break;
		case 10:$form=$sql_nongzi_zhongzi_guaguo;break;
		case 11:$form=$sql_nongzi_zhongzi_shucai;break;
			
		case 12:$form=$sql_nongzi_jixie_yunshu;break;
		case 13:$form=$sql_nongzi_jixie_jiagong;break;
		case 14:$form=$sql_nongzi_jixie_caishou;break;
			
		default:$form=$sql_nongzi_nongyao_shachongji;break;
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

$module="nongzi";
//-----------------------------------------------------
//------------title--------------
function titile($form){
	$div="<div class='title'>";
	$div.="<div class='nav'>";
	$div.="<span>您当前的位置是:</span>";
	$div.="<a href='../index.php' target='_blank'>首页></a><span>农资信息></span>";
	switch($form){
			case "nongzi-nongyao-shachongji":$div.="<span>杀虫剂</span></div>";break;
			case "nongzi-nongyao-chucaoji":$div.="<span>除草剂</span></div>";break;
			case "nongzi-nongyao-shajunji":$div.="<span>杀菌剂</span></div>";break;
			case "nongzi-nongyao-tiaojieji":$div.="<span>调节剂</span></div>";break;
								
			case "nongzi-huafei-fuhe":$div.="<span>复合肥</span></div>";break;
			case "nongzi-huafei-jia":$div.="<span>钾肥</span></div>";break;
			case "nongzi-huafei-shenwu":$div.="<span>生物肥</span></div>";break;
			case "nongzi-huafei-youji":$div.="<span>有机肥</span></div>";break;
								
			case "nongzi-zhongzi-datian":$div.="<span>大田种子</span></div>";break;
			case "nongzi-zhongzi-shucai":$div.="<span>蔬菜种子</span></div>";break;
			case "nongzi-zhongzi-guaguo":$div.="<span>瓜果种子</span></div>";break;
								
			case "nongzi-jixie-yunshu":$div.="<span>运输</span></div>";break;
			case "nongzi-jixie-caishou":$div.="<span>采收</span></div>";break;
			case "nongzi-jixie-jiagong":$div.="<span>加工</span></div>";break;
								
			default:$div.="<span>杀虫剂</span></div>";break;
	
						}
	
	$div.="<div class='background'></div></div>";
	echo $div;			
}

//-----------------------------------------------------
//------------content--------------
function  ul($form,$page){
	$star=($page-1)*8;
	$result=open_form($form,$star,8);
	$li="<ul>";
	while($row=mysql_fetch_array($result)){
		$li.="<li><a href='nongzi_detail.php?";
		$li.="form=".$_GET["form"];
		$li.="&id=".$row["id"]."'  target='_blank'><img src='../../nongzi/";
		$li.=$row["picture"]."'><p>";
		//判断字符串长度
		$get_row=substr_cut($row["name"],30);
		$li.=$get_row;
		$li.="</p>";
		$li.="<p class='chanping'><span>产品说明:</span>";
		//判断字符串长度
		$get_row=substr_cut($row["chanping"],80);
		$li.=$get_row."</p>";
		
		$li.="</a>";
		
		$li.="<a id='shanchu' href='../shanchu.php?form=".$form."&id=".$row["id"]."'>删除</a>";
					$li.="<a id='xiugai' href='../houtai_detail.php?form=".$form."&id=".$row["id"]."&module=nongzi' target='_blank'>修改</a>";
				
				if($row["view"]==1){
					$li.="<span id='shenghe1'>通过</span>";
				}
				else{
					$li.="<span id='shenghe2'>未审核</span>";
				}
		
		$li.="</li>";
	}
	$li.="</ul><div style='clear: both;' ></div>";
	echo $li;
	//------------banner--------------
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