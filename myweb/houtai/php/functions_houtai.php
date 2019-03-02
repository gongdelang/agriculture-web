<?php 
	include("open.php");
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
	switch($_GET["form"]){
		case 1:$form=$sql_news_hot;break;
		case 2:$form=$sql_news_new;break;
			
		case 3:$form=$sql_policy_dongtai;break;
		case 4:$form=$sql_policy_huinong;break;
		case 5:$form=$sql_policy_biaozhun;break;
			
		case 6:$form=$sql_market_dongtai;break;
			
		case 7:$form=$sql_video_hot;break;
		case 8:$form=$sql_video_zhongzhi;break;
		case 9:$form=$sql_video_xinxi;break;
		case 10:$form=$sql_video_sannong;break;
			
		case 11:$form=$sql_teach_guaguo;$teach_form=1;break;
		case 12:$form=$sql_teach_shucai;$teach_form=2;break;
		case 13:$form=$sql_teach_tree;$teach_form=3;break;
		case 14:$form=$sql_teach_funguns;$teach_form=4;break;
		case 15:$form=$sql_teach_foodcrop;$teach_form=5;break;
		case 16:$form=$sql_teach_cashcrop;$teach_form=6;break;
			
		case 17:$form=$sql_nongzi_nongyao_shachongji;break;
		case 18:$form=$sql_nongzi_nongyao_shajunji;break;
		case 19:$form=$sql_nongzi_nongyao_chucaoji;break;
		case 20:$form=$sql_nongzi_nongyao_tiaojieji;break;
			
		case 21:$form=$sql_nongzi_huafei_fuhe;break;
		case 22:$form=$sql_nongzi_huafei_shenwu;break;
		case 23:$form=$sql_nongzi_huafei_jia;break;
		case 24:$form=$sql_nongzi_huafei_youji;break;
			
		case 25:$form=$sql_nongzi_zhongzi_datian;break;
		case 26:$form=$sql_nongzi_zhongzi_guaguo;break;
		case 27:$form=$sql_nongzi_zhongzi_shucai;break;
			
		case 28:$form=$sql_nongzi_jixie_yunshu;break;
		case 29:$form=$sql_nongzi_jixie_jiagong;break;
		case 30:$form=$sql_nongzi_jixie_caishou;break;
			
		case 31:$form=$sql_illness_guaguo;break;
		case 32:$form=$sql_illness_shucai;break;
		case 33:$form=$sql_illness_tree;break;
		case 34:$form=$sql_illness_datian;break;
			
		case 35:$form=$sql_wrom_guaguo;break;
		case 36:$form=$sql_wrom_shucai;break;
		case 37:$form=$sql_wrom_tree;break;
		case 38:$form=$sql_wrom_datian;break;
					
		default:$form=$sql_news_hot;break;

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


//-----------------------------------------------------
//内容导航
function nei_nav($module,$form){
	switch($module){
		case "information":$nav="<span>农业资讯></span>";break;
		case "zhengce":$nav="<span>农业政策></span>";break;
		case "video":$nav="<span>农业视频></span>";break;
		case "teach":$nav="<span>种植教学></span>";break;
		case "nongzi":$nav="<span>农资信息></span>";break;
		case "bing_chong":$nav="<span>病虫害防治></span>";break;
		default:$nav="";break;
	}
		switch($form){
			case "information-news-hot":$nav.="<span>热门新闻管理</span>";break;
			case "information-news-new":$nav.="<span>最新新闻管理</span>";break;
			case "information-policy-dongtai":$nav.="<span>政策动态管理</span>";break;
			case "information-policy-huinong":$nav.="<span>惠农政策管理</span>";break;
			case "information-policy-biaozhun":$nav.="<span>农业标准管理</span>";break;
			case "information-market-dongtai":$nav.="<span>行情动态管理</span>";break;
			//-------------------------------------------------------------------
			case "video-hot":$nav.="<span>热门视频管理</span>";break;
			case "video-zhongzhi":$nav.="<span>种植视频管理</span>";break;
			case "video-xinxi":$nav.="<span>作物信息管理</span>";break;
			case "video-sannong":$nav.="<span>三农政策管理</span>";break;
			//-------------------------------------------------------------------	
			case "teach-guaguo":$nav.="<span>瓜果管理</span>";break;
			case "teach-shucai":$nav.="<span>蔬菜管理</span>";break;
			case "teach-tree":$nav.="<span>果树管理</span>";break;
			case "teach-funguns":$nav.="<span>食用菌管理</span>";break;
			case "teach-cashcrop":$nav.="<span>经济作物管理</span>";break;
			case "teach-foodcrop":$nav.="<span>粮食作物管理</span>";break;
				//-------------------------------------------------------------------	
			case "teach-guaguo":$nav.="<span>瓜果管理</span>";break;
			case "teach-shucai":$nav.="<span>蔬菜管理</span>";break;
			case "teach-tree":$nav.="<span>果树管理</span>";break;
			case "teach-funguns":$nav.="<span>食用菌管理</span>";break;
			case "teach-cashcrop":$nav.="<span>经济作物管理</span>";break;
			case "teach-foodcrop":$nav.="<span>粮食作物管理</span>";break;
	//------------------------------------------------------------------
			case "nongzi-nongyao-shachongji":$nav.="<span>杀虫剂管理</span>";break;
			case "nongzi-nongyao-chucaoji":$nav.="<span>除草剂管理</span>";break;
			case "nongzi-nongyao-shajunji":$nav.="<span>杀菌剂管理</span>";break;
			case "nongzi-nongyao-tiaojieji":$nav.="<span>调节剂管理</span>";break;
								
			case "nongzi-huafei-fuhe":$nav.="<span>复合肥管理</span>";break;
			case "nongzi-huafei-jia":$nav.="<span>钾肥管理</span>";break;
			case "nongzi-huafei-shenwu":$nav.="<span>生物肥管理</span>";break;
			case "nongzi-huafei-youji":$nav.="<span>有机肥管理</span>";break;
								
			case "nongzi-zhongzi-datian":$nav.="<span>大田种子管理</span>";break;
			case "nongzi-zhongzi-shucai":$nav.="<span>蔬菜种子管理</span>";break;
			case "nongzi-zhongzi-guaguo":$nav.="<span>瓜果种子管理</span>";break;
								
			case "nongzi-jixie-yunshu":$nav.="<span>运输管理</span>";break;
			case "nongzi-jixie-caishou":$nav.="<span>采收管理</span>";break;
			case "nongzi-jixie-jiagong":$nav.="<span>加工管理</span>";break;
				
	//------------------------------------------------------------------
 			case "illness-guaguo":$nav.="<span>瓜果病害管理</span>";break;
			case "illness-shucai":$nav.="<span>蔬菜病害管理</span>";break;
			case "illness-tree":$nav.="<span>果树病害管理</span>";break;
			case "illness-datian":$nav.="<span>大田作物病害管理</span>";break;
								
			case "wrom-guaguo":$nav.="<span>瓜果虫害管理</span>";break;
			case "wrom-shucai":$nav.="<span>蔬菜虫害管理</span>";break;
			case "wrom-tree":$nav.="<span>果树虫害管理</span>";break;
			case "wrom-datian":$nav.="<span>大田作物虫害管理</span>";break;
	
			default:$nav.="";break;
		}
	echo $nav;		
}
//-------------------------------------------------------------------
//--分页条------------------------------------------------------------
//------------分页--------------
function banner($count,$page){
		//获取总数据
		$total=$count;
		$showPage=8;

		//计算共有多少页
		$total_pages=ceil($total/$showPage);
		//计算偏移量
		$pageOffset=($showPage-1)/2;
		//初始数据定义
		$page_banner="<div class='banner'>";
		$kaishi=1;
		$end=$total_pages;
		//显示banner
		if($page>1){
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=1&module={$_GET["module"]}'>首页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page-1)."
			&module={$_GET["module"]}'>上一页</a>";
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
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$i."&module={$_GET["module"]}'>{$i}</a>";
			}
		}
		//-------------------------------------------
		if($total_pages>$showPage&&$total_pages>($page+$pageOffset)){
			$page_banner.="...";	
		}
		if($page<$total_pages){
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page+1)."
			&module={$_GET["module"]}'>下一页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$total_pages."
			&module={$_GET["module"]}'>尾页</a>";
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
		$page_banner.="<input class='in2' type='hidden' name='module' value='{$_GET["module"]}' />";
		$page_banner.="</form>";
		$page_banner.="</div>";
		echo $page_banner; 
}



