<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>详细信息</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/bing_chong/bing_chong_detail.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/functions_bing_chong_detail.php") ?><!--资讯-函数库-->
</head>

<body>
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
					<li><a href="../video/video.php" class="width4">农业视频</a></li>
					<li><a href="../teach/teach.php" class="width4">种植教学</a></li>
					<li><a href="../nongzi/nongzi.php?form=1" class="width4">农资信息</a></li>
					<li><a href="bing_chong.php" class="width5 active">病虫害防治</a></li>
				</ul>
			<!--搜索框star-->
				<div class="top-search">
					<form action="../search.php" method="get" name="search_form">
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
	    <!--内容部分-->
	    <div  id="content">
	    	<!--标题导航-->
			<?php titile($form,$id,$page); ?>
    		<!--内容-->
    		<?php detail($form,$id,$page); ?>
	
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