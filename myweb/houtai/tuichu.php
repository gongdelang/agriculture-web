
<?php
	include("php/open.php");
	session_start();
	@$zhanghao=$_COOKIE["zhanghao"];
	if($zhanghao == "") {
		echo
		"<script language='javascript'>
		alert('请先登录!');
		</script>";
		echo
		"<script language='javascript'>
		location.href = ('denglu.php');
		</script>";
	}

@$name=$_COOKIE["zhanghao"];
if($name) {
	setcookie("zhanghao",NULL);
	//setcookie("zhanghao",NULL);
}
echo"<script language='javascript'>
location.href=('../denglu.php');
</script>;"
?>
