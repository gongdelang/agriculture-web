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
function detail_nav($form,$id){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	$div="<span>您当前的位置是:</span><a href='../index.php'>首页></a>";
	$div.="<a href='nongzi.php?form=".$_GET["form"]."'>农资信息></a>";
	switch($form){
			case "nongzi-nongyao-shachongji":$div.="<a href='nongzi.php?form=1'>杀虫剂></a><span>".$row["name"]."</span>";break;
			case "nongzi-nongyao-shajunji":$div.="<a href='nongzi.php?form=2'>杀菌剂></a><span>".$row["name"]."</span>";break;
			case "nongzi-nongyao-chucaoji":$div.="<a href='nongzi.php?form=3'>除草剂></a><span>".$row["name"]."</span>";break;
			case "nongzi-nongyao-tiaojieji":$div.="<a href='nongzi.php?form=4'>调节剂></a><span>".$row["name"]."</span>";break;
								
			case "nongzi-huafei-fuhe":$div.="<a href='nongzi.php?form=5'>复合肥></a><span>".$row["name"]."</span>";break;
			case "nongzi-huafei-shenwu":$div.="<a href='nongzi.php?form=6'>生物肥></a><span>".$row["name"]."</span>";break;
			case "nongzi-huafei-jia":$div.="<a href='nongzi.php?form=7'>钾肥></a><span>".$row["name"]."</span>";break;
			case "nongzi-huafei-youji":$div.="<a href='nongzi.php?form=8'>有机肥></a><span>".$row["name"]."</span>";break;
								
			case "nongzi-zhongzi-datian":$div.="<a href='nongzi.php?form=9'>大田种子></a><span>".$row["name"]."</span>";break;
			case "nongzi-zhongzi-shucai":$div.="<a href='nongzi.php?form=11'>蔬菜种子></a><span>".$row["name"]."</span>";break;
			case "nongzi-zhongzi-guaguo":$div.="<a href='nongzi.php?form=10'>瓜果种子></a><span>".$row["name"]."</span>";break;
								
			case "nongzi-jixie-yunshu":$div.="<a href='nongzi.php?form=12'>运输></a><span>".$row["name"]."</span>";break;
			case "nongzi-jixie-caishou":$div.="<a href='nongzi.php?form=14'>采收></a><span>".$row["name"]."</span>";break;
			case "nongzi-jixie-jiagong":$div.="<a href='nongzi.php?form=13'>加工></a><span>".$row["name"]."</span>";break;
								
			default:$div.="<a href='nongzi.php?form=1'>杀虫剂></a><span>".$row["name"]."</span>";break;
	
	}
	echo $div;
}

//-----------------------------------------------------
//猜你喜欢ul-li
function mai_like($form,$row){

	//购买提示star---------------------------------------------------------------
	$div="<div class='goumai'><p  class='goumai_title'>购买提示</p>";
	$div.="<div class='goumai_con'>";
	$div.="<p class='bold'>购买方式:</p>";
	$div.="<p>方法一:点击进入<a href='https://www.taobao.com' target='_blank'>淘宝首页</a>，搜索‘".$row["name"]."’，可进行购买。</p>";
	$div.="<p>方法二:点击进入<a href='http://www.nongyao001.com' target='_blank'>中国农药第一网</a>，搜索‘".$row["name"]."’，可进行购买。</p>";
	$div.="<p style='color:red;text-indent:270px;'>注:以上信息来自于：<a href='http://www.nongyao001.com' target='_blank'>中国农药第一网</a></p>";
	$div.="</div></div>";
	//购买提示end----------------------------------------------------------------
	
	//猜你喜欢star---------------------------------------------------------------
	$star=intval($row["id"]);
	$result=open_form($form,$star,4);
	$div.="<div class='like'><p  class='like_title'>猜你喜欢</p>";
	$div.="<div class='like_con'>";
	$div.="<ul>";
	while($row=mysql_fetch_array($result)){
		$div.="<li><a href='nongzi_detail.php?";
		$div.="form=".$_GET["form"];
		$div.="&id=".$row["id"]."'><img src='../nongzi/";
		$div.=$row["picture"]."'><p>";
		//判断字符串长度
		$get_row=substr_cut($row["name"],30);
		$div.=$get_row;
		$div.="</p>";
		$div.="<p class='pX'><span>产品说明:</span>";
		//判断字符串长度
		$get_row=substr_cut($row["chanping"],80);
		$div.=$get_row."</p>";	
		$div.="</a></li>";
	}
	$div.="</ul>";
	$div.="</div></div>";
	//猜你喜欢end---------------------------------------------------------------
	
	return $div;
}

