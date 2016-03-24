
<h1>您好</h1>
<textarea id="content"></textarea>
<input type="button" class="click" value="留言"/>

<div class="list">

<?php foreach($arr as $value): ?>
        	<li><?php echo e($value['content']); ?>----<?php echo e($value['time']); ?>------<a href="#" class="del" value="<?php echo e($value['id']); ?>">删除</a> || <a href="#" class="update" value="<?php echo e($value['id']); ?>">修改</a></li>
   <?php endforeach; ?>


</div>

<?php echo $arr->render(); ?>









<script type="text/javascript" src="jquery1-8-0.js"></script>
<script type="text/javascript">
	$(function(){
		//alert('111')
		$(".click").click(function(){
			var content=$("#content").val();
			//alert(content)
			$.get("liuyan_add",{content:content},function(date){
				//alert(date);
				$(".list").html(date);
			})

		})

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
