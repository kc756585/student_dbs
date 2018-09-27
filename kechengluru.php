<?php include("head.php"); ?>
		<div class="sui-layout">
		            <div class="sidebar">
		                         <!-- 左菜单 -->
		            	<?php include("leftmenu.php"); ?>
		            </div>
		            <div class="content">
                                                <p class="sui-text-xxlarge myBlue my-padd">课程录入信息页面</p>
                                                <form id="form1" action="kechen-save.php" method="post" class="sui-form form-horizontal sui-validate">
                                                	<div class="control-group">
					            <label for="kcName" class="control-label">课程名：</label>
					            <div class="controls">
					                       <input type="text" id="kcName"  name="kcName" class="input-large input-fat" placeholder="输入课程名称" data-rules="required|minlength=2|maxlength=10">
					            </div>
					</div>
					<div class="control-group">
					            <label for="kcTime" class="control-label">课程时间：</label>
					            <div class="controls">
					                       <input type="text" id="kcTime" name="kcTime" class="input-large input-fat"  data-toggle="datepicker-inline" placeholder="输入课程时间">
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