<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>视频</title>
</head>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/video.css" type="text/css" /><!--本网页的css样式-->
<!--js样式star-->
<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../js/video/jquery.corner.js"></script>
<script type="text/javascript" src="../js/video/jquery.roundabout.js"></script>
<script type="text/javascript" src="../js/video/jquery.roundabout-shapes.js"></script>
<script type="text/javascript" src="../js/video/video.js"></script>
<!--js样式end-->
<?php include("../php/functions_video.php") ?><!--资讯-函数库-->
<body>
		<!--头背景star-->
		<div id="top-header"></div>
		<!--头背景end-->
		
		
		
		
		<!-------------------------------------------------------->
		<!--||导航栏-（首页）star-->
		<div id="bg">
			<div class="top-menu">
				<ul>
					<li><a href="../index.php">首&nbsp;&nbsp;页</a></li>
					<li><a href="../information/information.php?form=1&page=1" class="width4">农业资讯</a></li>
					<li><a href="../information/information.php?form=3&page=1" class="width4">农业政策</a></li>
					<li><a href="../information/information.php?form=6&page=1" class="width4">市场行情</a></li>
					<li><a href="video.php" class="width4 active">农业视频</a></li>
					<li><a href="../teach/teach.php" class="width4">种植教学</a></li>
					<li><a href="../nongzi/nongzi.php?form=1" class="width4">农资信息</a></li>
					<li><a href="../bing_chong/bing_chong.php" class="width5">病虫害防治</a></li>
				</ul>
			<!--搜索框star-->
				<div class="top-search">
					<form method="get" action="../search.php" name="search_form">
						<input type="text" name="search" class="input1" placeholder="请输入关键词搜索"/>
						<input type="submit" name="submit" class="input2" value=""/>
					</form>
				</div>
			<!--搜索框end-->
			</div>
		</div>
   	 	<!--去掉4个像素-->
    	<div style="width: 1004px; height: 4px; background: #ffffff;margin:0px auto;"></div>
	    <!--||导航栏-（首页）end>-->
	    
	    
	    
	    
	    
	     <!-------------------------------------------------------->
	    <!--总的内容-->
		<div id="all-content">
			<!--||推荐star>-->
			<div class="title">
				<!--/*导航标签*/-->
				<div class="nav">
					<span>您当前的位置是:</span>
					<a href="../index.php">首页></a>
				    <span>视频</span>
				</div>
				<div class="background"></div>
			</div>
    		<div id="gla">
				<div id="gla_box">
					
					<ul>
						<span class="p_first">推荐视频</span>
						<?php img($sql_video_hot); ?>

					</ul>
				</div>
			</div>
    		<!--||推荐end>-->
    		
    		
    		<!-------------------------------------------------------->
    		<!--||内容star>-->
    		<div id="content">
    		<!-- tab标签代码begin -->
					<div class="tab1" id="tab1">
						<div class="menu" id="menu">
							<ul>
								<li id="one1" onclick="setTab('one',1)">热门视频</li>
								<li id="one2" onclick="setTab('one',2)">种植视频</li>
								<li id="one3" onclick="setTab('one',3)">作物信息</li>
								<li id="one4" onclick="setTab('one',4)">三农政策</li>
							</ul>
						</div>
						<div class="menudiv">
							<div id="con_one_1">
								<iframe src='viode_iframe.php?form=1' width="950" height="480" frameborder='0' scrolling='no' ></iframe>
							</div>
							<div id="con_one_2" style="display:none;">
								<iframe src='viode_iframe.php?form=2' width="950" height="480" frameborder='0' scrolling='no' ></iframe>
							</div>
							<div id="con_one_3" style="display:none;">
								<iframe src='viode_iframe.php?form=3' width="950" height="480" frameborder='0' scrolling='no' ></iframe>
							</div>
							<div id="con_one_4" style="display:none;">
								<iframe src='viode_iframe.php?form=4' width="950" height="480" frameborder='0' scrolling='no' ></iframe>
							</div>
						</div>
						
					</div>
					<!-- tab标签代码end -->
					<!--js代码star-->
					<script>
						function setTab(name,cursel){
							for(var i=1; i<=4; i++){
								var menu = document.getElementById(name+i);
								var menudiv = document.getElementById("con_"+name+"_"+i);
								if(i==cursel){
									menu.className="off";
									menudiv.style.display="block";
								}
								else{
									menu.className="";
									menudiv.style.display="none";
								}
							}
						}
						var name_0='one';
						var cursel_0=1;
						setTab(name_0,cursel_0);
					</script>
				<!--js代码end-->
			</div>
    		<!--||内容end>-->
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
				<a href="../denglu.php">管理员登录</a>
			</div>
		</div>
	</div>
</body>
</html>