<?php 
	include("open.php");
//参数处理
//-----------------------------------------------------
//由界面传过来的module参数
	if(!isset($_GET["module"])){
		$module="";
	}
	else if($_GET["module"]==""){
		$module="";
	}
	else{
		$module=$_GET["module"];
	}
//由界面传过来的form参数
	if(!isset($_GET["form"])){
		$form='';
	}
	else if($_GET["form"]==""){
		$form='';
	}
	else {
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

			default:$form='';break;

		}
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
//由界面传过来的name参数
	if(!isset($_GET["name"])){
		$name="";
	}
	else if($_GET["name"]==""){
		$name="";
	}
	else{
		$name=$_GET["name"];
	}

//由界面传过来的search参数
	if(!isset($_GET["search"])){
		$search="";
	}
	else if($_GET["search"]==""){
		$search="";
	}
	else{
		$search=$_GET["search"];
	}
//-----------------------------------------------------
//内容导航
function nei_nav($module,$form,$name){
	switch($module){
		case "information":$nav="<span>农业资讯></span>";break;
		case "zhengce":$nav="<span>农业政策></span>";break;
		case "video":$nav="<span>农业视频></span>";break;
		case "teach":$nav="<span>种植教学></span>";break;
		case "nongzi":$nav="<span>农资信息></span>";break;
		case "bing_chong":$nav="<span>病虫害防治></span>";break;
		default:$nav="";break;
	}
	if($module=="bing_chong"||$module=="nongzi"){
		switch($name){
			case "nongyao":$nav.="<span>农药</span>";break;
			case "huafei":$nav.="<span>化肥</span>";break;
			case "zhongzi":$nav.="<span>种子</span>";break;
			case "nongji":$nav.="<span>农机</span>";break;
			case "bing":$nav.="<span>病害防治</span>";break;
			case "chong":$nav.="<span>虫害防治</span>";break;
			default:$nav.="";break;
		}
		
	}
	else{
		switch($form){
			case "information-news-hot":$nav.="<span>热门新闻</span>";break;
			case "information-news-new":$nav.="<span>最新新闻</span>";break;
			case "information-policy-dongtai":$nav.="<span>政策动态</span>";break;
			case "information-policy-huinong":$nav.="<span>惠农政策</span>";break;
			case "information-policy-biaozhun":$nav.="<span>农业标准</span>";break;
			case "information-market-dongtai":$nav.="<span>行情动态</span>";break;
			//-------------------------------------------------------------------
			case "video-hot":$nav.="<span>热门视频</span>";break;
			case "video-zhongzhi":$nav.="<span>种植视频</span>";break;
			case "video-xinxi":$nav.="<span>作物信息</span>";break;
			case "video-sannong":$nav.="<span>三农政策</span>";break;
			//-------------------------------------------------------------------	
			case "teach-guaguo":$nav.="<span>瓜果</span>";break;
			case "teach-shucai":$nav.="<span>蔬菜</span>";break;
			case "teach-tree":$nav.="<span>果树</span>";break;
			case "teach-funguns":$nav.="<span>食用菌</span>";break;
			case "teach-cashcrop":$nav.="<span>经济作物</span>";break;
			case "teach-foodcrop":$nav.="<span>粮食作物</span>";break;
	
			default:$nav.="";break;
		}
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
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=1&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>首页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page-1)."
			&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>上一页</a>";
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
				$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$i."&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>{$i}</a>";
			}
		}
		//-------------------------------------------
		if($total_pages>$showPage&&$total_pages>($page+$pageOffset)){
			$page_banner.="...";	
		}
		if($page<$total_pages){
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".($page+1)."
			&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>下一页</a>";
			$page_banner.="<a href='".$_SERVER['PHP_SELF']."?form={$_GET["form"]}&page=".$total_pages."
			&module={$_GET["module"]}&search={$_GET["search"]}&name={$_GET["name"]}'>尾页</a>";
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
		$page_banner.="<input class='in2' type='hidden' name='search' value='{$_GET["search"]}' />";
		$page_banner.="<input class='in2' type='hidden' name='name' value='{$_GET["name"]}' />";
		$page_banner.="</form>";
		$page_banner.="</div>";
		echo $page_banner; 
}



