<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>病虫害防治</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/bing_chong/bing_chong.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/functions_bing_chong.php") ?><!--资讯-函数库-->
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
		
		
		
		
		
		<!---------------------总内容star--------------------------------->
		<div id="all-content">
			<div id="left-nav">
				<p class='p2'>病害</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all1">
					<p class='p3' id="one1" onclick="setTab('one',1)">
						<a>瓜果病害<span>></span></a>
					</p>
					<p class='p3' id="one2" onclick="setTab('one',2)">
						<a>蔬菜病害<span>></span></a>
					</p>
					<p class='p3' id="one3" onclick="setTab('one',3)">
						<a>果树病害<span>></span></a>
					</p>
					<p class='p3' id="one4" onclick="setTab('one',4)">
						<a>大田作物<span>></span></a>
					</p>
				</div>
				
				<p class='p2'>虫害</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all2">
					<p class='p3' id="one5" onclick="setTab('one',5)">
						<a>瓜果虫害<span>></span></a>
					</p>
					<p class='p3' id="one6" onclick="setTab('one',6)">
						<a  >蔬菜虫害<span>></span></a>
					</p>
					<p class='p3' id="one7" onclick="setTab('one',7)">
						<a>果树虫害<span>></span></a>
					</p>
					<p class='p3' id="one8" onclick="setTab('one',8)">
						<a>大田作物<span>></span></a>
					</p>
				</div>
			</div>
			<div id="right-content">
				<div id="con_one_1">
					<iframe src='bing_chong_iframe.php?form=1&page=<?php echo $page;?>' width="814" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_2">
					<iframe src='bing_chong_iframe.php?form=2&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_3">
					<iframe src='bing_chong_iframe.php?form=3&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_4">
					<iframe src='bing_chong_iframe.php?form=4&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_5">
					<iframe src='bing_chong_iframe.php?form=5&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_6">
					<iframe src='bing_chong_iframe.php?form=6&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_7">
					<iframe src='bing_chong_iframe.php?form=7&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_8">
					<iframe src='bing_chong_iframe.php?form=8&page=<?php echo $page;?>' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
			</div>
			<input type="hidden" id="form" value="<?php echo $form ?>">
			<!--js代码star-->
				<script>
					function setTab(name,cursel){
						for(var i=1;i<=8;i++){
							var menu = document.getElementById(name+i);
							var menudiv = document.getElementById("con_"+name+"_"+i);
							if(i==cursel){
								menu.className="p3 active";
								menudiv.style.display="block";
							}
							else{
								menu.className="p3";
								menudiv.style.display="none";
								
							}
						}
					}
					
					function setTabswitch(){
						var form=document.getElementById("form");
						switch(form.value){
							case "illness-guaguo":setTab('one',1);break;
							case "illness-shucai":setTab('one',2);break;
							case "illness-tree":setTab('one',3);break;
							case "illness-datian":setTab('one',4);break;

							case "wrom-guaguo":setTab('one',5);break;
							case "wrom-shucai":setTab('one',6);break;
							case "wrom-tree":setTab('one',7);break;
							case "wrom-datian":setTab('one',8);break;
								
						default:setTab('one',1);break;
						}
					}
					setTabswitch();
				</script>
			<!--js代码end-->
		</div>
		<!---------------------总内容end--------------------------------->
		
		
		
		
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