<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新疆农业技术学习平台安装</title>
</head>
<body>
	<div>
		<h1 style='text-align: center;'>欢迎来到新疆农业技术平台安装</h1>
		<p style='text-align: center;font-size: 18px;color:#FF0000'>以下默认信息是默认信息，
		若本机与本机信息不匹配，请填写正确的信息，并且完成安装后，还需在站点下的config.php文件中修改相应的配置</p>
		<div style='margin:20px auto;font-size: 16px;border:1px solid red'>
			<p style='text-align:center;margin-top:10px;'>
				服务器主机名默认为'localhost'
			</p>
			<p style='text-align:center;margin-top:10px;'>
				数据库用户名默认为'root'
			</p>
			<p style='text-align:center;margin-top:10px;'>
				mysql数据库密码默认为' ',即为空
			</p>
		</div>
	</div>
	<?php 
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_WARNING);
		require(dirname(__FILE__)."/.././config.php");
		//读取文件内容
		$_sql= file_get_contents('myweb_data.sql');
		$_arr= explode(';', $_sql);
		$many=count($_arr);
		//连接数据库
		$conn=mysql_connect($_GET["host"],$_GET["user"],$_GET["password"]) or die("
			<div>
				<h1 style='text-align: center;'>连接数据库失败</h1>
				<p style='text-align: center;font-size: 18px;color:#FF0000'>请<a href='index_install.html'
				style='color:#6dc17e;'>返回上一层</a>输入正确的服务器主机名，数据库用户名，数据库密码</p>
				<div style='margin:20px auto;font-size: 16px;border:1px solid red'>
					<p style='text-align:center;margin-top:10px;'>
						服务器主机名默认为'localhost'
					</p>
					<p style='text-align:center;margin-top:10px;'>
						数据库用户名默认为'root'
					</p>
					<p style='text-align:center;margin-top:10px;'>
						mysql数据库密码默认为'',即为空
					</p>
					<p style='text-align:center;margin-top:10px;'>
						选择打开的mysql数据库默认为'myweb_data'（该项为在安装界面倒入数据库的名字）
					</p>
				</div>
			</div>");
		mysql_query("set names 'utf8'"); 
	if($conn){
		$open_db=mysql_select_db($mysql_database); //打开数据库
		if($open_db){
			echo "<p style='text-align:center;font-size:16px;color:red'>您已存在同名数据库".$mysql_database."，请修改站点下config.php文件中:改变数据库名字一项(改变名字即可)</p>
			<p style='text-align:center;margin-top:10px;'>
			先修改站点下的config.php文件中的mysql数据库名字（默认为'myweb_data'），再重新用浏览器打开install目录下的index_install.html，重新进行安装
			</p><a style='margin:auto auto;display:block;font-size:16px;width:80px;' href='index_install.php'>返回上一页</a>";
		}
		else{
			mysql_query("CREATE DATABASE ".$mysql_database." DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci",$conn);
			$open_db=mysql_select_db($mysql_database);
			echo "<p style='text-align:center;font-size:16px;color:green'>请稍等一会儿</p>";
			for($i=0;$i<$many;++$i){
				mysql_query($_arr[$i].";");
			 }
			echo "<p style='text-align:center;font-size:16px;color:green'>数据库安装成功</p>";
			echo "<p style='text-align:center;font-size:16px;color:green'><a href='../index.php'>进入首页</a></p>";
		}
		mysql_close($conn) or die("<h1 style='text-align:center;'>关闭数据库失败</h1>");
	}
	?>
</body>
</html>