//--------------------------------------------------------------------
//农药的详情函数
function nongyao($form,$id){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//计算多少条id
	$total_sql="SELECT COUNT(*) FROM `$form`";
	$total_result=mysql_fetch_array(mysql_query($total_sql));
	$total=$total_result[0];
	//安装/打断
	$canshu_array=explode("|",$row["canshu"]);
	$chanping_array=explode("|",$row["chanping"]);
	$chanping_many=count($chanping_array);
	$zhuyi_array=explode("|",$row["zhuyi"]);
	$zhuyi_many=count($zhuyi_array);
	$div="<p class='tit'>";
	
	//标题
	$div.=$row["name"]."</p>";
	
	//图片
	$div.="<div class='img'>";
	$div.="<img src='../nongzi/".$row["picture"]."'></div>";
	
	//产品参数star---------------------------------------------------------------
	$div.="<div class='chanping'><p  class='chanping_title'>产品参数</p>";
	$div.="<div class='chanping_con'>";
	//表格
	$div.="<p class='p1'>规格</p><p class='p2'>成分</p><p class='p3'>剂型</p><p class='p4'>价格</p><p class='p5'>生产厂家</p>";
	
	$div.="<p class='p1'>".$canshu_array[0]."</p><p class='p2'>".$canshu_array[1]."</p><p class='p3'>".$canshu_array[2]."</p><p class='p4'>".$canshu_array[3]."</p><p class='p5'>".$canshu_array[4]."</p>";
	
	$div.="<p class='p6'>证件信息</p><p class='p5'>证件到期时间</p>";
	if($canshu_array[5]=="")
	{
		$div.="<p class='p6'>该产品无需证件信息</p><p class='p5'></p>";
	}
	else{
	$div.="<p class='p6'>".$canshu_array[5]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$canshu_array[6]."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$canshu_array[7]."</p><p class='p5'>".$row["time"]."</p>";
	}
	$div.="</div></div>";
	//产品参数end----------------------------------------------------------------
	
	
	//使用说明star---------------------------------------------------------------
	$div.="<div class='shiyong'><p  class='shiyong_title'>使用说明</p>";
	$div.="<div class='shiyong_con'>";
	
	$div.="<p class='bold'>产品说明:</p>";
	for($z=0;$z<$chanping_many;$z++){
		$div.="<p>".$chanping_array[$z]."</p>";
	}
	
	
	$div.="<p class='bold'>注意事项:</p>";
	for($i=0;$i<$zhuyi_many;$i++){
		$div.="<p>".$zhuyi_array[$i]."</p>";
	}
	
	$div.="<p class='bold'>防治对象:</p>";
	$div.="<p>".$row["fangzhi"]."</p>";

	$div.="<p class='bold'>适用对象:</p>";
	if($row["shiyong"]=="")
	{
		$div.="<p class='p6'>所有被防治对象所感染的植被</p><p class='p5'></p>";
	}
	else{
		$div.="<p>".$row["shiyong"]."</p>";
	}
	$div.="</div></div>";
	//使用说明end----------------------------------------------------------------
	//猜你喜欢star---------------------------------------------------------------
	$div.=mai_like($form,$row);
	//购买提示end----------------------------------------------------------------
	//猜你喜欢end----------------------------------------------------------------
   	echo $div;		
}

