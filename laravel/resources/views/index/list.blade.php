<?php
	foreach ($arr as $key => $value) {
?>
		<li><?php echo $value['content']?>----<?php echo $value['time']?>------<a href="#" class="del" value="<?php echo $value['id']?>">删除</a> || <a href="#" class="update" value="<?php echo $value['id']?>">修改</a></li>
<?php		
	}
?>

<script type="text/javascript">
	$(function(){
		$(".del").click(function(){
			var id=$(this).attr('value');
			//alert(id);
			$.get("liuyan_del",{id:id},function(date){
				//alert(date);
				$(".list").html(date);
			})
		})
		$(".update").click(function(){
			var id=$(this).attr('value');
			//alert(id);
			location.href="./liuyan_update?id="+id;
		})

	})

</script>