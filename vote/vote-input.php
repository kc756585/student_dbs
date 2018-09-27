<?php include("head.php");
include "conn.php";
$sql = "select * from vote";
$result = mysqli_query($conn, $sql);

 ?>

<div class="sui-layout">
	<div class="sidebar">
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">添加候选人</p>
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
					<input type="text" id="name"  name="name" class="input-large input-fat" placeholder="输入姓名">
				</div>
			</div>
			<div class="control-group">
				<label for="xingming" class="control-label">照片：</label>
				<div class="controls">
					<input type="file" name="file"/>
				</div>
			</div>
			<div class="control-group">
				<label for="position" class="control-label">职位：</label>
				<div class="controls">
					<input type="text" id="position" name="position" class="input-large input-fat" placeholder="输入职位">
				</div>
			</div>
			<div class="control-group">
				<label for="summary" class="control-label">个人简历：</label>
				<div class="controls">
					<textarea id="summary" name="summary" style="width:500px;height:150px;" placeholder="简历"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label for="caseshow" class="control-label">案例简介：</label>
				<div class="controls">
					<textarea id="caseshow" name="caseshow" style="width:500px;height:150px;" placeholder="案例简介"></textarea>
				</div>
			</div>
			<div class="control-group">
				<label for="url" class="control-label v-top">案例链接：</label>
				<div class="controls">
					<input type="text" id="url" name="url" class="input-large input-fat">
				</div>
			</div>
			<div class="control-group">
				<label for="votenum" class="control-label">票数：</label>
				<div class="controls">
					<input type="text" id="votenum" name="votenum" class="input-large input-fat">
				</div>
			</div>
			<div class="control-group">
				<label for="status" class="control-label">有效状态：</label>
				<div class="controls">
					<select name="status" id="status">
						<option value="0">正常</option>
						<option value="1">禁止</option>
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