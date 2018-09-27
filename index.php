<?php include("head.php"); ?>
		<div class="sui-layout">
		            <div class="sidebar">
		                          <!-- 左菜单 -->
		            	<?php include("leftmenu.php"); ?>
		            </div>
		            <div class="content">
                                                <p class="sui-text-xxlarge my-padd label-success">欢迎访问学生管理系统！</p>
                                                <div id="new-con">
				
			</div>
			<div class="test sui-pagination pagination-large">
					  <ul>
						    <li class="prev disabled"><a href=" ">«上一页</a></li>
						    <li class="active"><a href="#">1</a></li>
						    <li><a href="#">2</a></li>
						    <li><a href="#">3</a></li>
						    <li><a href="#">4</a></li>
						    <li><a href="#">5</a></li>
						    <li class="dotted"><span>...</span></li>
						    <li class="next"><a href="#">下一页»</a></li>
					  </ul>
	  				  <div><span>共10页&nbsp;</span><span>到
	      			  <input type="text" class="page-num"><button class="page-confirm" onclick="alert(1)">确定</button>
	      				页</span></div>
				</div>
		</div>
<?php include("foot.php"); ?>
<script type="">
	$.ajax({
	      url:"abi.php",
	      type:"POST",
	      data:{
	        "action":"news"
	      },
	      dataType:"json",
	      beforeSend:function(XMLHttpRequest){
	        // $("#studentlist").html("正在查询请稍后.......");
	      },
	      success:function(data,textStatus){
		       if (data.code==200) {
		       		$('.test').pagination({
				    pageSize:4,//每页显示条数
				    itemsCount:data.count,//获取记录总条数
				    styleClass: ['pagination-large'],
				    displayPage:6,
				    showCtrl: true,
				    onSelect: function (num) {
				    	console.log( num );
				        getPage(num);
				    }        
					});
					//渲染第一页数据
					renderList(data.data);
		       }
      	   }, 
	      error:function(XMLHttpRequest,textstatus,errorThrown){
	        console.log("失败原因".errorThrown);
	      }
    });

    function getPage(pageNum){
		$.ajax({
			url:"abi.php",
			type:"POST",
			dataType:"json",
			data:{
				"action":"news",
				"pageNum":pageNum,
				"pageSize":4
			},
			success:function(data,textStatus){
				console.log( data );
				if( data.code == 200 ){
					renderList(data.data);
				}
			}	
		})
	}

    function renderList(datalist){
    	$("#new-con").empty();
		for (var i = 0; i < datalist.length; i++) {
			var $dat = $("<a href='beiwang.php?"+datalist[i].id+"'><div class='news news1'><div class='img'><a href='beiwang.php?cha="+datalist[i].id+"'><img src='"+datalist[i].图片+"'></a></div><h4>"+datalist[i]. 发布时间+" | "+datalist[i].columnid+"</h4><h5><a href='#'>"+datalist[i].标题+"</a></h5><p>"+datalist[i].肩题+"</p></div></a>");
		   	$("#new-con").append($dat);
		  }	
	}

</script>