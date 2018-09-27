<?php include("head.php"); ?>
<?php 
include("conn.php");
$sql = "select id,学号,班号,姓名,性别,出生日期,电话 from student";
$result = mysqli_query($conn, $sql);

 ?>

<div class="sui-layout">
	<div class="sidebar">
		<!-- 左菜单 -->
		<?php include("leftmenu.php"); ?>
	</div>
	<div class="content">
		<p class="sui-text-xxlarge myBlue my-padd">学生列表</p>
		<table class="sui-table table-primary">
		<thead>
			<tr>
				<th>id</th>
				<th>学号</th>
				<th>班号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>日期</th>
				<th>联系电话</th>
				<th>操作</th>
			</tr>
		</thead>
			<tbody id="studentlist"></tbody>
			<?php 
			/*// 输出数据
			if (mysqli_num_rows($result)>0) {
				while($row=mysqli_fetch_assoc($result)){
					$sex1=$row["性别"]=="0"?"女":"男";
					echo "<tr>
						<td>{$row['id']}</td>
						<td>{$row['学号']}</td>
						<td>{$row['班号']}</td>
						<td>{$row['姓名']}</td>
						<td>{$sex1}</td>
						<td>{$row['日期']}</td>
						<td>{$row['联系电话']}</td>
						<td>
						<a class='sui-btn btn-warning btn-small' href='student-update.php?kid={$row['id']}'>修改</a> &nbsp;&nbsp; 
						<a class='sui-btn btn-danger btn-small' href='student-del.php?kid={$row['id']}'>删除</a>
						</td>
					</tr>";
				}
			}else{
				echo "没有记录";
			}*/

			?>
		</table>

	</div>
</div>
<?php include("foot.php"); ?>
<script type="text/html" id="template1">
	{{each arr val idx}}
	   <tr>
	            <td>{{val.id}}</td>
	            <td>{{val.学号}}</td>
	            <td>{{val.班号}}</td>
	            <td>{{val.姓名}}</td>
	            <td>{{val.性别}}</td>
	            <td>{{val.出生日期}}</td>
	            <td>{{val.电话}}</td>
                         <td>
                                  <a  class='sui-btn btn-warning' title='' href='student-update.php?kid={$row['id']}' >修改</a> 
                                      &nbsp; <a class='sui-btn btn-danger' title=''
                                       href='student-del.php?kid={$row['id']}'  >删除</a> 
                         </td>
	   </tr>
	{{/each}}
</script>
<script type="text/javascript">
$(function(){
	$.ajax({
		url:"api.php",
		type:"POST",
		dataType:"json",
		data:{
			"action":"student"
		},
		beforeSend:function(XMLHttpRequest){
			$("#studentlist").html("<tr><td>正在查询, 请稍后</td></tr>");
						
		},
		success:function(data,textStatus){
			console.log(data.data);
			var arr=data.data;
			var html = template('template1',{"arr":arr});
			$("tbody").html(html);

		},
		error:function(XMLHttpRequest,textStatus,errorThrown){
			// 请求失败后调用此函数
			console.log("失败原因:"+errorThrown);
		}
	});
})
</script>
