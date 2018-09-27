<!-- 头部开始 -->
<?php include("head.php"); ?>
<?php
include("conn.php");
$StudentchaName =empty($_POST['StudentchaName'])? "null":$_POST['StudentchaName'];
  if ($StudentchaName=="null") {
    $sql4="select id,学号,班号,姓名,性别,出生日期,电话 from student";
  }else{
    $kcName=$_POST["kcName"];
    $kcHao=$_POST["kcHao"];
     $sql4="select id,学号,班号,姓名,性别,出生日期,电话 from student where 学号='{$kcHao}'and 姓名 ='{$kcName}'";
  }
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
                                     <th>id</th>
                                     <th>学号</th>
                                     <th>班号</th>
                                     <th>姓名</th>
                                     <th>性别</th>
                                     <th>出生日期</th>
                                     <th>电话</th>
                                   </tr>
                                  <?php
                                  if(mysqli_num_rows($result)> 0 ){
                                     // 将查询的结果转换为下列数组
                                    while($row=mysqli_fetch_assoc($result)){
                                      $rows=$row["性别"]=="1"?"男":"女";
                                    echo "<tr>
                                      <td>{$row['id']}</td>
                                      <td>{$row['学号']}</td>
                                      <td>{$row['班号']}</td>
                                        <td>{$row['姓名']}</td>
                                        <td>{$rows}</td>
                                        <td>{$row['出生日期']}</td>
                                        <td>{$row['电话']}</td>
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