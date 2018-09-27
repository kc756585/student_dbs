<?php 
include("conn.php");
$kid = empty( $_GET["kid"] )?"null":$_GET["kid"];

$sql2 = "select * from vote";
$result2 = mysqli_query($conn, $sql2);
if ($kid == "null") {
	die("请选择要修改的记录");
}else{
	include("conn.php");
	$sql = "select * from vote where id='{$kid}'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result)>0) {
		$row = mysqli_fetch_assoc($result);
	}else{
		echo "没有数据";
	}
	// 关闭数据库
	mysqli_close($conn);
}
?>
<?php include("head.php"); ?>
<div class="sui-layout">
	<div class="sidebar">
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">添加候选人</p>
		<img src="<?php echo $row['pic']; ?>" alt="" style="width: 150px;height: 150px; float: right; margin-right: 300px;">
		<form class="sui-form form-horizontal sui-validate" action="vote-save.php" method="post" enctype="multipart/form-data">
			<div class="control-group">
				<label for="huodong" class="control-label">活动名称：</label>
				<div class="controls">
					<input type="text" id="huodong"  name="huodong" class="input-large input-fat" placeholder="最佳影帝金马奖" readonly="readonly" >
				</div>
			</div>
			<div class="control-group">
				<label for="name" class="control-label">姓名：</label>
				<div class="controls">
					<!-- 增加一个隐藏的input，用来区分是新增数据还是修改数据 -->
					<input type="hidden" name="action" value="update">
					<!-- 增加一个隐藏的input，保存课程编号 -->
					<input type="hidden" name="kid" value="<?php echo $row['id'] ?>">
					<input type="text" id="name"  name="name" class="input-large input-fat" placeholder="输入姓名" value="<?php echo $row['name'] ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">照片：</label>
				<div class="controls">
					<input type="hidden" name="file1" value="<?php echo $row['pic']; ?>">
					<input type="file" name="file"/>
				</div>
			</div>
			<div class="control-group">
				<label for="position" class="control-label">职务：</label>
				<div class="controls">
					<input type="text" id="position" name="position" class="input-large input-fat" placeholder="输入职位" value="<?php echo $row['position'] ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="summary" class="control-label">个人简历：</label>
				<div class="controls">
					<textarea id="summary" name="summary" style="width:500px;height:150px;" placeholder="简历"><?php echo $row['summary'] ?></textarea>
				</div>
			</div>
			<div class="control-group">
				<label for="caseshow" class="control-label">案例简介：</label>
				<div class="controls">
					<textarea id="caseshow" name="caseshow" style="width:500px;height:150px;" placeholder="案例简介"><?php echo $row['caseshow'] ?></textarea>
				</div>
			</div>
			<div class="control-group">
				<label for="url" class="control-label v-top">案例链接：</label>
				<div class="controls">
					<input type="text" id="url" name="url" class="input-large input-fat" value="<?php echo $row['url'] ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="votenum" class="control-label">票数：</label>
				<div class="controls">
					<input type="text" id="votenum" name="votenum" class="input-large input-fat" value="<?php echo $row['votenum'] ?>">
				</div>
			</div>
			<div class="control-group">
				<label for="status" class="control-label">有效状态：</label>
				<div class="controls">
					<select name="status" id="status">
						<option value="<?php echo $row['status'] ?>">正常</option>
						<option value="<?php echo $row['status'] ?>">禁止</option>
					</select>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"></label>
				<div class="controls">
					<input type="submit" name="" value="提交" class="sui-btn btn-large btn-primary">
				</div>
			</div>
		</form>
	</div>
</div>
<?php include("foot.php"); ?>