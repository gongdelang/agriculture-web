<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>农资信息iframe</title>
<link rel="stylesheet" href="../css/chuShiHua.css" type="text/css" /><!--初始化css样式-->
<link rel="stylesheet" href="../css/nongzi/nongzi_iframe.css" type="text/css" /><!--本网页的css样式-->
<?php include("../php/functions_nongzi.php") ?><!--资讯-函数库-->
<!--js样式star-->
<script type="text/javascript" src="../js/jquery.min.js"></script>
<!--js样式end-->
</head>

<body>
	<div id="content">
		<?php titile($form); ?>
		<?php ul($form,$page); ?>
			<script>
			$(function(){
				$("#shanchu").click(function(){
					var msg = "您真的确定要删除吗？\n\n请确认！";
					if (confirm(msg)==true){
						return true;
					}
					else{
						return false;
					}
				});
			});
		</script>
	</div>
</body>
</html>