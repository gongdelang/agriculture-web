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
//陈列information 模块
function information($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";
		$div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'>".$res['author']."</textarea></div>";
		$div.="<div class='d1'><p>laiyuan</p><textarea name='laiyuan' rows='2' cols='35'>".$res['laiyuan']."</textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>author</p><textarea name='author' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>laiyuan</p><textarea name='laiyuan' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
}


//-------------------------------------------------------------------
//陈列zhengce 模块
function zhengce($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
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
			$res=open_form_id($form,$id);
		$div="<div id='all'>";
		$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
		if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
		else{
			$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
		}
		if($res){
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'>".$res['name']."</textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'>".$res['canshu']."</textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'>".$res['chanping']."</textarea></div>";
			$div.="<div class='d1'><p>zhuyi</p><textarea name='zhuyi' rows='10' cols='35'>".$res['zhuyi']."</textarea></div>";
			
			$div.="<div class='d1'><p>shiyong</p><textarea name='shiyong' rows='4' cols='35'>".$res['shiyong']."</textarea></div>";
			
			$div.="<div class='d1'><p>fangzhi</p><textarea name='fangzhi' rows='4' cols='35'>".$res['fangzhi']."</textarea></div>";
			
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
			if($res["view"]==1){
				$div.="checked = 'checked'";
			}
			$div.=">通过<input class='view' type='radio' name='view' value='0'";
			if($res["view"]==0){
				$div.="checked = 'checked'";
			}
			$div.=">未审核</div>";		

		}
		else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>zhuyi</p><textarea name='zhuyi' rows='10' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>shiyong</p><textarea name='shiyong' rows='4' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>fangzhi</p><textarea name='fangzhi' rows='4' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div";
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
			
	}
		$div.="<a id='back'>返回</a>";
		$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
		$div.="<div style='clear:both;float:none;border:none;'><div></div>";
		echo $div;
	}
	else{
			$res=open_form_id($form,$id);
		$div="<div id='all'>";
		$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
		if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
		else{
			$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
		}
		if($res){
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'>".$res['name']."</textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'>".$res['canshu']."</textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'>".$res['chanping']."</textarea></div>";
			
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
			if($res["view"]==1){
				$div.="checked = 'checked'";
			}
			$div.=">通过<input class='view' type='radio' name='view' value='0'";
			if($res["view"]==0){
				$div.="checked = 'checked'";
			}
			$div.=">未审核</div>";		

		}
		else{
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>canshu</p><textarea name='canshu' rows='10' cols='35'>".$res['canshu']."</textarea></div>";
			$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>chanping</p><textarea name='chanping' rows='10' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
			
	}
		$div.="<a id='back'>返回</a>";
		$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
		$div.="<div style='clear:both;float:none;border:none;'><div></div>";
		echo $div;
	}
}

//陈列information 模块
function video($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";

		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		
		$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'>".$res['video']."</textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";

		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'></textarea></div>";
			
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
}
//-------------------------------------------------------------------
//陈列information 模块
function teach($form,$id,$page,$module){
	$res=open_form_id($form,$id);
		$div="<div id='all'>";
		$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
		if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
		else{
			$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
		}
		if($res){
			$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'>".$res['name']."</textarea></div>";
			
			$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
			
			$div.="<div class='d1'><p>chapter</p><textarea name='chapter' rows='10' cols='35'>".$res['chapter']."</textarea></div>";
			
			$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";
			
			

			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
			
			$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'>".$res['video']."</textarea></div>";
			
			$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
			if($res["view"]==1){
				$div.="checked = 'checked'";
			}
			$div.=">通过<input class='view' type='radio' name='view' value='0'";
			if($res["view"]==0){
				$div.="checked = 'checked'";
			}
			$div.=">未审核</div>";		

		}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
			$div.="<div class='d1'><p>name</p><textarea name='name' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>chapter</p><textarea name='chapter' rows='10' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";

			$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
			
			$div.="<div class='d1'><p>video</p><textarea name='video' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
		$div.="<a id='back'>返回</a>";
		$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
		$div.="<div style='clear:both;float:none;border:none;'><div></div>";
		echo $div;
}
//陈列information 模块
function bing_chong($form,$id,$page,$module){
	$res=open_form_id($form,$id);
	$div="<div id='all'>";
	$div.="<div class='d_top'><p>字段</p><div>内容</div></div>";
	if($id==""){
		$div.="<form action='insert.php?form=".$form."&module=".$module."' method='post' name='dl'>";
	}
	else{
		$div.="<form action='update.php?form=".$form."&id=".$id."&page=".$page."&module=".$module."' method='post' name='dl'>";
	}
	if($res){
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'>".$res['id']."</textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'>".$res['title']."</textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'>".$res['content']."</textarea></div>";

		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'>".$res['time']."</textarea></div>";
		
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'>".$res['picture']."</textarea></div>";
		
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1'";
		if($res["view"]==1){
			$div.="checked = 'checked'";
		}
		$div.=">通过<input class='view' type='radio' name='view' value='0'";
		if($res["view"]==0){
			$div.="checked = 'checked'";
		}
		$div.=">未审核</div>";		
		
	}
	else{
		$div.="<div class='d1'><p>id</p><textarea name='id' rows='1' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>title</p><textarea name='title' rows='2' cols='35'></textarea></div>";
		$div.="<div class='d1'><p>content</p><textarea name='content' rows='10' cols='35'></textarea></div>";

		$div.="<div class='d1'><p>time</p><textarea name='time' rows='1' cols='35'></textarea></div>";
		
		$div.="<div class='d1'><p>picture</p><textarea name='picture' rows='2' cols='35'></textarea></div>";
		
		$div.="<div class='d1 last'><p class='p_p'>审核</p><input class='view' type='radio' name='view' value='1' checked = 'checked'>通过<input class='view' type='radio' name='view' value='0'>未审核</div>";
	}
	$div.="<a id='back'>返回</a>";
	$div.="<input type='submit' name='submit' value='保存' class='tijiao'>";
	$div.="<div style='clear:both;float:none;border:none;'><div></div>";
	echo $div;
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
?>