//-------------------------------------------------------------------
//陈列information -zhengce-video-teach模块
function information($form,$page,$module,$search){
	if($module=="zhengce"){
		$module="information";
	}
	switch($form){
			case "information-news-hot":$tip="热门新闻";break;
			case "information-news-new":$tip="最新新闻";break;
			case "information-policy-dongtai":$tip="政策动态";break;
			case "information-policy-huinong":$tip="惠农政策";break;
			case "information-policy-biaozhun":$tip="农业标准";break;
			case "information-market-dongtai":$tip="行情动态";break;
			//-------------------------------------------------------------------
			case "video-hot":$tip="热门视频";break;
			case "video-zhongzhi":$tip="种植视频";break;
			case "video-xinxi":$tip="农业信息";break;
			case "video-sannong":$tip="三农政策";break;
			//-------------------------------------------------------------------	
			case "teach-guaguo":$tip="瓜果";break;
			case "teach-shucai":$tip="蔬菜";break;
			case "teach-tree":$tip="果树";break;
			case "teach-funguns":$tip="食用菌";break;
			case "teach-cashcrop":$tip="经济作物";break;
			case "teach-foodcrop":$tip="粮食作物";break;
	
			default:$tip="热门新闻";;break;
		}
	
	
	$count=0;
	$i=0;
	$star=($page-1)*8;
	$end=($page)*8;
	//搜索数据
	$search_data=search_form_information($form,$search);
	
	$li="<ul class='ul'>";
	if($search!=""){
		while($row=mysql_fetch_array($search_data)){
			++$count;
			if($star<=$i&&$i<$end){
				if($star<$end){
					++$star;
					if($module=="teach")
					{
						$li.="<li><a href='".$module."/".$module.".php?id=";
					}
					else{
						$li.="<li><a href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=";
					}
					$li.=$row["id"];
					$li.="' target='_blank'>";
					//只有当有图片时才输出
					if($row["picture"]){
						$li.="<img src='./".$module."/";
						$li.=$row["picture"];
						$li.="'/>";
					}
					$li.="</a>";
					//-----------------------------------------------------
					if($module=="teach"){
						$li.="<a class='tit' href='".$module."/".$module.".php?form=".$_GET["form"]."&id=".$row["id"];
					}
					else{
						$li.="<a class='tit' href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=".$row["id"];
					}
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
					//判断tite字符串长度
					$get_row=substr_cut($row["title"],60);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					if($module=="teach"){
						$li.="<a class='cont' href='".$module."/".$module.".php?form=".$_GET["form"]."&id=".$row["id"];
					}
					else{
						$li.="<a class='cont' href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=".$row["id"];
					}
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
					//判断content字符串长度
					$get_row=substr_cut($row["content"],100);
					$li.=$get_row;
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<p class=\"time\">";
					$li.=$row["time"];
					$li.="</p>";
					
					$li.="<span>";
					$li.=$tip;
					$li.="</span>";
					
					//-----------------------------------------------------
					$li.="<p class=\"xian\">-----------------------------------------------------------------------------------------------------------------------------</p></li>";		
				}
			}
			++$i;
		
		}
	}
	if($li=="<ul class='ul'>")
		{
			$li.="<li style='margin-top:20px;text-align:center;' ><a>对不起！在该<span style='position:static; font-size:16px;margin:0px 10px'>".$tip."</span>标签下没有找到相关信息。请尝试在其他标签搜索，或者修改搜索内容</a></li>";
		}
	$li.="</ul>";
	echo $li;
	banner($count,$page);
}

