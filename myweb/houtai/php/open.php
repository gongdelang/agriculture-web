<?php
   	require(dirname(__FILE__)."/../.././config.php");
	error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
	//连接数据库
	$conn=mysql_connect($mysql_server_name,$mysql_username,$mysql_password) or die("error connecting");
	mysql_query("set names 'utf8'"); 
	mysql_select_db($mysql_database); //打开数据库


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



//------------------------------------------------------------------
//打开指定表的指定内容
function open_form($form,$star,$many){
	$sql_form="SELECT * FROM `$form` ORDER BY `$form`.`id` ASC  LIMIT $star,$many"; 
	$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}
//------------------------------------------------------------------
//打开指定表的指定内容

function count_form_all($form){
	$total_sql="SELECT COUNT(*) FROM `$form`";
	$result=mysql_query($total_sql,$GLOBALS['conn'] )or die("error connecting"); //查询
	$result1=mysql_fetch_array($result);
	$count=$result1[0];
	return $count;
}
function alert_form_view($form){
	$sql_form_id="ALTER TABLE `$form` ADD `view` INT NOT NULL AFTER `id`";
	$result=mysql_query($sql_form_id,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}
function open_form_all($form){
	$sql_form="SELECT * FROM `$form`"; 
	$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
	return $result;
}
//------------------------------------------------------------------
//打开随着id的内容
function open_form_id($form,$id){
	if($id){
		$sql_form="SELECT * FROM `$form` WHERE id=$id"; 
		$result=mysql_query($sql_form,$GLOBALS['conn'] )or die("error connecting"); //查询
		$row=mysql_fetch_array($result);
	}
	else{
		$row="";
	}
	return $row;
}
//打开随着id的倒叙
function open_form_id_daoxu($form){
	$sql="select * from `$form` order by id desc";
	$result= mysql_query($sql); //查询
	return $result;
}
function delect_form_id($form,$id){
	$sql="DELETE FROM `$form` WHERE `$form`.`id` = $id";
	$result= mysql_query($sql); //查询
	return $result;	
}
//------------------------------------------------------------------
//除去乱码的字符串分割
function substr_cut($str_cut,$length)
{
    if (strlen($str_cut) > $length)
    {
        for($i=0; $i < $length; $i++)
        if (ord($str_cut[$i]) > 128)    $i=$i+2;
        $str_cut = substr($str_cut,0,$i)."...";
			
    }
    return $str_cut;
}
//检测网络是否连接  
function varify_url($url){   
	$check = @fopen($url,"r");   
	if($check){   
		$status = true;   
	}
	else{   
		$status = false;   
	}   
		return $status;   
} 
//information——搜索 
function search_form_information($form,$search){
	if($form==""){
		$search_data="";
		return $search_data;
	}
	else{
		$sql ="SELECT * FROM `$form`  where (title LIKE  '%$search%' OR content LIKE  '%$search%')ORDER BY id DESC";
		$search_data=mysql_query($sql);
		return $search_data; 
	}
}
//nongzi——搜索 
function search_form_nongzi($form,$search){
	if($form==""){
		$search_data="";
		return $search_data;
	}
	else{
		$sql ="SELECT * FROM `$form`  where (name LIKE  '%$search%' OR chanping LIKE  '%$search%')ORDER BY id DESC";
		$search_data=mysql_query($sql);
		return $search_data; 
	}
}
?>