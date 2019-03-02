<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>搜索</title>
<link rel="stylesheet" href="css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="css/search.css" type="text/css" /><!--本网页的css样式-->
<?php include("php/functions_search.php") ?><!--资讯-函数库-->
</head>

<body>
<!--头背景star-->
		<div id="top-header"></div>
		<!--头背景end-->
		
		
		
		
		<!-------------------------------------------------------->
		<!--||导航栏-（首页）star-->
		<div id="bg">
			<div class="top-menu">
				<ul>
					<li><a href="index.php">首&nbsp;&nbsp;页</a></li>
					<li><a href="information/information.php?form=1&page=1" class="width4">农业资讯</a></li>
					<li><a href="information/information.php?form=3&page=1" class="width4">农业政策</a></li>
					<li><a href="information/information.php?form=6&page=1" class="width4">市场行情</a></li>
					<li><a href="video/video.php" class="width4">农业视频</a></li>
					<li><a href="teach/teach.php" class="width4">种植教学</a></li>
					<li><a href="nongzi/nongzi.php?form=1" class="width4">农资信息</a></li>
					<li><a href="bing_chong/bing_chong.php" class="width5">病虫害防治</a></li>
					<li><a href="search.php" class="active">搜索</a></li>
				</ul>
			</div>
		</div>
		<!--||导航栏-（首页）end>-->
		<!--去掉4个像素-->
    	<div style="width: 1004px; height: 4px; background: #ffffff;margin:0px auto;"></div>
	    <!--||导航栏-（首页）end>-->
	    
	    
	    <!---------------------总内容star--------------------------------->
		<div id="all-content">
			<!--搜索栏star-->
			<div id="search">
				<form method="get" action="search.php" name="search_form" >
					<div class="input1">
						<input type="text" name="search"  placeholder="请输入关键词搜索"
						value="<?php echo $search ?>"/>
					</div>
					<div class="input2">
						<input type="submit" name="submit" value='搜索'/>
					</div>
				</form>
				<div class="hot">
					<span>热门搜索：</span>
					<a href="search.php?search=西瓜">西瓜</a>
					<a href="search.php?search=哈密瓜">哈密瓜</a>
					<a href="search.php?search=棉花">棉花</a>
					<a href="search.php?search=农药">农药</a>
				</div>
			</div>
			<!--搜索栏end-->
			<!--搜索出的内容star-->
			<div id="content">
				<!--标题导航star-->
				<div id="lanren">
					<ul class="nav1">
						<li class="li1 active">
							农业资讯
							<ul class="nav20">
								<a class='li2' href='search.php?module=information&form=1&search=<?php echo
$search	?>'>
									热门新闻
								</a>
								<a class='li2' href='search.php?module=information&form=2&search=<?php echo
$search	?>'>
									最新新闻
								</a>
								<a class='li2' href='search.php?module=information&form=6&search=<?php echo
$search	?>'>
									行情动态
								</a>
							</ul>
						</li>
						<li class="li1">
							农业政策
							<ul class="nav20">
								<a class='li2' href='search.php?module=zhengce&form=3&search=<?php echo
$search	?>'>
									政策动态
								</a>
								<a class='li2' href='search.php?module=zhengce&form=4&search=<?php echo
$search	?>'>
									惠农政策
								</a>
								<a class='li2' href='search.php?module=zhengce&form=5&search=<?php echo
$search	?>'>
									农业标准
								</a>
							</ul>
						</li>
							
						<li class="li1">
							农业视频
							<ul class="nav21">
								<a class='li2' href='search.php?module=video&form=7&search=<?php echo
$search	?>'>
									热门视频
								</a>
								<a class='li2' href='search.php?module=video&form=8&search=<?php echo
$search	?>'>
									种植视频
								</a>
								<a class='li2' href='search.php?module=video&form=9&search=<?php echo
$search	?>'>
									作物信息
								</a>
								<a class='li2' href='search.php?module=video&form=10&search=<?php echo
$search	?>'>
									三农政策
								</a>
							</ul>
						</li>
						<li class="li1">
							种植教学
							<ul class="nav21">
								<a class='li2' href='search.php?module=teach&form=11&search=<?php echo
$search	?>'>
									瓜果
								</a>
								<a class='li2' href='search.php?module=teach&form=12&search=<?php echo
$search	?>'>
									蔬菜
								</a>
								<a class='li2' href='search.php?module=teach&form=13&search=<?php echo
$search	?>'>
									果树
								</a>
								<a class='li2' href='search.php?module=teach&form=14&search=<?php echo
$search	?>'>
									食用菌
								</a>
								<a class='li2' href='search.php?module=teach&form=15&search=<?php echo
$search	?>'>
									粮食作物
								</a>
								<a class='li2' href='search.php?module=teach&form=16&search=<?php echo
$search	?>'>
									经济作物
								</a>
							</ul>
						</li>
						<li class="li1">
							农资信息
							<ul class="nav21">
								<a class='li2' href='search.php?module=nongzi&name=nongyao&search=<?php echo
$search	?>'>
									农药
								</a>
								<a class='li2' href='search.php?module=nongzi&name=huafei&search=<?php echo
$search	?>'>
									化肥
								</a>
								<a class='li2' href='search.php?module=nongzi&name=zhongzi&search=<?php echo
$search	?>'>
									种子
								</a>
								<a class='li2' href='search.php?module=nongzi&name=nongji&search=<?php echo
$search	?>'>
									农机
								</a>
							</ul>
						</li>
						<li class="li1" id="last_one">
							病虫害防治
							<ul class="nav21">
								<a class='li2' href='search.php?module=bing_chong&name=bing&search=<?php echo
$search	?>'>
									病害
								</a>
								<a class='li2' href='search.php?module=bing_chong&name=chong&search=<?php echo
$search	?>'>
									虫害
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
						default:module='other';break;
						}
						if(module=='other'){
							for(var i=0;i<=5;i++){
								li[i].className="li1";	
							}
						}
						else{
							for(var i=0;i<=5;i++){
								if(i==module){
									li[i].className="li1 active";
								}
								else{
									li[i].className="li1";	
								}
							}
						}
					}
					setTab();
					</script>
					<!--js代码部分end-->
				</div>
			<!--标题导航end-->
				<!--搜索出的内容_content star-->
				<div id="content_content">
					<div class="title">
							<div class="nav">
								<span>您当前的位置是:</span>
								<a href="index.php">首页></a>
								<span>搜索></span>
								<?php nei_nav($module,$form,$name); ?>
							</div>
							<div class="background"></div>
					</div>
					<div class="content">
							<!--表界面-->
							<?php all_entry($form,$page,$module,$search,$name); ?>
					</div>
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
				<a href="#">浙江省多媒体大赛</a>
			</div>
		</div>
	</div>
</body>
</html>