//-------------------------------------------------------------------
//陈列nongzi模块
function nongzi($form,$page,$module,$search,$name){
	switch($name){
			case "nongyao":$tip="农药";break;
			case "huafei":$tip="化肥";break;
			case "zhongzi":$tip="种子";break;
			case "nongji":$tip="农机";break;
			//-------------------------------------------------------------------
			case "bing":$tip="病害";break;
			case "chong":$tip="虫害";break;
			//-------------------------------------------------------------------	
			default:$tip="农药";;break;
		}
	
	$count=0;
	$i=0;
	$star=($page-1)*8;
	$end=($page)*8;
	//搜索数据
	$li="<ul class='ul'>";
	if($search!=""){
		for($form_many=0;$form_many<4;++$form_many){
			switch($name){
				case "nongyao":switch($form_many){
						case 0:$form_name="nongzi-nongyao-shachongji";break;
						case 1:$form_name="nongzi-nongyao-shajunji";break;
						case 2:$form_name="nongzi-nongyao-chucaoji";break;
						case 3:$form_name="nongzi-nongyao-tiaojieji";break;
					default:$form_name="nongzi-nongyao-shachongji";break;};break;
					//------------------------------------------------------------------
					
				case "zhongzi":switch($form_many){
						case 0:$form_name="nongzi-zhongzi-datian";break;
						case 1:$form_name="nongzi-zhongzi-guaguo";break;
						case 2:$form_name="nongzi-zhongzi-shucai";break;
						case 3:$form_name="";break;
					default:$form_name="nongzi-zhongzi-datian";break;};break;
					//------------------------------------------------------------------
					
				case "huafei":switch($form_many){
						case 0:$form_name="nongzi-huafei-fuhe";break;
						case 1:$form_name="nongzi-huafei-shenwu";break;
						case 2:$form_name="nongzi-huafei-jia";break;
						case 3:$form_name="nongzi-huafei-youji";break;
					default:$form_name="nongzi-huafei-fuhe";break;};break;
					//------------------------------------------------------------------
					
				case "nongji":switch($form_many){
						case 0:$form_name="nongzi-jixie-yunshu";break;
						case 1:$form_name="nongzi-jixie-jiagong";break;
						case 2:$form_name="nongzi-jixie-caishou";break;
						case 3:$form_name="";break;
					default:$form_name="nongzi-jixie-yunshu";break;};break;
					//------------------------------------------------------------------
					
				case "bing":switch($form_many){
						case 0:$form_name="illness-guaguo";break;
						case 1:$form_name="illness-shucai";break;
						case 2:$form_name="illness-tree";break;
						case 3:$form_name="illness-datian";break;
					default:$form_name="illness-guaguo";break;};break;
					//------------------------------------------------------------------
					
				case "chong":switch($form_many){
						case 0:$form_name="wrom-guaguo";break;
						case 1:$form_name="wrom-shucai";break;
						case 2:$form_name="wrom-tree";break;
						case 3:$form_name="wrom-datian";break;
					default:$form_name="wrom-guaguo";break;};break;
					//------------------------------------------------------------------
					
				default:switch($form_many){
						case 0:$form_name="nongzi-nongyao-shachongji";break;
						case 1:$form_name="nongzi-nongyao-shajunji";break;
						case 2:$form_name="nongzi-nongyao-chucaoji";break;
						case 3:$form_name="nongzi-nongyao-tiaojieji";break;
					default:$form_name="nongzi-nongyao-shachongji";break;};break;	
			}
			if($module=="bing_chong"){
				$search_data=search_form_information($form_name,$search);
			}
			else{
				$search_data=search_form_nongzi($form_name,$search);
			}
			while($row=mysql_fetch_array($search_data)){
				++$count;
				if($star<=$i&&$i<$end){
					if($star<$end){
						++$star;
						$li.="<li><a href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=";
						$li.=$row["id"];
						$li.="' target='_blank'>";
						//只有当有图片时才输出
						if($row["picture"]){
							$li.="<img src='./".$module."/";
							$li.=$row["picture"];
							$li.="'/>";
						}
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<a class='tit' href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=".$row["id"];
						$li.="&page=".$_GET["page"];
						$li.="' target='_blank'>";
						//判断tite字符串长度
						if($row["title"]){
							$get_row=substr_cut($row["title"],60);
							$li.=$get_row;
						} 
						else if($row["name"]){
							$get_row=substr_cut($row["name"],60);
							$li.=$get_row;
						}
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<a class='cont' href='".$module."/".$module."_detail.php?form=".$_GET["form"]."&id=".$row["id"];
						$li.="&page=".$_GET["page"];
						$li.="' target='_blank'>";
						//判断content字符串长度
						if($row["content"]){
							$get_row=substr_cut($row["content"],100);
							$li.=$get_row;
						}
						else if($row["chanping"]){
							$p_array=explode("|",$row["chanping"]);
							$get_row=substr_cut($p_array[0],100);
							$li.=$get_row;
						}
						$li.="</a>";
						//-----------------------------------------------------
						$li.="<p class=\"time\">";
						$li.=$row["time"];
						$li.="</p>";

						$li.="<span>";
						$li.=$tip;
						$li.="</span>";

						//-----------------------------------------------------
						$li.="<p class=\"xian\">-----------------------------------------------------------------------------------------------------------------------------</p></li>";		
					}
				}
				++$i;
			}
		}
	}
	if($li=="<ul class='ul'>")
		{
			$li.="<li style='margin-top:20px;text-align:center;' ><a>对不起！在该<span style='position:static; font-size:16px;margin:0px 10px'>".$tip."</span>标签下没有找到相关信息。请尝试在其他标签搜索，或者修改搜索内容</a></li>";
		}
	$li.="</ul>";
	echo $li;
	banner($count,$page);
}
//-------------------------------------------------------------------
//搜索全部数据
function all_data($page,$search){
	//定义打开的表格：
	$sql_news_hot ="information-news-hot"; //SQL语句"SELECT * FROM information-news"
	$sql_news_new ="information-news-new";

	$sql_policy_dongtai ="information-policy-dongtai"; //SQL语句"SELECT * FROM informationpolicy"
	$sql_policy_huinong ="information-policy-huinong"; 
	$sql_policy_biaozhun ="information-policy-biaozhun"; 

	$sql_market ="information-market"; //SQL语句"SELECT * FROM information-market"
	$sql_market_dongtai ="information-market-dongtai"; //SQL语句"SELECT * FROM information-market"

//------------------------------------------------------------------
	$sql_video_hot="video-hot"; //SQL语句"SELECT * FROM video"
	$sql_video_xinxi="video-xinxi";
	$sql_video_zhongzhi="video-zhongzhi";
	$sql_video_sannong="video-sannong";



//------------------------------------------------------------------
	$sql_questions="questions"; //SQL语句"SELECT * FROM quesions"



//------------------------------------------------------------------
    $sql_teach_guaguo="teach-guaguo";
	$sql_teach_shucai="teach-shucai";
	$sql_teach_tree="teach-tree";
	$sql_teach_funguns="teach-funguns";
	$sql_teach_cashcrop="teach-cashcrop";
	$sql_teach_foodcrop="teach-foodcrop";



//------------------------------------------------------------------
 	$sql_nongzi_nongyao_chucaoji="nongzi-nongyao-chucaoji";
	$sql_nongzi_nongyao_shachongji="nongzi-nongyao-shachongji";
	$sql_nongzi_nongyao_shajunji="nongzi-nongyao-shajunji";
	$sql_nongzi_nongyao_tiaojieji="nongzi-nongyao-tiaojieji";

	$sql_nongzi_zhongzi_datian="nongzi-zhongzi-datian";
	$sql_nongzi_zhongzi_guaguo="nongzi-zhongzi-guaguo";
	$sql_nongzi_zhongzi_shucai="nongzi-zhongzi-shucai";

	$sql_nongzi_huafei_fuhe="nongzi-huafei-fuhe";
	$sql_nongzi_huafei_youji="nongzi-huafei-youji";
	$sql_nongzi_huafei_shenwu="nongzi-huafei-shenwu";
	$sql_nongzi_huafei_jia="nongzi-huafei-jia";
	
	$sql_nongzi_jixie_jiagong="nongzi-jixie-jiagong";
	$sql_nongzi_jixie_caishou="nongzi-jixie-caishou";
	$sql_nongzi_jixie_yunshu="nongzi-jixie-yunshu";




//------------------------------------------------------------------
	$sql_illness_guaguo="illness-guaguo";
	$sql_illness_shucai="illness-shucai";
	$sql_illness_tree="illness-tree";
	$sql_illness_datian="illness-datian";



//------------------------------------------------------------------
	$sql_wrom_guaguo="wrom-guaguo";
	$sql_wrom_shucai="wrom-shucai";
	$sql_wrom_tree="wrom-tree";
	$sql_wrom_datian="wrom-datian";
	
	$count=0;
	$j=0;
	$star=($page-1)*8;
	$end=($page)*8;	
	
	$li="<ul class='ul'>";
	for($i=1;$i<39;++$i){
		switch($i){
			case 1:$form=$sql_news_hot;$module="information";$tip="热门新闻";break;
			case 2:$form=$sql_news_new;$module="information";$tip="最新新闻";break;

			case 3:$form=$sql_policy_dongtai;$module="information";$tip="政策动态";break;
			case 4:$form=$sql_policy_huinong;$module="information";$tip="惠农政策";break;
			case 5:$form=$sql_policy_biaozhun;$module="information";$tip="农业标准";break;

			case 6:$form=$sql_market_dongtai;$module="information";$tip="行情动态";break;

			case 7:$form=$sql_video_hot;$module="video";$tip="热门视频";break;
			case 8:$form=$sql_video_zhongzhi;$module="video";$tip="种植视频";break;
			case 9:$form=$sql_video_xinxi;$module="video";$tip="作物信息";break;
			case 10:$form=$sql_video_sannong;$module="video";$tip="三农政策";break;

			case 11:$form=$sql_teach_guaguo;$module="teach";$tip="瓜果";break;
			case 12:$form=$sql_teach_shucai;$module="teach";$tip="蔬菜";break;
			case 13:$form=$sql_teach_tree;$module="teach";$tip="果树";break;
			case 14:$form=$sql_teach_funguns;$module="teach";$tip="食用菌";break;
			case 15:$form=$sql_teach_foodcrop;$module="teach";$tip="粮食作物";break;
			case 16:$form=$sql_teach_cashcrop;$module="teach";$tip="经济作物";break;

			case 17:$form=$sql_nongzi_nongyao_shachongji;$module="nongzi";$tip="杀虫剂";break;
			case 18:$form=$sql_nongzi_nongyao_shajunji;$module="nongzi";$tip="杀菌剂";break;
			case 19:$form=$sql_nongzi_nongyao_chucaoji;$module="nongzi";$tip="除草剂";break;
			case 20:$form=$sql_nongzi_nongyao_tiaojieji;$module="nongzi";$tip="调节剂";break;

			case 21:$form=$sql_nongzi_huafei_fuhe;$module="nongzi";$tip="复合肥";break;
			case 22:$form=$sql_nongzi_huafei_shenwu;$module="nongzi";$tip="生物肥";break;
			case 23:$form=$sql_nongzi_huafei_jia;$module="nongzi";$tip="钾肥";break;
			case 24:$form=$sql_nongzi_huafei_youji;$module="nongzi";$tip="有机肥";break;

			case 25:$form=$sql_nongzi_zhongzi_datian;$module="nongzi";$tip="大田种子";break;
			case 26:$form=$sql_nongzi_zhongzi_guaguo;$module="nongzi";$tip="瓜果种子";break;
			case 27:$form=$sql_nongzi_zhongzi_shucai;$module="nongzi";$tip="蔬菜种子";break;

			case 28:$form=$sql_nongzi_jixie_yunshu;$module="nongzi";$tip="运输";break;
			case 29:$form=$sql_nongzi_jixie_jiagong;$module="nongzi";$tip="加工";break;
			case 30:$form=$sql_nongzi_jixie_caishou;$module="nongzi";$tip="采收";break;

			case 31:$form=$sql_illness_guaguo;$module="bing_chong";$tip="瓜果病害";break;
			case 32:$form=$sql_illness_shucai;$module="bing_chong";$tip="蔬菜病害";break;
			case 33:$form=$sql_illness_tree;$module="bing_chong";$tip="果树病害";break;
			case 34:$form=$sql_illness_datian;$module="bing_chong";$tip="大田病害";break;

			case 35:$form=$sql_wrom_guaguo;$module="bing_chong";$tip="瓜果虫害";break;
			case 36:$form=$sql_wrom_shucai;$module="bing_chong";$tip="蔬菜虫害";break;
			case 37:$form=$sql_wrom_tree;$module="bing_chong";$tip="果树虫害";break;
			case 38:$form=$sql_wrom_datian;$module="bing_chong";$tip="大田虫害";break;

			default:$form=$sql_news_hot;$module="information";$tip="最新新闻";break;
		}
		//搜索数据
		$search_data=search_form_information($form,$search);
		
		
		if($search!=""){
			while($row=mysql_fetch_array($search_data)){
				++$count;
			if($star<=$j&&$j<$end){
				if($star<$end){
						++$star;
					if($module=="teach")
					{
						$li.="<li><a href='".$module."/".$module.".php?id=";
					}
					else{
						$li.="<li><a href='".$module."/".$module."_detail.php?form=".$i."&id=";
					}
					$li.=$row["id"];
					$li.="' target='_blank'>";
					//只有当有图片时才输出
					if($row["picture"]){
						$li.="<img src='./".$module."/";
						$li.=$row["picture"];
						$li.="'/>";
					}
					$li.="</a>";
					//-----------------------------------------------------
					if($module=="teach"){
						$li.="<a class='tit' href='".$module."/".$module.".php?form=".$i."&id=".$row["id"];
					}
					else{
						$li.="<a class='tit' href='".$module."/".$module."_detail.php?form=".$i."&id=".$row["id"];
					}
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
				
					if($row["title"]){
						//判断tite字符串长度
						$get_row=substr_cut($row["title"],60);
						$li.=$get_row;
					}
				
					else if($row["name"]){
						//判断tite字符串长度
						$get_row=substr_cut($row["name"],60);
						$li.=$get_row;
					}
					$li.="</a>";
					//-----------------------------------------------------
					if($module=="teach"){
						$li.="<a class='cont' href='".$module."/".$module.".php?form=".$i."&id=".$row["id"];
					}
					else{
						$li.="<a class='cont' href='".$module."/".$module."_detail.php?form=".$i."&id=".$row["id"];
					}
					$li.="&page=".$_GET["page"];
					$li.="' target='_blank'>";
				
					if($row["content"]){
						//判断content字符串长度
						$get_row=substr_cut($row["content"],100);
						$li.=$get_row;
					}
					
					else if($row["chanping"]){
						$p_array=explode("|",$row["chanping"]);
						$get_row=substr_cut($p_array[0],100);
						$li.=$get_row;
					}
				
					$li.="</a>";
					//-----------------------------------------------------
					$li.="<p class=\"time\">";
					$li.=$row["time"];
					$li.="</p>";
					
					$li.="<span>";
					$li.=$tip;
					$li.="</span>";
					
					//-----------------------------------------------------
					$li.="<p class=\"xian\">-----------------------------------------------------------------------------------------------------------------------------</p></li>";
					}
				}
				++$j;
			}
				
		}	
	}
	if($li=="<ul class='ul'>"){
		$li.="<li style='margin-top:20px;text-align:center;' ><a>对不起！在该<span style='position:static; font-size:16px;margin:0px 10px'>所有</span>标签下没有找到相关信息。请尝试在其他标签搜索，或者修改搜索内容</a></li>";
	}
	$li.="</ul>";
	echo $li;
	banner($count,$page);
	
	
}
//-------------------------------------------------------------------
//总调用函数
function all_entry($form,$page,$module,$search,$name){
	switch($module){
		case "information":information($form,$page,$module,$search);break;
		case "zhengce":information($form,$page,$module,$search);break;
		case "video":information($form,$page,$module,$search);break;
		case "teach":information($form,$page,$module,$search);break;
		case "nongzi":nongzi($form,$page,$module,$search,$name);break;
		case "bing_chong":nongzi($form,$page,$module,$search,$name);break;
		default:all_data($page,$search);break;
	}
}
?>