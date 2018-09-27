<?php include("head.php"); 
include "conn.php";
$sql = "SELECT DISTINCT 班号 FROM banji2";
$result = mysqli_query($conn, $sql);
?>
		<div class="sui-layout">
		            <div class="sidebar">
		                         <!-- 左菜单 -->
		            	<?php include("leftmenu.php"); ?>
		            </div>
		            <div class="content">
                                                <p class="sui-text-xxlarge myBlue my-padd">学生信息查询</p>
                                                <form id="form1" action="xueshengchaxun-list.php" method="post" class="sui-form form-horizontal sui-validate">
                                                	<div class="control-group">
					            <label for="kcName" class="control-label">姓名：</label>
					            <div class="controls">
					            <input type="hidden" name="StudentchaName" value="SchaName">
					                       <input type="text" id="kcName"  name="kcName" class="input-large input-fat" placeholder="输入姓名" data-rules="required|minlength=2|maxlength=10">
					            </div>
					</div>
					<div class="control-group">
					            <label for="kcHao" class="control-label">学号：</label>
					            <div class="controls">
					                       <input type="text" id="kcHao" name="kcHao" class="input-large input-fat"  placeholder="输入学号">
					            </div>
					</div>
					<div class="control-group">
					            <label class="control-label"></label>
					            <div class="controls">
					            	<input type="submit" name="" value="查询" class="sui-btn btn-large btn-primary">
					            </div>
					</div>
                                                </form>
		            </div>
		</div>
<?php include("foot.php"); ?>