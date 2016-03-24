<h1>修改留言</h1>
<textarea class='content' vid="<?php echo $info['id']?>"><?php echo $info['content']?></textarea>
<input type="button" class="update" value="修改"/>

<script type="text/javascript" src="jquery1-8-0.js"></script>
<script type="text/javascript">
	$(function(){
		//alert('111')
		$(".update").click(function(){
			var content=$(".content").val();
			var id=$(".content").attr('vid');
			//alert(content)
			//alert(id)
			location.href="index.php?r=index/l_update_do&id="+id+"&content="+content;

		})

	})

</script>