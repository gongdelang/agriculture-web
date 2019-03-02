<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>种植教学</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/teach/teach.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/functions_teach.php") ?><!--首页-函数库-->
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
					<li><a href="teach.php" class="width4 active">种植教学</a></li>
					<li><a href="../nongzi/nongzi.php?form=1" class="width4">农资信息</a></li>
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
		<!--||导航栏-（首页）end>-->
		<!--去掉4个像素-->
    	<div style="width: 1004px; height: 4px; background: #ffffff;margin:0px auto;"></div>
	    <!--||导航栏-（首页）end>-->
		
		
		
		
		
		<!---------------------总内容star--------------------------------->
		<div id="all-content">
		
			<!--标题导航star-->
				<div id="lanren">
					<ul class="nav1">
						<li class="li1 active">
							瓜果
							<ul class="nav20">
								<?php title_nav($sql_teach_guaguo); ?>
							</ul>
						</li>
						<li class="li1">蔬菜
							<ul class="nav20">
								<?php title_nav($sql_teach_shucai); ?>
							</ul>
						</li>
							
						<li class="li1">果树
							<ul class="nav20">
								<?php title_nav($sql_teach_tree); ?>
							</ul>
						</li>
							
						<li class="li1">食用菌
							<ul class="nav21">
								<?php title_nav($sql_teach_funguns); ?>
							</ul>
						</li>
						<li class="li1">粮食作物
							<ul class="nav21">
								<?php title_nav($sql_teach_foodcrop); ?>
							</ul>
						</li>
						<li class="li1">经济作物
						<ul class="nav21">
								<?php title_nav($sql_teach_cashcrop); ?>
							</ul>
						</li>
					</ul>
					<input type="hidden" id="input_form" value="<?php echo $form; ?>">
					<!--js代码部分star-->
					<script language="javascript">
						function setTab(){
						var li=document.getElementById("lanren").getElementsByTagName("li");
						var form_name=document.getElementById("input_form");
						var form=0;
						switch(form_name.value){
							case "teach-guaguo":form=0;break;
							case "teach-shucai":form=1;break;
							case "teach-tree":form=2;break;
							case "teach-funguns":form=3;break;
							case "teach-foodcrop":form=4;break;
							case "teach-cashcrop":form=5;break;
						default:form=0;break;
						}
						for(var i=0;i<=5;i++){
							if(i==form){
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
			<!------------------------------------------------------------------------->
			<!--正文内容star-->
			<div id='content'>
				<div id="hui_top"></div>
				<ul class="fl_l">
					<div style="border-right:1px solid #b9b9b9;">
						<div class="qwer">
						<?php fl_l($form,$id); ?>
						</div>
					</div>
				</ul>
				
				<div id="right-content">
					<?php right_content($form,$id); ?>
				</div>
				<div style="clear: both;"></div>
			</div>
			<script type="text/javascript" src="../js/jquery.min.js"></script>
			<script type="text/javascript">
				//li_nav的点击效果
				function dianji_li(io){
					var which='.fl_l .li_many'+io+' li';
					$(which).click(function(){
						var many=0;
						for(var io_1=0;io_1<io;++io_1){
							many+=$('.fl_l .li_many'+io_1+' li').length;
						}
						var _i=$(this).index()+many;
						$('body, html').animate({scrollTop:$('.fl_r li').eq(_i).offset().top},500);
						});
				}
				//p2的点击效果
				function dianji_p2(io){
					var which='.fl_l #p_many'+io;
					$(which).click(function(){
						var many=0;
						for(var io_1=0;io_1<io;++io_1){
							many+=$('.fl_l .li_many'+io_1+' li').length;
						}
						var _i=many;
						$('body, html').animate({scrollTop:$('.fl_r li').eq(_i).offset().top},500);
					});
				}
				
				
				$(function(){
					//设置标杆
					var _line=parseInt($(window).height());
					var _line_width=parseInt($(window).width());
					var _left=((_line_width-1004)/2)+1004-60;
					$('.fl_l li').eq(0).addClass('active');
					var little_nav=$('.fl_l ul').length;
					$(window).scroll(function(){
						var zuihou=parseInt($(document.body).height()-$(window).scrollTop()-_line);
						//滚动400px，左侧导航固定定位
						var zuihou_1=parseInt($('#content').height()-_line);
						if ($(window).scrollTop()>329&&zuihou>=233) {
							$('.fl_l').css({'position':'fixed','top':0});
							$('.fl_l').css({'height':_line});
							$('#hui_top').css({'position':'fixed','top':482,'left':_left});
							/*alert(zuihou);*/
						}
						else if($(window).scrollTop()<=376)
							{
								$('.fl_l').css({'position':'','top':''});
								$('.fl_l').css({'height':''});
								$('#hui_top').css({'position':'absolute','top':600,'left':944});
							}
						 else if(zuihou<=233){
							/*$('.fl_l').css({'position':'','top':''});*/
							$('.fl_l').css({'position':'absolute','top':zuihou_1});
							$('#hui_top').css({'position':'absolute','top':zuihou_1+500,'left':944});
							/*$('#hui_top').css({'position':'absolute','top':(zuihou_1+200),'left':_left});*/
							 /*alert(zuihou_1);
							 alert(zuihou_1+_line);*/
						}
						//滚动到标杆位置,左侧导航加active
						$('.fl_r li').each(function(){
							var _target=parseInt($(window).scrollTop());
							var _i=$(this).index();
							var height_all=parseInt($('.fl_r li').eq(_i).height()/2);
							var star=parseInt($(this).offset().top);
							var end=star+height_all;
							if (star<=_target&&_target<=end) {
								$('.fl_l li').removeClass('active');
								$('.fl_l li').eq(_i).addClass('active');
								/*alert(nav_li);*/
								var kaishi_down=parseInt($('.fl_l li').eq(_i).position().top+$('.fl_l li').eq(_i).height());
								var kaishi_up=parseInt($('.fl_l li').eq(_i).position().top);
								var panduan_down=kaishi_down-$('.fl_l').scrollTop();
								var panduan_up=kaishi_up-$('.fl_l').scrollTop();
								if(panduan_down>=_line){
									var down=panduan_down-_line;
									var star1=$('.fl_l').scrollTop()+down;
									$('.fl_l').animate({scrollTop:star1},10);
								}
								else if(panduan_up<=0){

									var up=Math.abs(panduan_up);

									var star1=$('.fl_l').scrollTop()-up;
									$('.fl_l').animate({scrollTop:star1},10);
								}

							}
							//如果到达页面底部，给左侧导航最后一个加active
							else if($(document).height()==$(window).scrollTop()+$(window).height()){
								$('.fl_l li').removeClass('active');
								$('.fl_l li').eq($('.fl_r li').length-1).addClass('active');
							}
						});
					});
					
					//添加点击
					for(var io=0;io<little_nav;++io){
						dianji_li(io);
						dianji_p2(io);
					}
					$('#hui_top').click(function(){
						$('body, html').animate({scrollTop:329},10);
					});
				});
			</script>
			<div style="clear: both;"></div>
			
			<!--正文内容end-->
			
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
