<?php 
include("conn.php");

$name = $_REQUEST["name"];
$summary = $_REQUEST["summary"];
$caseshow = $_REQUEST["caseshow"];
$position= $_REQUEST["position"];
$url = $_REQUEST["url"];
$votenum = $_REQUEST["votenum"];
$status = $_REQUEST["status"];
	
if (empty($_FILES["file"]["tmp_name"])==false) {
	if ((($_FILES["file"]["type"] == "image/gif")
	|| ($_FILES["file"]["type"] == "image/jpeg")
	|| ($_FILES["file"]["type"] == "video/mp4")
	|| ($_FILES["file"]["type"] == "image/pjpeg"))
	&& ($_FILES["file"]["size"] < 10241000))
	{
		if ($_FILES["file"]["error"] > 0){
			echo "错误: " . $_FILES["file"]["error"] . "<br />";
		}else{
			// 重新给上传的文件命名, 增加一个年月日时分秒的前缀, 并且加上保存路径
			$filename = "upload/".date('YmdHis').$_FILES["file"]["name"];

			//move_uploaded_file()移动临时文件到上传的文件存放的位置,参数1.临时文件的路径, 参数2.存放的路径
			move_uploaded_file($_FILES["file"]["tmp_name"],$filename);  
		}
	}else{
		echo "您上传的文件不符合要求";
	}
}else{
	$filename=($_REQUEST['file1']);
}

$action= empty($_POST["action"])?"add":$_POST["action"];
if ($action=="add") {
	$str1 = "数据添加成功!";
	$str2 = "数据添加失败!";
	$url="vote-input.php";
	$sql = "insert into vote(name,summary,caseshow,position,pic,url,votenum,status) value('$name','$summary','$caseshow','$position','$filename','$url','$votenum','$status')";
}else if ($action=="update") {
	$str1 = "数据更新成功!";
	$str2 = "数据更新失败!";
	$url="vote-list.php";
	$kid = $_POST["kid"];
	$sql = "update vote set name='{$name}',summary='{$summary}',caseshow='{$caseshow}',position='{$position}',pic='{$filename}',url='{$url}',votenum='{$votenum}',status='{$status}' where id = '{$kid}'";
}else{
	die("请选择方法");
}

$result = mysqli_query($conn, $sql);
// 输出数据
if ($result) {
	echo "<script>alert('数据添加成功');</script>";
	header("Refresh:2;url=vote-input.php");
}else{
	echo "数据添加失败".mysqli_error($conn);
}

// 关闭数据库
mysqli_close($conn);

?>