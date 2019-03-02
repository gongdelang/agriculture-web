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
		case 1:$form=$sql_news_hot;break;
		case 2:$form=$sql_news_new;break;
		case 3:$form=$sql_policy_dongtai;break;
		case 4:$form=$sql_policy_huinong;break;
		case 5:$form=$sql_policy_biaozhun;break;
		case 6:$form=$sql_market_dongtai;break;
		case 7:$form=$sql_market;break;
		default:$form=$sql_news_hot;break;
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
//定义information-div-p标签-资讯
function detail_nav($get_form,$page){
	if($get_form=="")
	{
		$get_form=1;
	}
	$nav="<span>您当前的位置是:</span><a href='../index.php'>首页></a>";
	switch($get_form){
		case 1:$nav.="<a href='information.php?form=".$get_form."&page=".$page."'>农业资讯></a>";break;
		case 2:$nav.="<a href='information.php?form=".$get_form."&page=".$page."'>农业资讯></a>";break;
		case 3:$nav.="<a href='information.php?form=".$get_form."&page=".$page."'>农业政策></a>";break;
		case 4:$nav.="<a href='information.php?form=".$get_form."&page=".$page."'>农业政策></a>";break;
		case 5:$nav.="<a href='information.php?form=".$get_form."&page=".$page."'>农业政策></a>";break;
		case 6:$nav.="<a href='information.php?form=".$get_form."&page=".$page."'>市场行情></a>";break;
		default:$nav.="<a href='information.php?form=".$get_form."&page=".$page."'>农业资讯></a>";break;
	}
	
	switch($get_form){
		case 1:$nav.="<span>热门新闻</span>";break;
		case 2:$nav.="<span>最新新闻</span>";break;
		case 3:$nav.="<span>政策动态</span>";break;
		case 4:$nav.="<span>惠农政策</span>";break;
		case 5:$nav.="<span>农业标准</span>";break;
		case 6:$nav.="<span>行情动态</span>";break;
		default:$nav.="<span>热门新闻</span>";break;
	}	
	echo $nav;
}
//-----------------------------------------------------
//定义information-div-p标签-资讯
function detail($form,$id,$page){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//计算多少条id
	$total_sql="SELECT COUNT(*) FROM `$form` WHERE `view`='1'";
	$total_result=mysql_fetch_array(mysql_query($total_sql));
	$total=$total_result[0];
	if($form=="information-policy-biaozhun"){
		$p_array=explode("|",$row["content"]);
		$many=count($p_array);
	}
	//安装/打断
	else{
		$p_array=explode("|",$row["content"]);
		$many=count($p_array);
		}
	$div="<p class='tit'>";
	//标题
	$div.=$row["title"];
	//细节
	$div.="</p><div class='xijie'><span>作者：";
	if(!$row["author"]){
		$div.="未知";
	}
	else{$div.=$row["author"];}
	$div.="&nbsp;&nbsp;&nbsp;&nbsp;</span><span>来源：";
	if(!$row["laiyuan"]){
		$div.="未知";
	}
	else{$div.=$row["laiyuan"];}
	$div.="&nbsp;&nbsp;&nbsp;&nbsp;</span><span>发表时间：";
	$div.=$row["time"]."</span>";
	//-----------------------------------------------------
	$div.="</div><div class='main'>";
	//文字
	$div.="<p>";
	$div.=$p_array[0];
	$div.="</p>";
	//图片
	if($row["picture"]){
		$div.="<div style='text-align: center; margin-top:20px;'><img alt='图片' width='710' height='411' src='";
		$div.=$row["picture"];
		$div.="'></div><div style='text-align: center;margin-bottom: 20px'>图片来源网络</div>";
	}
	//文字
	for($i=1;$i<$many;$i++){
		$div.="<p>";
		$div.=$p_array[$i];
		$div.="</p>";
	}
	//上一下一
	$div.="<div class='a'>";
	if($id<$total){
		$id_up=$id+1;
		$result_up=open_form_id($form,$id_up);
		$row_up=mysql_fetch_array($result_up);
		$div.="<a href='information_detail.php?form=".$_GET["form"]."&id=".$id_up."&page=".$page."'>";
		$div.="上一篇：";
		$div.=$row_up["title"];
		$div.="</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$div.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
   } 				
		
	if($id>=2){
		$id_down=$id-1;
		$result_down=open_form_id($form,$id_down);
		$row_down=mysql_fetch_array($result_down);
		$div.="<a href='information_detail.php?form=".$_GET["form"]."&id=".$id_down."&page=".$page."'>";
		$div.="下一篇：";
		$div.=$row_down["title"];
		$div.="</a>";
	}
	$div.="</div></div>";
   	echo $div;	
}


?>