//-------------------------------------------------------------------
//陈列information 模块
function information($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content'>content</td>
			<td class='td_author'>author</td>
			<td class='td_laiyuan'>laiyuan</td>
			<td class='td_time'>time</td>
			<td class='td_picture'>picture</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],35);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_content."</td>
				<td>".$row["author"]."</td>
				<td>".$row["laiyuan"]."</td>
				<td>".$row["time"]."</td>
				<td>".$row["picture"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}


//-------------------------------------------------------------------
//陈列zhengce 模块
function zhengce($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content'>content</td>
			<td class='td_time'>time</td>
			<td class='td_picture'>picture</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],35);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_content."</td>
				<td>".$row["time"]."</td>
				<td>".$row["picture"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."'>删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}

///-------------------------------------------------------------------
//陈列nongzi模块
function nongzi($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	
	switch($form){
		case "nongzi-nongyao-shachongji":$nav=1;break;
		case "nongzi-nongyao-chucaoji":$nav=1;break;
		case "nongzi-nongyao-shajunji":$nav=1;break;
		case "nongzi-nongyao-tiaojieji":$nav=1;break;
		default:$nav=0;break;
	}
	if($nav==1){
			$li="<table border='0' cellspacing='0'>";
				$li.="<tr class='tr1' bgcolor='#594b48'>
					<td class='td_id'>id</td>
					<td class='td_title'>name</td>
					<td class='td_content'>canshu</td>
					<td class='td_content1'>chanping</td>
					<td class='td_content'>zhuyi</td>
					<td class='td_time'>time</td>
					<td class='td_picture'>picture</td>
					<td class='td_caozuo'>操作</td>
					<td class='td_view'>审核</td>
				</tr>";
				while($row=mysql_fetch_array($result)){
					//判断字符串长度
					$get_row_canshu=substr_cut($row["canshu"],30);
					$get_row_chanping=substr_cut($row["chanping"],70);
					$get_row_zhuyi=substr_cut($row["zhuyi"],30);
					$li.="<tr ".$hei.">
						<td>".$row["id"]."</td>
						<td>".$row["name"]."</td>
						<td>".$get_row_canshu."</td>
						<td>".$get_row_chanping."</td>
						<td>".$get_row_zhuyi."</td>
						<td>".$row["time"]."</td>
						<td>".$row["picture"]."</td>
						<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
						if($row["view"]==1){
							$li.="<td class='view_1'>通过</td>";
						}
						else{
							$li.="<td class='view_2'>未审核</td>";
						}
					$li.="</tr>";
					if($hei=="bgcolor='#dfdfdf'"){
						$hei="";
					}
					else{
						$hei="bgcolor='#dfdfdf'";
					}
				}
			$li.="</table>";
			echo $li;
			banner($count,$page);
	}
	else{
			$li="<table border='0' cellspacing='0'>";
				$li.="<tr class='tr1' bgcolor='#594b48'>
					<td class='td_id'>id</td>
					<td class='td_title'>name</td>
					<td class='td_content'>canshu</td>
					<td class='td_content1'>chanping</td>
					<td class='td_picture'>picture</td>
					<td class='td_caozuo'>操作</td>
					<td class='td_view'>审核</td>
				</tr>";
				while($row=mysql_fetch_array($result)){
					//判断字符串长度
					$get_row_canshu=substr_cut($row["canshu"],30);
					$get_row_chanping=substr_cut($row["chanping"],70);
					$li.="<tr ".$hei.">
						<td>".$row["id"]."</td>
						<td>".$row["name"]."</td>
						<td>".$get_row_canshu."</td>
						<td>".$get_row_chanping."</td>
						<td>".$row["picture"]."</td>
						<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
						if($row["view"]==1){
							$li.="<td class='view_1'>通过</td>";
						}
						else{
							$li.="<td class='view_2'>未审核</td>";
						}
					$li.="</tr>";
					if($hei=="bgcolor='#dfdfdf'"){
						$hei="";
					}
					else{
						$hei="bgcolor='#dfdfdf'";
					}
				}
			$li.="</table>";
			echo $li;
			banner($count,$page);
	}
}

