<?php 
             session_start();
	include("conn.php");
		// 邮箱
		$mali = empty($_POST['mali']) ? "null":strtolower($_POST['mali']);
	    // 密码
	    $password = empty($_POST['password']) ? "null":$_POST['password'];

	    $sql="select email,name,password,question,answer from user where email = '{$mali}' and password='{$password}'";
		$rcc = mysqli_query($conn,$sql);
		if (mysqli_num_rows($rcc) >=1) {
			//创建一个session，键为usname，值为$mail
			$_SESSION['usname']=$mali;
			echo "<script>document.cookie='usname={$mali}';</script>";
			header("Refresh:100;url=index.php");
		}else{
			echo "<p class='pp'>登录失败</p>".mysqli_error($conn);
			header("Refresh:100;url=login.php");
		}
	mysqli_close($conn);
	include ("04_p.style.php");
 ?>