//--------------------------------------------------------------------
//化肥的详情函数
function huafei($form,$id){
	$result=open_form_id($form,$id);
	$row=mysql_fetch_array($result);
	//计算多少条id
	$total_sql="SELECT COUNT(*) FROM `$form`";
	$total_result=mysql_fetch_array(mysql_query($total_sql));
	$total=$total_result[0];
	//安装/打断
	$canshu_array=explode("|",$row["canshu"]);
	$chanping_array=explode("|",$row["chanping"]);
	$chanping_many=count($chanping_array);
	
	$div="<div class='huafei_top'>";
	//图片
	$div.="<img class='huafei_img' src='../nongzi/".$row["picture"]."'>";
	
	$div.="<div class='huafei_canshu'>";
	//标题
	$div.="<p class='huafei_tit'>";
	$div.=$row["name"]."</p>";
	
	//产品参数star---------------------------------------------------------------
	$div.="<div class='div1'><p  class='tit1'>产品参数</p>";
	$div.="<div class='div2'>";
	//参数
	$div.="<p><span class='p1'>生产厂商：</span>".$canshu_array[0]."</p>";
	$div.="<p><span class='p1'>规格：</span>".$canshu_array[1]."</p>";
	$div.="<p><span class='p1'>单价：</span>".$canshu_array[2]."</p>";
	$div.="<p><span class='p1'>起订：</span>".$canshu_array[3]."</p>";
	$div.="<p><span class='p1'>货源所在地：</span>".$canshu_array[4]."</p>";
	$div.="<p><span class='p1'>信息有效期：</span>".$canshu_array[5]."</p>";
	
	$div.="</div></div>";
	$div.="</div></div>";
	
	//说明star
	$div.="<div class='huafei_div3'><p  class='tit3'>产品说明</p>";
	$div.="<div class='huafei_div4'>";
	for($i=0;$i<$chanping_many;$i++){
		$div.="<p>".$chanping_array[$i]."</p>";
	}
	$div.="</div></div>";
	//说明end
	
	//购买提示star---------------------------------------------------------------
	$div.="<div class='goumai'><p  class='goumai_title'>购买提示</p>";
	$div.="<div class='goumai_con'>";
	$div.="<p class='bold'>购买方式:</p>";
	$div.="<p>方法一:点击进入<a href='https://www.taobao.com' target='_blank'>淘宝首页</a>，搜索‘".$row["name"]."’，可进行购买。</p>";
	$div.="<p>方法二:点击进入<a href='http://www.zgncpw.com' target='_blank'>中国农产品网</a>，搜索‘".$row["name"]."’，可进行购买。</p>";
	$div.="<p style='color:red;text-indent:270px;'>注:以上信息来自于：<a href='http://www.zgncpw.com' target='_blank'>中国农产品网</a></p>";
	$div.="</div></div>";
	//购买提示end----------------------------------------------------------------
	
	
	//猜你喜欢star---------------------------------------------------------------
	$star=intval($row["id"])+1;
	$result=open_form($form,$star,4);
	$div.="<div class='like'><p  class='like_title'>猜你喜欢</p>";
	$div.="<div class='like_con'>";
	$div.="<ul>";
	while($row=mysql_fetch_array($result)){
		$div.="<li><a href='nongzi_detail.php?";
		$div.="form=".$_GET["form"];
		$div.="&id=".$row["id"]."'><img src='../nongzi/";
		$div.=$row["picture"]."'><p>";
		//判断字符串长度
		$get_row=substr_cut($row["name"],30);
		$div.=$get_row;
		$div.="</p>";
		$div.="<p class='pX'><span>产品说明:</span>";
		//判断字符串长度
		$get_row=substr_cut($row["chanping"],80);
		$div.=$get_row."</p>";	
		$div.="</a></li>";
	}
	$div.="</ul>";
	$div.="</div></div>";
	//猜你喜欢end---------------------------------------------------------------
	
	echo $div;
}
function switchform($form,$id){
	switch($form){
			case "nongzi-nongyao-shachongji":nongyao($form,$id);break;
			case "nongzi-nongyao-chucaoji":nongyao($form,$id);break;
			case "nongzi-nongyao-shajunji":nongyao($form,$id);break;
			case "nongzi-nongyao-tiaojieji":nongyao($form,$id);break;
								
			case "nongzi-huafei-fuhe":huafei($form,$id);break;
			case "nongzi-huafei-jia":huafei($form,$id);break;
			case "nongzi-huafei-shenwu":huafei($form,$id);break;
			case "nongzi-huafei-youji":huafei($form,$id);break;
								
			case "nongzi-zhongzi-datian":huafei($form,$id);break;
			case "nongzi-zhongzi-shucai":huafei($form,$id);break;
			case "nongzi-zhongzi-guaguo":huafei($form,$id);break;
								
			case "nongzi-jixie-yunshu":huafei($form,$id);break;
			case "nongzi-jixie-caishou":huafei($form,$id);break;
			case "nongzi-jixie-jiagong":huafei($form,$id);break;
								
			default:nongyao($form,$id);break;
	
	}
	
}

?>