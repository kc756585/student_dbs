<?php
        $kcName = $_POST["kcName"];
        $kcTime = $_POST["kcTime"];
     include("conn.php");

	// 执行SQL语句
	$sql = "insert into kecheng(课程名,时间) value('$kcName','$kcTime')";
	$sql2 = "update kecheng set 课程名='JS面向对象' where 课程编号=2";
	$result = mysqli_query($conn, $sql);

	// 输出数据
	// var_dump($result);

	if ($result) {
		echo "<script>alert('数据更新成功');</script>" ;
		header("Refresh:1;url=kechengluru.php");
	}else{
		echo "数据更新失败".mysqli_error($conn);
	}

	// 关闭数据库
	mysqli_close($conn);

?>