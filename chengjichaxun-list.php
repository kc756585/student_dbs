<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
$kcName=empty($_POST["kcName"])?"null":$_POST["kcName"];
$kcHao=empty($_POST["kcHao"])?"null":$_POST["kcHao"];
$sql4="SELECT s.姓名,k.课程名,c.成绩 FROM xuanxiu as c LEFT JOIN kecheng as k ON c.课程编号=k.课程编号 LEFT JOIN student as s ON c.学号=s.学号 WHERE s.姓名='{$kcName}'";
$result =mysqli_query($conn, $sql4 );
// 关闭数据库班号
// mysqli_close($conn);
?>
<!-- 左部开始 -->
<div class="sui-layout">
  <div class="sidebar sidebar_left">
 	<?php include("leftmenu.php"); ?>
  </div>
 			<div class="content">
				<p class="sui-text-xxlarge sui_ck">学生列表</p>
				   <table class="sui-table table-primary">
                                   <tr>  
                                     <th>姓名</th>
                                     <th>课程名</th>
                                     <th>成绩</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                      // $rows=$row["性别"]=="1"?"男":"女";
                                    echo "<tr>
                                      <td>{$row['姓名']}</td>
                                      <td>{$row['课程名']}</td>
                                      <td>{$row['成绩']}</td>
                                      </tr>";
                                    }
                                  }else{
                                    echo "没有记录";
                                  }
                                ?>
                </table>
</div>
</div>
<!-- 底部 -->
<?php include("foot.php"); ?>