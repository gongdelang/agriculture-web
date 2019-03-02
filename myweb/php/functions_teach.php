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

function title_nav($form){
	$result=open_form_all($form);
	switch($form){
		case "teach-guaguo":$form_num=1;break;
		case "teach-shucai":$form_num=2;break;
		case "teach-tree":$form_num=3;break;
		case "teach-funguns":$form_num=4;break;
		case "teach-foodcrop":$form_num=5;break;
		case "teach-cashcrop":$form_num=6;break;
		default:$form_num=1;break;
	}
	while($row=mysql_fetch_array($result)){
		$a="<a class='li2' href='teach.php?form=".$form_num."&id=".$row["id"]."'>".$row["name"]."</a>";
		echo $a;
	}
}
function  fl_l($form,$id){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	$array_title_1=explode("|",$row["chapter"]);
	$num_title_1=count($array_title_1);
	$div="<div class='p1'><p class='p1_1'>".$row["name"]."</p><p class='span_nav_1'></p></div>";
	for($i=0;$i<$num_title_1;++$i){
		$array_title_2=explode("%",$array_title_1[$i]);
		$num_title_2=count($array_title_2);
		$div.="<div class='p2' id='p_many".$i."'>";
		$div.="<p class='p2_1'>".$array_title_2[0]."</p><p class='span_nav_2'></p>";
		$div.="</div>";
		$div.="<ul class='li_many".$i."'>";
		for($j=1;$j<$num_title_2;++$j)
			$div.="<li>".$array_title_2[$j]."</li>";
		$div.="</ul>";
		} 
	echo $div;
}
function right_content($form,$id){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	
	$array_title_1=explode("|",$row["chapter"]);
	$num_title_1=count($array_title_1);
	
	$array_content_1=explode("@",$row["content"]);
	$num_content_1=count($array_content_1);
	
	
	$div="<div class='video'>";
	$div.="<video width='740' height='420' controls>";
	$div.="<source src='../".$row["video"]."' type='video/mp4'>";
	$div.="<object data='../".$row["video"]."' width='740' height='420'>";
	$div.="<embed src='../".$row["video"]."' width='740' height='420'>";
	$div.="</object></video>";
	$div.="</div>";
	$div.="<ul class='fl_r'>";
	for($i=0;$i<$num_title_1;++$i){
		$array_title_2=explode("%",$array_title_1[$i]);
		
		$array_content_2=explode("|",$array_content_1[$i]);
		$num_content_2=count($array_content_2);
		
		for($j=0;$j<$num_content_2;++$j){
			if($j==0){
				$div.="<li>";
				$div.="<p class='title_1'>".$array_title_2[0]."</p>";
				$div.="<p class='title_2'>".$array_title_2[1]."</p>";
				$array_content_3=explode("%",$array_content_2[0]);
				$num_content_3=count($array_content_2);
				for($z=0;$z<$num_content_3;++$z){
					if($array_content_3[$z]){
						$div.="<p class='real_content'>".$array_content_3[$z]."</p>";
					}
				}
				$div.="</li>";
			}
			else{
				$div.="<li>";
				$div.="<p class='title_2'>".$array_title_2[$j+1]."</p>";
				$array_content_3=explode("%",$array_content_2[$j]);
				$num_content_3=count($array_content_3);
				for($z=0;$z<$num_content_3;++$z){
					if($array_content_3[$z]){
						$div.="<p class='real_content'>".$array_content_3[$z]."</p>";
					}
				}
				$div.="</li>";
			}
			
		}
	} 		
	$div.="</ul>";	
	echo $div;
								
}
?>