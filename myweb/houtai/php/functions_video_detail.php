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
//定义information-div-p标签-资讯
function detail_nav($get_form){
	if($get_form=="")
	{
		$get_form=1;
	}
	$nav="<a href='../houtai.php'>后台管理></a>";
	$nav.="<a href='video.php'>视频></a>";
	switch($get_form){
		case 1:$nav.="<span>热门视频</span>";break;
		case 2:$nav.="<span>种植视频</span>";break;
		case 3:$nav.="<span>种植信息</span>";break;
		case 4:$nav.="<span>三农政策</span>";break;
		default:$nav.="<span>热门视频</span>";break;
	}	
	echo $nav;
}


//-----------------------------------------------------
//播放视频
function open($form,$id){
	$row=open_form_id($form,$id);
	
	$p_array=explode("|",$row["content"]);
	$many=count($p_array);
	
	$video="<p class='p'>".$row["title"]."</p>";
	$video.="<div class='video'>"; 
	$video.="<video width='960' height='550' controls>";
	$video.="<source src='../../video/".$row["video"]."' type='video/mp4'>";
	$video.="<object data='../../video/".$row["video"]."' width='960' height='550'>";
	$video.="<embed src='../../video/".$row["video"]."' width='960' height='550'>";
	$video.="</object></video></div>";
	$video.="<div class='jieshao'>";
	$video.="<span class='jieshao_tit'>视频介绍:</span>";
	//文字
	for($i=0;$i<$many;$i++){
		$video.="<p>";
		$video.=$p_array[$i];
		$video.="</p>";
	}
	$video.="</div>";
	echo $video;
}


//-----------------------------------------------------
//猜你喜欢ul-li
function like($form){
	$result=open_form($form,0,8);
	$li="<ul>";
	while($row=mysql_fetch_array($result)){
		$li.="<li><a href='video_detail.php?";
		$li.="form=".$_GET["form"];
		$li.="&id=".$row["id"]."'  target='_black'><img src='../../video/";
		$li.=$row["picture"]."'><p>";
		//判断字符串长度
		$get_row=substr_cut($row["content"],30);
		$li.=$get_row;
		$li.="</p>";
		$li.="</a></li>";
	}
	$li.="</ul>";
	echo $li;
}
?>