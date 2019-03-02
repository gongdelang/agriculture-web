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


//-----------------------------------------------------
//------------title--------------
function titile($form,$id,$page){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//判断content字符串长度
	$get_row=substr_cut($row["content"],30);
	$div="<div class='title'>";
	$div.="<div class='nav'>";
	$div.="<span>您当前的位置是:</span>";
	$div.="<a href='../../index.php'>首页></a><a href='bing_chong.php?form=1'>病虫害防治></a>";
	switch($form){
			case "illness-guaguo":$div.="<a href='bing_chong.php?form=1&page=".$page."'>瓜果病害></a><span>".$get_row."</span></div>";break;
			case "illness-shucai":$div.="<a href='bing_chong.php?form=2&page=".$page."'>蔬菜病害></a><span>".$get_row."</span></div>";break;
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
//定义information-div-p标签-资讯
function detail($form,$id,$page){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//计算多少条id
	$total_sql="SELECT COUNT(*) FROM `$form`";
	$total_result=mysql_fetch_array(mysql_query($total_sql));
	$total=$total_result[0];
	//安装/打断
	$p_array=explode("|",$row["content"]);
	$many=count($p_array);
	$div="<div class='con'><p class='tit'>";
	//标题
	$div.=$row["title"];
	//细节
	$div.="</p><div class='xijie'>";
	$div.="<span>来源：<a href='http://www.nongyao001.com' class='xijie_a' target='_blank'>中国农药第一网</a>";
	$div.="&nbsp;&nbsp;&nbsp;&nbsp;</span><span>发表时间：";
	$div.=$row["time"]."</span>";
	//-----------------------------------------------------
	$div.="</div><div class='main'>";
	//文字
	$div.="<p>";
	$div.=$p_array[0];
	$div.="</p>";
	//图片
	$div.="<div style='text-align: center; margin-top:20px;'><img alt='图片' width='710' height='411' src='";
	$div.=$row["picture"];
	$div.="'></div><div style='text-align: center;margin-bottom: 20px'>图片来源网络</div>";
	//文字
	for($i=1;$i<$many;$i++){
		$div.="<p>";
		$div.=$p_array[$i];
		$div.="</p>";
	}
	//上一下一
	$div.="<div class='a'>";
	if($id>=2){
		$id_up=$id-1;
		$result_up=open_form_id($form,$id_up);
		$row_up=mysql_fetch_array($result_up);
		$div.="<a href='bing_chong_detail.php?form=".$_GET["form"]."&id=".$id_up."&page=".$page."'>";
		$div.="上一篇：";
		$div.=$row_up["title"];
		$div.="</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$div.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   } 				
		
	if($id<$total){
		$id_down=$id+1;
		$result_down=open_form_id($form,$id_down);
		$row_down=mysql_fetch_array($result_down);
		$div.="<a href='bing_chong_detail.php?form=".$_GET["form"]."&id=".$id_down."&page=".$page."'>";
		$div.="下一篇：";
		$div.=$row_down["title"];
		$div.="</a>";
	}
	$div.="</div></div>";
	$div.="</div>";
   	echo $div;	
}


?>