//陈列information 模块
function video($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content1'>content</td>
			<td class='td_picture'>picture</td>
			<td class='td_laiyuan'>video</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],70);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_content."</td>
				<td>".$row["picture"]."</td>
				<td>".$row["video"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}
//-------------------------------------------------------------------
//陈列information 模块
function teach($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>name</td>
			<td class='td_content'>chapter</td>
			<td class='td_content1'>content</td>
			<td class='td_picture'>picture</td>
			<td class='td_laiyuan'>video</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],70);
			$get_row_chapter=substr_cut($row["chapter"],30);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_chapter."</td>
				<td>".$get_row_content."</td>
				<td>".$row["picture"]."</td>
				<td>".$row["video"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}
//陈列information 模块
function bing_chong($form,$page,$module){
	$count=count_form_all($form);
	$star=($page-1)*8;
	$hei="bgcolor='#dfdfdf'";
	$result=open_form($form,$star,8);
	$li="<table border='0' cellspacing='0'>";
		$li.="<tr class='tr1' bgcolor='#594b48'>
			<td class='td_id'>id</td>
			<td class='td_title'>title</td>
			<td class='td_content1'>content</td>
			<td class='td_time'>time</td>
			<td class='td_picture'>picture</td>
			<td class='td_caozuo'>操作</td>
			<td class='td_view'>审核</td>
		</tr>";
		while($row=mysql_fetch_array($result)){
			//判断字符串长度
			$get_row_content=substr_cut($row["content"],70);
			$get_row_title=substr_cut($row["title"],15);
			$li.="<tr ".$hei.">
				<td>".$row["id"]."</td>
				<td>".$get_row_title."</td>
				<td>".$get_row_content."</td>
				<td>".$row["time"]."</td>
				<td>".$row["picture"]."</td>
				<td><a class='shanchu' href='shanchu.php?form=".$form."&id=".$row["id"]."' >删除</a><a href='houtai_detail?form=".$form."&id=".$row["id"]."&module=".$module."&page=".$page."'>修改</a></td>";
				if($row["view"]==1){
					$li.="<td class='view_1'>通过</td>";
				}
				else{
					$li.="<td class='view_2'>未审核</td>";
				}
			$li.="</tr>";
			if($hei=="bgcolor='#dfdfdf'"){
				$hei="";
			}
			else{
				$hei="bgcolor='#dfdfdf'";
			}
		}
	$li.="</table>";
	echo $li;
	banner($count,$page);
}
//-------------------------------------------------------------------
//总调用函数
function all_enty($form,$page,$module){
	switch($module){
		case "information":information($form,$page,$module);break;
		case "zhengce":zhengce($form,$page,$module);break;
		case "video":video($form,$page,$module);break;
		case "teach":teach($form,$page,$module);break;
		case "nongzi":nongzi($form,$page,$module);break;
		case "bing_chong":bing_chong($form,$page,$module);break;
		default:information($form,$page,$module);break;
	}
}
?>