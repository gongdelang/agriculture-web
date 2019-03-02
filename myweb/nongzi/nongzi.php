<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>农资信息</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/nongzi/nongzi.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/functions_nongzi.php") ?><!--资讯-函数库-->
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
					<li><a href="nongzi.php?form=1" class="width4 active">农资信息</a></li>
					<li><a href="../bing_chong/bing_chong.php" class="width5">病虫害防治</a></li>
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
				<p class='p2' onclick="shrink('all1')" >农药</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all1" title="0" style="display: none">
					<p class='p3' id="one1" onclick="setTab('one',1)">
						<a>杀&nbsp;&nbsp;虫&nbsp;&nbsp;剂<span>></span></a>
					</p>
					<p class='p3' id="one2" onclick="setTab('one',2)">
						<a  >杀&nbsp;&nbsp;菌&nbsp;&nbsp;剂<span>></span></a>
					</p>
					<p class='p3' id="one3" onclick="setTab('one',3)">
						<a>除&nbsp;&nbsp;草&nbsp;&nbsp;剂<span>></span></a>
					</p>
					<p class='p3' id="one4" onclick="setTab('one',4)">
						<a >调&nbsp;&nbsp;节&nbsp;&nbsp;剂<span>></span></a>
					</p>
				</div>
				<p class='p2' onclick="shrink('all2')">化肥</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all2" title="0"  style="display: none">
					<p class='p3' id="one5" onclick="setTab('one',5)">
						<a>复&nbsp;&nbsp;合&nbsp;&nbsp;肥<span>></span></a>
					</p>
					<p class='p3' id="one6" onclick="setTab('one',6)">
						<a>生&nbsp;&nbsp;物&nbsp;&nbsp;肥<span>></span></a>
					</p>
					<p class='p3' id="one7" onclick="setTab('one',7)">
						<a>钾&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;肥<span>></span></a>
					</p>
					<p class='p3' id="one8" onclick="setTab('one',8)">
						<a>有&nbsp;&nbsp;机&nbsp;&nbsp;肥<span>></span></a>
					</p>
				</div>
				<p class='p2' onclick="shrink('all3')">种子</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all3" title="0"  style="display: none">
					<p class='p3' id="one9" onclick="setTab('one',9)">
						<a>大田种子<span>></span></a>
					</p>
					<p class='p3' id="one10" onclick="setTab('one',10)">
						<a>瓜果种子<span>></span></a>
					</p>
					<p class='p3' id="one11" onclick="setTab('one',11)">
						<a>蔬菜种子<span>></span></a>
					</p>
				</div>
				<p class='p2' onclick="shrink('all4')">农机</p>
				<p style="width:188px; border-bottom:2px solid #b9b9b9"></p>
				<div id="all4" title="0"  style="display: none">
					<p class='p3' id="one12" onclick="setTab('one',12)">
						<a>运&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;输<span>></span></a>
					</p>
					<p class='p3' id="one13" onclick="setTab('one',13)">
						<a>加&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;工<span>></span></a>
					</p>
					<p class='p3' id="one14" onclick="setTab('one',14)">
						<a>采&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;收<span>></span></a>
					</p>
				</div>
			</div>
			<div id="right-content">
				<div id="con_one_1">
					<iframe src='nongzi_iframe.php?form=1' width="814" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_2">
					<iframe src='nongzi_iframe.php?form=2' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_3">
					<iframe src='nongzi_iframe.php?form=3' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_4">
					<iframe src='nongzi_iframe.php?form=4' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_5">
					<iframe src='nongzi_iframe.php?form=5' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_6">
					<iframe src='nongzi_iframe.php?form=6' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_7">
					<iframe src='nongzi_iframe.php?form=7' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_8">
					<iframe src='nongzi_iframe.php?form=8' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_9">
					<iframe src='nongzi_iframe.php?form=9' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_10">
					<iframe src='nongzi_iframe.php?form=10' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_11">
					<iframe src='nongzi_iframe.php?form=11' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_12">
					<iframe src='nongzi_iframe.php?form=12' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_13">
					<iframe src='nongzi_iframe.php?form=13' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
				
				<div id="con_one_14">
					<iframe src='nongzi_iframe.php?form=14' width="800" height="800" frameborder='0' scrolling='no' ></iframe>
				</div>
			</div>
			<input type="hidden" id="form" value="<?php echo $form ?>">
			<!--js代码star-->
				<script>
					function shrink(name){
						var all=document.getElementById(name);
						if(all.title=="1"){
							all.title="0";
							all.style.display="none";
						}
						else if(all.title=="0"){
							all.title="1";
							all.style.display="block";
						}
					}
					function setTab(name,cursel){
						for(var i=1;i<=14;i++){
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
					
					function shrinkswitch(){
						var form=document.getElementById("form");
						switch(form.value){
								case "nongzi-nongyao-shachongji":shrink('all1');break;
								case "nongzi-nongyao-chucaoji":shrink('all1');break;
								case "nongzi-nongyao-shajunji":shrink('all1');break;
								case "nongzi-nongyao-tiaojieji":shrink('all1');break;
								
								case "nongzi-huafei-fuhe":shrink('all2');break;
								case "nongzi-huafei-jia":shrink('all2');break;
								case "nongzi-huafei-shenwu":shrink('all2');break;
								case "nongzi-huafei-youji":shrink('all2');break;
								
								case "nongzi-zhongzi-datian":shrink('all3');break;
								case "nongzi-zhongzi-shucai":shrink('all3');break;
								case "nongzi-zhongzi-guaguo":shrink('all3');break;
								
								case "nongzi-jixie-yunshu":shrink('all4');break;
								case "nongzi-jixie-caishou":shrink('all4');break;
								case "nongzi-jixie-jiagong":shrink('all4');break;
								
							default:shrink('all1');break;
	
						}
					}
					
					function setTabswitch(){
						var form=document.getElementById("form");
						switch(form.value){
								case "nongzi-nongyao-shachongji":setTab('one',1);break;
								case "nongzi-nongyao-shajunji":setTab('one',2);break;
								case "nongzi-nongyao-chucaoji":setTab('one',3);break;
								case "nongzi-nongyao-tiaojieji":setTab('one',4);break;
								
								case "nongzi-huafei-fuhe":setTab('one',5);break;
								case "nongzi-huafei-shenwu":setTab('one',6);break;
								case "nongzi-huafei-jia":setTab('one',7);break;
								case "nongzi-huafei-youji":setTab('one',8);break;
								
								case "nongzi-zhongzi-datian":setTab('one',9);break;
								case "nongzi-zhongzi-guaguo":setTab('one',10);break;
								case "nongzi-zhongzi-shucai":setTab('one',11);break;
								
								case "nongzi-jixie-yunshu":setTab('one',12);break;
								case "nongzi-jixie-jiagong":setTab('one',13);break;
								case "nongzi-jixie-caishou":setTab('one',14);break;
								
							default:setTab('one',1);break;
						}
					}
					shrinkswitch();
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
