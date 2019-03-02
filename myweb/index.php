<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新疆农业</title>
<link rel="stylesheet" href="css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="css/index.css" type="text/css" /><!--本网页的css样式-->
<?php include("php/functions_index.php") ?><!--首页-函数库-->
<!--js样式star-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--js样式end-->
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
					<li><a href="index.php" class="active">首&nbsp;&nbsp;页</a></li>
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
					<form method="get" action="search.php" name="search_form">
						<input type="text" name="search" class="input1" placeholder="请输入关键词搜索"/>
						<input type="submit" name="submit" class="input2" value=""/>
					</form>
				</div>
			<!--搜索框end-->
			</div>
		</div>
		<!--||导航栏-（首页）end>-->
		
		
		
		
		<!-------------------------------------------------------->
		<div id="all-content">
			
			<!--||资讯star>-->
			<div id="middle-information">
				<!--||资讯title-star>-->
				<div class="information-title">
					<ul>
						<li><a href="information/information.php?form=1&page=1">热门新闻</a></li>
						<li><a href="information/information.php?form=2&page=1">最新新闻</a></li>
					</ul>
				</div>
				<!--||资讯title-end>-->
				<!--||资讯-内容star>-->
				<div class="information-content">
					<!--||资讯-新闻star>-->
					<div class="content-hot">
						<p>热门新闻</p>
						<div class="content-ul">
							<!--js样式展现新闻-共i条图片新闻-star-->
							<div class="new_js" id="new_hot_img">
								<?php information_img($sql_news_hot,3); ?>
								<div class="xuanze" id="new_hot_dian">
									<span class="active"></span>
									<span></span>
									<span></span>
								</div>
							</div>
							<!--js样式展现新闻end-->
							<ul>
								<a href="information/information.php?form=1&page=1" class="more" >更多</a>
								<?php information_li($sql_news_hot,4); ?>
							</ul>
							</ul>
						</div>
					</div>
					<!--||资讯-新闻end>-->
					
					<!--||资讯-政策star>-->
					<div   class="content-hot content-new" >
						<p>最新新闻</p>
						<div class="content-ul">
							<!--js样式展现新闻-共i条图片新闻-star-->
							<div class="new_js" id="new_new_img">
								<?php information_img($sql_news_new,3); ?>
								<div class="xuanze" id="new_new_dian">
									<span class="active"></span>
									<span></span>
									<span></span>
								</div>
							</div>
							<!--js样式展现新闻end-->
							<ul>
								<a href="information/information.php?form=2&page=1" class="more" >更多</a>
								<?php information_li($sql_news_new,4); ?>
							</ul>
						</div>
					</div>
					<!--||资讯-政策end>-->
				</div>
				<!--||资讯-内容end>-->
			</div>
			<!--||资讯end>-->
			<script type="text/javascript">
				function qiehuan(name){
					var _i=$('#new_hot_dian .active').index();
					var _i_bian=1;	

					if(_i>=2){

						_i_bian=0;
					}
					else{

						_i_bian=_i+1;
					}
					$(name+'_dian span').removeClass('active');
					$(name+'_dian span').eq(_i_bian).addClass('active');
					$(name+'_img a').removeClass('display_block');
					$(name+'_img a').eq(_i_bian).addClass('display_block');	
				}
				//span的点击效果
				$(function(){
					$('#new_hot_dian span').click(function(){
						var _i=$(this).index();
						$('#new_hot_dian span').removeClass('active');
						$('#new_hot_dian span').eq(_i).addClass('active');
						$('#new_hot_img a').removeClass('display_block');
						$('#new_hot_img a').eq(_i).addClass('display_block');
					});

					$('#new_hot_dian span').mouseover(function(){
						clearInterval(iIntervalId0);
					});
					$('#new_hot_dian span').mouseout(function(){
						iIntervalId0 = setInterval("qiehuan('#new_hot');","2000");
					});
					$('#new_hot_img a').mouseover(function(){
						clearInterval(iIntervalId0);
					});
					$('#new_hot_img a').mouseout(function(){
						iIntervalId0 = setInterval("qiehuan('#new_hot');","2000");
					});
					iIntervalId0=setInterval("qiehuan('#new_hot');","2000");
					//-------------------------------------------------------------
					$('#new_new_dian span').click(function(){
						var _i=$(this).index();
						$('#new_new_dian span').removeClass('active');
						$('#new_new_dian span').eq(_i).addClass('active');
						$('#new_new_img a').removeClass('display_block');
						$('#new_new_img a').eq(_i).addClass('display_block');
					});

					$('#new_new_dian span').mouseover(function(){
						clearInterval(iIntervalId0_1);
					});
					$('#new_new_dian span').mouseout(function(){
						iIntervalId0_1 = setInterval("qiehuan('#new_new');","2000");
					});
					$('#new_new_img a').mouseover(function(){
						clearInterval(iIntervalId0_1);
					});
					$('#new_new_img a').mouseout(function(){
						iIntervalId0_1 = setInterval("qiehuan('#new_new');","2000");
					});
					iIntervalId0_1=setInterval("qiehuan('#new_new');","2000");
					
				});
			</script>
			
		
		
			<!--||政策star>-->
			<div id="middle-zhengce">
				<!--||政策title-star>-->
				<div class="zhengce-title">
					<ul>
						<li><a href="information/information.php?form=3&page=1">政策动态</a></li>
						<li><a href="information/information.php?form=4&page=1">惠农政策</a></li>
						<li><a href="information/information.php?form=5&page=1">农业标准</a></li>
					</ul>
				</div>
				<!--||政策title-end>-->
				<!--||政策-内容star>-->
				<div class="zhengce-content">
					<!--||政策-新闻star>-->
					<div class="content-dongtai">
						<p>政策动态</p>
						<div class="content-ul">
							<!--js样式展现新闻-共i条图片新闻-star-->
							<div class="new_js">
								<?php zhengce_img($sql_policy_dongtai,2); ?>
							</div>
							<!--js样式展现新闻end-->
							<ul>
								<a href="information/information.php?form=3&page=1" class="more" >更多</a>
								<?php zhengce_li($sql_policy_dongtai,4,33);//创建一个最多有5个的li-a ?>
							</ul>
						</div>
					</div>
					<!--||政策-新闻end>-->

					<!--||政策-政策star>-->
					<div   class="content-dongtai content-huinong" >
						<p>惠农政策</p>
						<div class="content-ul">
							<ul>
								<a href="information/information.php?form=4&page=1" class="more" >更多</a>
								<?php zhengce_li($sql_policy_huinong,5,65); ?>
							</ul>
						</div>
					</div>
					<!--||政策-政策end>-->

					<!--||政策-市场star>-->
					<div   class="content-dongtai content-huinong" >
						<p>农业标准</p>
						<div class="content-ul">
							<ul>
								<a href="information/information.php?form=5&page=1" class="more" >更多</a>
								<?php zhengce_li($sql_policy_biaozhun,5,65); ?>
							</ul>
						</div>
					</div>
					<!--||政策-市场end>-->

					<!--||政策-气象star>-->
					<div class="content-dongtai content-weather" >
						<p><a href="https://www.seniverse.com/weather/city/TZY33C4YJBP3" target="_blank" >疆内气象</a></p>
						<div class="weather-out">
							<?php ifream(); ?>
						</div>
					</div>
					<!--||政策-气象end>-->
				</div>
				<!--||政策-内容end>-->
			</div>
			<!--||政策end>-->
			
			
			
			
			<!-------------------------------------------------------->
			<div id="v_q">
				<!--市场star-->
				<div class="market">
					<div class="title">
						<a href="information/information.php?form=6&page=1">更多</a>
					</div>
					<div class="content">
						<ul>
							<?php market_li($sql_market_dongtai,6);?>
						</ul>
					</div>
				</div>
				<!--市场end-->
				
				<!--视频star-->
				<!-------------------------------------------------------->
				<div class="video">
					<div class="title">
						<a href="video/video.php">更多</a>
					</div>
					<div class="content">
						<?php video_img($sql_video_hot,0,3); ?>
					</div>
				</div>
				<!--视频end-->
			</div>
			
			
			
			
			<!-------------------------------------------------------->
			<!--种植教学star-->
			<div id="middle-teach">
				<!--||种植教学title-star>-->
				<div class="teach-title">
					<ul>
						<li><a href="teach/teach.php?form=1">瓜果</a></li>
						<li><a href="teach/teach.php?form=2">蔬菜</a></li>
						<li><a href="teach/teach.php?form=3">果树</a></li>
						<li><a href="teach/teach.php?form=4">食用菌</a></li>
						<li><a href="teach/teach.php?form=5">粮食作物</a></li>
						<li><a href="teach/teach.php?form=6">经济作物</a></li>
					</ul>
				</div>
				<!--||种植教学title-end>-->
				
				<!--||种植教学-内容star>-->
				<div class="teach-content">
					<!--||种植教学-瓜果star>-->
					<div class="content-guaguo">
						<p>瓜果<a href="teach/teach.php?form=1" >更多</a></p>
						<div class="content-ul">
							<ul>
								<?php teach_name($sql_teach_guaguo,0,4);//创建一个最多有5个的li-a ?>
							</ul>
							<ul>
								<?php teach_name($sql_teach_guaguo,4,4);//创建一个最多有5个的li-a ?>
							</ul>
						</div>
					</div>
					<!--||||种植教学-瓜果end>-->
					
					<!--||||种植教学-蔬菜star>-->
					<div class="content-guaguo">
						<p>蔬菜<a href="teach/teach.php?form=2"  >更多</a></p>
						<div class="content-ul">
							<ul>
								<?php teach_name($sql_teach_shucai,0,4);//创建一个最多有5个的li-a ?>
							</ul>
							<ul>
								<?php teach_name($sql_teach_shucai,4,4);//创建一个最多有5个的li-a ?>
							</ul>
						</div>
					</div>
					<!--||||种植教学-蔬菜end>-->
					
					<!--||||种植教学-果树star>-->
					<div class="content-guaguo">
						<p>果树<a href="teach/teach.php?form=3"  >更多</a></p>
						<div class="content-ul">
							<ul>
								<?php teach_name($sql_teach_tree,0,4);//创建一个最多有5个的li-a ?>
							</ul>
							<ul>
								<?php teach_name($sql_teach_tree,4,4);//创建一个最多有5个的li-a ?>
							</ul>
						</div>
					</div>
					<!--||||种植教学-果树end>-->
					
					<!--||||种植教学-食用菌star>-->
					<div class="content-guaguo content-funguns">
						<p>食用菌<a href="teach/teach.php?form=4">更多</a></p>
						<p>粮食作物<a href="teach/teach.php?form=5">更多</a></p>
						<p class="cashCrop">经济作物<a href="teach/teach.php?form=6">更多</a></p>
					</div>
					<!--||||种植教学-食用菌end>-->
				</div>
			</div>
			<!--种植教学end-->
			
			
			
			
			<!-------------------------------------------------------->
			<!--农资信息star-->
			<div id="middle-nongzi">
				<!--||农资title-star>-->
				<div class="nongzi-title">
					<ul>
						<li><a href="nongzi/nongzi.php?form=1">农药</a></li>
						<li><a href="nongzi/nongzi.php?form=5">化肥</a></li>
						<li><a href="nongzi/nongzi.php?form=9">种子</a></li>
						<li><a href="nongzi/nongzi.php?form=12">农机</a></li>
					</ul>
				</div>
				<!--||农资title-end>-->
				<!--||农资-内容star>-->
				<div class="nongzi-content">
					<!--||农药star>-->
					<div class="content-nongyao">
						<p>农药<a href="nongzi/nongzi.php?form=1" >更多</a></p>
						<div class="content-ul">
							<div class="img"><img src="css/tips_picture/nongyao.jpg"></div>
							<ul>
								<li><a href="nongzi/nongzi.php?form=1">杀虫剂</a></li>
								<li><a href="nongzi/nongzi.php?form=2">杀菌剂</a></li>
							</ul>
							<ul>
								<li><a href="nongzi/nongzi.php?form=3">除草剂</a></li>
								<li><a href="nongzi/nongzi.php?form=4">调节剂</a></li>
							</ul>
						</div>
					</div>
					<!--||||农药end>-->
					<!--||||种子star>-->
					<div class="content-nongyao">
						<p>化肥<a href="nongzi/nongzi.php?form=5"  >更多</a></p>
						<div class="content-ul">
						    <div class="img"><img src="css/tips_picture/huafei.jpg"></div>
							<ul>
								<li><a href="nongzi/nongzi.php?form=5">复合肥</a></li>
								<li><a href="nongzi/nongzi.php?form=6">生物肥</a></li>
							</ul>
							<ul>
								<li><a href="nongzi/nongzi.php?form=7">钾肥</a></li>
								<li><a href="nongzi/nongzi.php?form=8">有机肥</a></li>
							</ul>
						</div>
					</div>
					<!--||||种子end>-->
					<!--||||化肥star>-->
					<div class="content-nongyao">
						<p>种子<a href="nongzi/nongzi.php?form=9"  >更多</a></p>
						<div class="content-ul">
						 	<div class="img"><img src="css/tips_picture/zhongzi.jpg"></div>
							<ul>
								<li><a href="nongzi/nongzi.php?form=9">大田种子</a></li>
								<li><a href="nongzi/nongzi.php?form=10">瓜果种子</a></li>
							</ul>
							<ul>
								<li><a href="nongzi/nongzi.php?form=11">蔬菜种子</a></li>
							</ul>
						</div>
					</div>
					<!--||||化肥end>-->
					<!--||||农机star>-->
					<div class="content-nongyao content-jixie">
						<p>农机<a href="nongzi/nongzi.php?form=12"  >更多</a></p>
						<div class="content-ul">
							<div class="img"><img src="css/tips_picture/nongji.jpg"></div>
							<ul>
								<li><a href="nongzi/nongzi.php?form=12">运输</a></li>
								<li><a href="nongzi/nongzi.php?form=13">加工</a></li>
							</ul>
							<ul>
								<li><a href="nongzi/nongzi.php?form=14">采收</a></li>
							</ul>
						</div>
					</div>
					<!--||||种植教学-食用菌end>-->
				</div>
			</div>
			<!--种植教学end-->
			
			
			
			
			<!-------------------------------------------------------->
			<!--病害防治star-->
			<div id="b_c">
				<div class="bing">
					<div class="title">
						<a href="bing_chong/bing_chong.php?form=1">更多</a>
					</div >
					<!-- tab标签代码begin -->
					<div class="tab1" id="tab1">
						<div class="menu" id="menu">
							<ul>
								<li id="one1" onclick="setTab('one',1)">瓜果病害</li>
								<li id="one2" onclick="setTab('one',2)">蔬菜病害</li>
								<li id="one3" onclick="setTab('one',3)">果树病害</li>
								<li id="one4" onclick="setTab('one',4)">大田作物病害</li>
							</ul>
						</div>
						<div class="menudiv">
							<div id="con_one_1"><ul><?php bing_chong_li($sql_illness_guaguo,0,6); ?></ul></div>
							<div id="con_one_2" style="display:none;"><ul><?php bing_chong_li($sql_illness_shucai,0,6); ?></ul></div>
							<div id="con_one_3" style="display:none;"><ul><?php bing_chong_li($sql_illness_tree,0,6); ?></ul></div>
							<div id="con_one_4" style="display:none;"><ul><?php bing_chong_li($sql_illness_datian,0,6); ?></ul></div>
						</div>
					</div>
					<!-- tab标签代码end -->
				</div>
				<!--js代码star-->
				<script>
					function setTab(name,cursel){
						cursel_0=cursel;
						for(var i=1; i<=links_len; i++){
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


					function Next(){                                                        
						cursel_0++;
						if (cursel_0>links_len)cursel_0=1;
						setTab(name_0,cursel_0);
					} 
					var name_0='one';
					var cursel_0=1;
					var ScrollTime=2000;//循环周期，可任意更改（毫秒）
					var links_len,iIntervalId;
					
					var name_2='two';
					var cursel_2=1;
					var ScrollTime2=2000;//循环周期，可任意更改（毫秒）
					var links_len2,iIntervalId2;
				</script>
				<!--js代码end-->
				<!--病害防治end-->
				
				<!-------------------------------------------------------->
				<!--虫害防治star-->
				<div class="bing chong">
					<div class="title">
						<a href="bing_chong/bing_chong.php?form=5">更多</a>
					</div>
					<!-- tab标签代码begin -->
					<div class="tab1" id="tab1">
						<div class="menu" id="menu2">
							<ul>
								<li id="two1" onclick="setTab2('two',1)">瓜果虫害</li>
								<li id="two2" onclick="setTab2('two',2)">蔬菜虫害</li>
								<li id="two3" onclick="setTab2('two',3)">果树虫害</li>
								<li id="two4" onclick="setTab2('two',4)">大田作物虫害</li>
							</ul>
						</div>
						<div class="menudiv">
							<div id="con_two_1"><ul><?php bing_chong_li($sql_wrom_guaguo,0,6); ?></ul></div>
							<div id="con_two_2" style="display:none;"><ul><?php bing_chong_li($sql_wrom_shucai,0,6); ?></ul></div>
							<div id="con_two_3" style="display:none;"><ul><?php bing_chong_li($sql_wrom_tree,0,6); ?></ul></div>
							<div id="con_two_4" style="display:none;"><ul><?php bing_chong_li($sql_wrom_datian,0,6); ?></ul></div>
						</div>
					</div>
					<!-- tab标签代码end -->
				</div>
				<!--js代码star-->
				<script>
					function setTab2(name,cursel){
						cursel_2=cursel;
						for(var i=1; i<=links_len2; i++){
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


					function Next2(){                                                        
						cursel_2++;
						if (cursel_2>links_len2)cursel_2=1;
						setTab(name_2,cursel_2);
					} 
					onload=function(){
						//----------------------------------------------------------
						var links = document.getElementById("menu").getElementsByTagName('li')
						links_len=links.length;
						for(var i=0; i<links_len; i++){
							links[i].onmouseover=function(){
								clearInterval(iIntervalId);}
								links[i].onmouseout=function(){
									iIntervalId = setInterval(Next,ScrollTime);

							}
						}
						document.getElementById("con_"+name_0+"_"+links_len).parentNode.onmouseover=function(){
							clearInterval(iIntervalId);
							this.onmouseout=function(){
								iIntervalId = setInterval(Next,ScrollTime);;
							}
						}
						setTab(name_0,cursel_0);
						iIntervalId = setInterval(Next,ScrollTime);
						//----------------------------------------------------------
						
						var links2 = document.getElementById("menu2").getElementsByTagName('li')
						links_len2=links2.length;
						for(var j=0; j<links_len2; j++){
							links2[j].onmouseover=function(){
								clearInterval(iIntervalId2);}
								links2[j].onmouseout=function(){
									iIntervalId2 = setInterval(Next2,ScrollTime2);

							}
						}
						document.getElementById("con_"+name_2+"_"+links_len2).parentNode.onmouseover=function(){
							clearInterval(iIntervalId2);
							this.onmouseout=function(){
								iIntervalId2 = setInterval(Next2,ScrollTime2);
							}
						}
						setTab2(name_2,cursel_2);
						iIntervalId2 = setInterval(Next2,ScrollTime2);
					}
				</script>
				<!--js代码end-->
			</div>
			<!--虫害防治end-->
			<div style="clear: both"></div>
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
				<a href="denglu.php">管理员登录</a>
			</div>
		</div>
	</div>
</body>
</html>
