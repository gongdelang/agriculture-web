<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理</title>
<link rel="stylesheet" href="css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="css/houtai.css" type="text/css" /><!--本网页的css样式-->
<?php include("php/functions_houtai_detail.php") ?><!--首页-函数库-->
<!--js样式star-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--js样式end-->

</head>

<body>
<?php
	session_start();
	@$zhanghao=$_COOKIE["zhanghao"];
	if($zhanghao == "") {
		echo
		"<script language='javascript'>
		alert('请先登录!');
		</script>";
		echo
		"<script language='javascript'>
		location.href = ('../denglu.php');
		</script>";
	}
?>
<!--头背景star-->
		<div id="top-header"></div>
		<!--头背景end-->
		
		
		
		
		
		<!--||导航栏-（首页）star-->
		<div id="bg">
			<div class="top-menu">
				<ul>
					<li><a href="houtai.php" class="width4 active">数据管理</a></li>
					<li><a href="information/information.php?form=1&page=1" class="width4">农业资讯</a></li>
					<li><a href="information/information.php?form=3&page=1" class="width4">农业政策</a></li>
					<li><a href="information/information.php?form=6&page=1" class="width4">市场行情</a></li>
					<li><a href="video/video.php" class="width4">农业视频</a></li>
					<li><a href="teach/teach.php" class="width4">种植教学</a></li>
					<li><a href="nongzi/nongzi.php?form=1" class="width4">农资信息</a></li>
					<li><a href="bing_chong/bing_chong.php" class="width5">病虫害防治</a></li>
				</ul>
			<!--搜索框star-->
				<div class="top-search">
					<a href='tuichu.php'>管理员退出</a>
				</div>
			<!--搜索框end-->
			</div>
		</div>
		<!--||导航栏-（首页）end>-->
	    <!--去掉4个像素-->
    	<div style="width: 1004px; height: 4px; background: #ffffff;margin:0px auto;"></div>
	    <!--||导航栏-（首页）end>-->
	    
	    <!---------------------总内容star--------------------------------->
		<div id="all-content">
			<!--搜索出的内容star-->
			<div id="content">
				<!--标题导航star-->
				<div id="lanren">
					<ul class="nav1">
						<li class="li1 active">
							农业资讯
							<ul class="nav20">
								<a class='li2' href='houtai.php?module=information&form=1'>
									热门新闻
								</a>
								<a class='li2' href='houtai.php?module=information&form=2'>
									最新新闻
								</a>
								<a class='li2' href='houtai.php?module=information&form=6'>
									行情动态
								</a>
							</ul>
						</li>
						<li class="li1">
							农业政策
							<ul class="nav20">
								<a class='li2' href='houtai.php?module=zhengce&form=3'>
									政策动态
								</a>
								<a class='li2' href='houtai.php?module=zhengce&form=4'>
									惠农政策
								</a>
								<a class='li2' href='houtai.php?module=zhengce&form=5'>
									农业标准
								</a>
							</ul>
						</li>
							
						<li class="li1">
							农业视频
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=video&form=7'>
									热门视频
								</a>
								<a class='li2' href='houtai.php?module=video&form=8'>
									种植视频
								</a>
								<a class='li2' href='houtai.php?module=video&form=9'>
									作物信息
								</a>
								<a class='li2' href='houtai.php?module=video&form=10'>
									三农政策
								</a>
							</ul>
						</li>
						<li class="li1">
							种植教学
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=teach&form=11'>
									瓜果
								</a>
								<a class='li2' href='houtai.php?module=teach&form=12'>
									蔬菜
								</a>
								<a class='li2' href='houtai.php?module=teach&form=13'>
									果树
								</a>
								<a class='li2' href='houtai.php?module=teach&form=14'>
									食用菌
								</a>
								<a class='li2' href='houtai.php?module=teach&form=15'>
									粮食作物
								</a>
								<a class='li2' href='houtai.php?module=teach&form=16'>
									经济作物
								</a>
							</ul>
						</li>
						<li class="li1">
							农资信息
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=nongzi&form=17'>
									杀虫剂
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=18'>
									杀菌剂
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=19'>
									除草剂
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=20'>
									调节剂
								</a>
								
								<a class='li2' href='houtai.php?module=nongzi&form=21'>
									复合肥
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=22'>
									生物肥
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=23'>
									钾肥
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=24'>
									有机肥
								</a>
								
								<a class='li2' href='houtai.php?module=nongzi&form=25'>
									大田种子
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=26'>
									瓜果种子
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=27'>
									蔬菜种子
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=28'>
									运输
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=29'>
									加工
								</a>
								<a class='li2' href='houtai.php?module=nongzi&form=30'>
									采收
								</a>
								
							</ul>
						</li>
						<li class="li1" id="last_one">
							病虫害防治
							<ul class="nav21">
								<a class='li2' href='houtai.php?module=bing_chong&form=31'>
									瓜果病害
								</a>
								<a class='li2' href='houtai.php?module=bing_chong&form=32'>
									蔬菜病害
								</a>
								<a class='li2' href='houtai.php?module=bing_chong&form=33'>
									果树病害
								</a>
								<a class='li2' href='houtai.php?module=bing_chong&form=34'>
									大田病害
								</a>
								<a class='li2' href='houtai.php?module=bing_chong&form=35'>
									瓜果虫害
								</a>
								<a class='li2' href='houtai.php?module=bing_chong&form=36'>
									蔬菜虫害
								</a>
								<a class='li2' href='houtai.php?module=bing_chong&form=37'>
									果树虫害
								</a>
								<a class='li2' href='houtai.php?module=bing_chong&form=38'>
									大田虫害
								</a>
							</ul>
						</li>
					</ul>
					<input type="hidden" id="input_module" value="<?php echo $module; ?>">
					<!--js代码部分star-->
					<script language="javascript">
						function setTab(){
						var li=document.getElementById("lanren").getElementsByTagName("li");
						li[0].className="li1 active";
						var module_name=document.getElementById("input_module");
						var module=0;
						switch(module_name.value){
							case "information":module=0;break;
							case "zhengce":module=1;break;
							case "video":module=2;break;
							case "teach":module=3;break;
							case "nongzi":module=4;break;
							case "bing_chong":module=5;break;
						default:module=0;break;
						}
						for(var i=0;i<=5;i++){
							if(i==module){
								li[i].className="li1 active";
							}
							else{
								li[i].className="li1";	
							}
						}
					}
					setTab();
					</script>
					<!--js代码部分end-->
				</div>
			<!--标题导航end-->
				<!--搜索出的内容_content star-->
					<div class="title">
							<div class="nav">
								<span>您当前的位置是:</span>
								
								<?php nei_nav($module,$form); ?>
							</div>
							<div class="background"></div>
							<a id='tianjia' href='houtai_detail?form=<?php echo $form ?>'>添加数据</a>
					</div>
					<div class="content">
							<!--表界面-->
							<?php all_enty($form,$id,$page,$module); ?>
						<script>
							$(function(){
								$("#back").click(function(){
									window.history.back();
								});
							});
						</script>
					</div>
			</div>
			<!--搜索出的内容end-->
		</div>
	    
	    
	    
	<!-------------------------------------------------------->
  	<!--尾-->
	<div id="bottom">
		<div class="span">
			<div class="span1">
				<p>友情链接：</p>
				<div>
					<a href="http://www.xjxnw.gov.cn" target="_blank">兴农网</a>
					<a href="http://www.zgny.com.cn" target="_blank">中国农业网</a>
					<a href="http://www.chinapesticide.gov.cn" target="_blank">中国农药信息网</a>
					<a href="http://www.grain.gov.cn" target="_blank">中国粮食信息网</a>

				</div>
				<div>
					<a href="http://www.gofei.net" target="_blank">农批网</a>
					<a href="http://www.agri.cn" target="_blank">中国农业信网</a>
					<a href="http://www.nongyao001.com" target="_blank">中国农药第一网</a>
					<a href="http://www.zgncpw.com" target="_blank">中国农产品网</a>
				</div>
			</div>
			<div class="span2">
				<p>关于我们：</p>
				<div class="p">
					<p>联系地址：浙江省多媒体大赛</p>
					<p>联系电话：***********/**********</p>
				</div>
				<div class="p">
				 <p>官方邮箱：***********@qq.com</p>
				</div>
			</div>
			<div class="span3">
				<a href="../index.php" target="_blank">新疆农业技术学习平台</a>
			</div>
		</div>
	</div>
</body>
</html>