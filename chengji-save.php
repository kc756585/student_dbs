<?php 
	$xuehao = $_POST["xuehao"];
	$bianhao =  $_POST["bianhao"];
	$chengji = $_POST["chengji"];
	
	
	// 如果是录入页面的话，那么$active等于“add”
	$action = empty($_POST["action"])?"add":$_POST["action"];
	if($action=='add'){
		$str="数据添加成功!";
		$str2="数据添加失败!";
		$url = "chengjiluru.php";
		$sql1="insert into xuanxiu(学号,课程编号,成绩) value ('$xuehao','$bianhao','$chengji')";
	}else if($action=="update"){
		$str="数据更新成功";
		$str2="数据更新失败!";
		$url= "chengji-list.php";	
		$kid= $_POST["kid"];
		$sql1="update xuanxiu set 学号='{$xuehao}',课程编号='{$bianhao}',成绩='{$chengji}' where id={$kid}";
	}else{
		die("请选择操作方法");
	}

include("conn.php");
 $result = mysqli_query($conn,$sql1);
 // 输出数据
 if ($result){
 	echo "<script> alert('{$str}');<script>";
 	header("refresh:1;url={$url}");
 }else{
 	echo "数据更新失败".mysqli_error($conn);
 }
 //关闭数据库
 mysqli_close($conn);
 ?>