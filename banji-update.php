<?php include("head.php"); ?>
<?php 
$kid = empty( $_GET["kid"] )?"null":$_GET["kid"];
if ($kid == "null") {
	die("请选择要修改的记录");
}else{
include("conn.php");

// 执行SQL语句
$sql = "select 班号,班长,教室,班主任,班级口号 from banji2 where 班号='{$kid}'";
echo $sql;
$result = mysqli_query($conn, $sql);
//输出数据
if (mysqli_num_rows($result)>0) {
	//将查询的结果换成数组
            $row=mysqli_fetch_assoc($result);
}else{
	echo "找不到这条记录";
}
// 关闭数据库
mysqli_close($conn);
}
?>
		<div class="sui-layout">
		            <div class="sidebar">
		                         <!-- 左菜单 -->
		            	<?php include("leftmenu.php"); ?>
		            </div>
		            <div class="content">
                                                <p class="sui-text-xxlarge myBlue my-padd">课程修改页面</p>
                                                <form id="form1" action="banji-save.php" method="post" class="sui-form form-horizontal sui-validate">
                                                	<div class="control-group">
					            <label for="inputEmail" class="control-label">班号：</label>
					            <div class="controls">
					                        <!-- 增加一个隐藏的input，用来区分是新增数据还是修改数据 -->
					                       <input type="hidden" name="action" value="update">
					                      <!-- 增加一个隐藏的input，保存课程编号 -->
					                       <input type="hidden" name="kid" value="<?php echo $row['班号'] ?>">
					                       <input type="text" id="banhao"  value="<?php echo $row['班号'] ?>" name="banhao" class="input-large input-fat" placeholder="输入班号" data-rules="required|minlength=2|maxlength=10">
					            </div>
					</div>
					<div class="control-group">
					            <label for="inputEmail" class="control-label">班长：</label>
					            <div class="controls">
					                       <input type="text" id="banzhang" value="<?php echo $row['班长'] ?>" name="banzhang" class="input-large input-fat"   placeholder="输入班长" data-rules="required|minlength=2|maxlength=10">
					            </div>
					</div>
					<div class="control-group">
					            <label for="inputEmail" class="control-label">教室：</label>
					            <div class="controls">
					                       <input type="text" id="jiaoshi" value="<?php echo $row['教室'] ?>" name="jiaoshi" class="input-large input-fat"   placeholder="输入教室" data-rules="required|minlength=2|maxlength=10">
					            </div>
					</div>
					<div class="control-group">
					            <label for="inputEmail" class="control-label">班主任：</label>
					            <div class="controls">
					                       <input type="text" id="banzhuren" value="<?php echo $row['班主任'] ?>" name="banzhuren" class="input-large input-fat"   placeholder="输入班主任" data-rules="required|minlength=2|maxlength=10">
					            </div>
					</div>
					<div class="control-group">
					            <label for="inputEmail" class="control-label">班级口号：</label>
					            <div class="controls">
					                       <input type="text" id="kouhao" value="<?php echo $row['班级口号'] ?>" name="kouhao" class="input-large input-fat"   placeholder="输入班级口号" data-rules="required|minlength=2|maxlength=10">
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