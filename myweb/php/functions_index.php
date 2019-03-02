<?php 
	include("open.php");

//-----------------------------------------------------
//定义information-img标签-资讯
function information_img($form,$many){
	switch($form){
		case "information-news-hot":$i=1;break;
		case "information-news-new":$i=2;break;
		default:$i=1;break;
	}
	$dao=open_form_id_daoxu($form);
	$img="";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			if($many==3){
				$img.="<a href='information/information_detail.php?form=";
				$img.=$i."&id=".$row["id"]."' target='_blank' class='display_block' >";
				$img.="<img src='information/".$row["picture"]."'>";
				$img.="<p class='pp'>";
				//判断字符串长度
				$get_row=substr_cut($row["content"],36);
				$img.=$get_row;
				$img.="</p>";
				$img.="</a>";
		   	}
			else{
				$img.="<a href='information/information_detail.php?form=";
				$img.=$i."&id=".$row["id"]."'  target='_blank' >";
				$img.="<img src='information/".$row["picture"]."'>";
				$img.="<p class='pp'>";
				//判断字符串长度
				$get_row=substr_cut($row["content"],36);
				$img.=$get_row;
				$img.="</p>";
				$img.="</a>";
			}
			--$many;
		}
	}
	echo $img;
	
}
function  information_li($form,$many){
	switch($form){
		case "information-news-hot":$i=1;break;
		case "information-news-new":$i=2;break;
		default:$i=1;break;
	}
	$dao=open_form_id_daoxu($form);
	$li="";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			//判断content字符串长度
			$li.="<li><a href='information/information_detail.php?form=";
			$li.=$i."&id=".$row["id"]."' target='_blank' >";
			$get_row=substr_cut($row["content"],65);
			$li.=$get_row;
			$li.="</a></li>";
			--$many;
		}
	}
	echo $li;
}	
	
//-----------------------------------------------------
//定义zhengce-ul-li标签-资讯
function zhengce_li($form,$many,$long){
	switch($form){
		case "information-policy-dongtai":$i=3;break;
		case "information-policy-huinong":$i=4;break;
		case "information-policy-biaozhun":$i=5;break;
		default:$i=1;break;
	}
	 $dao=open_form_id_daoxu($form);
 	//创建li列表
	$li="";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			$li.="<li>";
			$li.="<a href='information/information_detail.php?form=".$i."&id=";
			$li.=$row["id"];
			$li.="' target='_blank'>";
			//判断字符串长度
			$get_row=substr_cut($row["content"],$long);
			$li.=$get_row;
			$li.="</a></li>";
			--$many;
		}
	}
	echo $li;
}



//-----------------------------------------------------
//创建a-img标签,js动态代表创建几条-资讯
function zhengce_img($form,$many){
	 	$dao=open_form_id_daoxu($form);
		$li="";
		while($row=mysql_fetch_array($dao)){
			if($many>0){
				$li="<a href='information/information_detail.php?form=1&id=";
				$li.=$row["id"]."' target='_blank'>";
				$li.="<img src=\"information/";
				$li.=$row["picture"];
				$li.="\"/>";
				$li.="<p>";
				//判断字符串长度
				$get_row=substr_cut($row["content"],36);
				$li.=$get_row;
				$li.="</p>";
				$li.="</a>";
				--$many;
			}
		}
		echo $li;
}




//-----------------------------------------------------
//创建a-img标签-视频
function video_img($form,$star,$many){
	 $result=open_form($form,$star,$many);
	 while($row=mysql_fetch_array($result)){
		$img="<a href='video/video_detail.php?form=1&id=";
		$img.=$row["id"]."' target='_black'>";
		$img.="<img src='video/";
		$img.=$row["picture"];
		$img.="'/>";
		$img.="<p>";
		 //判断字符串长度
		$get_row=substr_cut($row["title"],36);
		$img.=$get_row;
		$img.="</p></a>";
		echo $img;
	 }
}



//-----------------------------------------------------
//创建li标签-market
function market_li($form,$many){
	$dao=open_form_id_daoxu($form);
	$li="";
	while($row=mysql_fetch_array($dao)){
		if($many>0){
			$li.="<li><a href='information/information_detail?form=6&id=";
			$li.=$row["id"]."' target='_blank'>";
			$get_row=substr_cut($row["title"],50);
			$li.=$get_row;
			$li.="</a><p>";
			$li.=$row["time"];
			$li.="</p></li>";
			--$many;
		}
	}
	echo $li;
}

//-----------------------------------------------------
//创建li标签-病虫害
function bing_chong_li($form,$star,$many){
	$result=open_form($form,$star,$many);
	//创建li列表
	switch($form){
		case "illness-guaguo":$i=1;break;
		case "illness-shucai":$i=2;break;
		case "illness-tree":$i=3;break;
		case "illness-datian":$i=4;break;
		case "wrom-guaguo":$i=5;break;
		case "wrom-shucai":$i=6;break;
		case "wrom-tree":$i=7;break;
		case "wrom-datian":$i=8;break;
		default:$i=1;break;
	}
	$li="";
	while($row=mysql_fetch_array($result)){
			$li.="<li>";
			$li.="<a href='bing_chong/bing_chong_detail.php?form=".$i."&id=".$row["id"]."' target='_blank'>";
			$get_row=substr_cut($row["title"],50);
			$li.=$get_row;
			$li.="</a></li>";
	}
	echo $li;
}


//-----------------------------------------------------
//教学农作物名字li标签
function teach_name($form,$star,$many){
	 $result=open_form($form,$star,$many);
 	//创建li列表
	switch($form){
		case "teach-guaguo":$i=1;break;
		case "teach-shucai":$i=2;break;
		case "teach-tree":$i=3;break;
		case "teach-funguns":$i=4;break;
		case "teach-foodcrop":$i=5;break;
		case "teach-cashcrop":$i=6;break;
		default:$i=1;break;
	}
	$li="";
	while($row=mysql_fetch_array($result)){
			$li.="<li>";
			$li.="<a href='teach/teach.php?form=".$i."&id=".$row["id"]."'>";
			$li.=$row["name"];
			$li.="</a></li>";
	}
	echo $li;
}

//-----------------------------------------------------
//定义information-img标签-资讯
function ifream(){
	$url="http://www.seniverse.com/weather/weather.aspx?uid=U9F23C6D97&cid=CHXJ000000&l=zh-CHS&p=SMART&a=0&u=C&s=12&m=2&x=1&d=2&fc=&bgc=&bc=&ti=0&in=1&li=";
	if(varify_url($url)){   
		echo "<iframe src='//www.seniverse.com/weather/weather.aspx?uid=U9F23C6D97&cid=CHXJ000000&l=zh-CHS&p=SMART&a=0&u=C&s=12&m=2&x=1&d=2&fc=&bgc=&bc=&ti=0&in=1&li=' frameborder='0' scrolling='no' width='200' height='300' allowTransparency='true'></iframe>";   
	}
	else{   
		echo "<a href='https://www.seniverse.com/weather/city/TZY33C4YJBP3'><img src='css/tips_picture/weather.png' width='203' height='229'></a>";   
	}  
}
?>
























