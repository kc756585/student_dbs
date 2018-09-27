<?php include("head.php"); ?>
		<div class="sui-layout">
		            <div class="sidebar">
		                          <!-- 左菜单 -->
		            	<?php include("leftmenu.php"); ?>
		            </div>
		            <div class="content">
                                                <p class="sui-text-xxlarge my-padd label-success">欢迎访问网络投票系统！</p>
                                                <div id="new-con"></div>
				
			</div>
		</div>
<?php include("foot.php"); ?>
<script type="">
	$.ajax({
	      url:"abi.php",
	      type:"POST",
	      data:{
	        "action":"vote"
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
				"action":"vote",
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
			var $dat = $("<a href='index.html?"+datalist[i].id+"'><div class='news news1'><div class='img'><a href='index.html?cha="+datalist[i].id+"'><img src='"+datalist[i].pic+"'></a></div><h4>"+datalist[i]. position+"</h4><h5><a href='#'>"+datalist[i].votenum+"</a></h5><p>"+datalist[i].caseshow+"</p></div></a>");
		   	$("#new-con").append($dat);
		  }	
	}

</script>