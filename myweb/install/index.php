<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新疆农业技术学习平台安装</title>
<link rel="stylesheet" href="index_install.css" type="text/css" /><!--本网页的css样式-->
<!--js样式star-->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<!--js样式end-->
</head>

<body>
		<div>
			<h1 style="text-align: center;margin:50px auto; ">欢迎来到新疆农业技术平台安装</h1>
			<p style="text-align: center;font-size: 18px;color:#FF0000">以下默认信息是默认信息，
			若本机与本机信息不匹配，请填写正确的信息，并且完成安装后，还需在站点下的config.php文件中修改相应的配置</p>
			<div style="margin:20px auto;font-size: 16px;border:1px solid red">
				<p style="text-align:center;margin-top:10px;">
					服务器主机名默认为'localhost'
				</p>
				<p style="text-align:center;margin-top:10px;">
					数据库用户名默认为'root'
				</p>
				<p style="text-align:center;margin-top:10px;">
					mysql数据库密码默认为' ',即为空
				</p>
			</div>
		</div>
	<div class="main">
		<form method="get" name="install" action="install.php">
			<div class="input1"><span>主机名</span><input type="text" name="host" value="localhost" /></div>
			<div class="input1"><span>用户名</span><input type="text" name="user" value="root" /></div>
			<div class="input1 input3"><span>密&nbsp;&nbsp;码</span><input type="password" name="password" value="" /></div>
			<div id="tijiao" class="input1 input2"><input type="submit" name="submit" value="开始安装，插入数据"></div>
			<p id="wait" style='text-align:center;font-size:16px;color:green;'>安装过程许久，请稍等一会儿</p>
		</form>
	</div>
</body>
</html>