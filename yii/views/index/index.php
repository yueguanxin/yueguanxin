<?php 
use \yii\widgets\LinkPager;  //也是把这个放在头部
?>

<h1>您好</h1>
<textarea id="content"></textarea>
<input type="button" class="click" value="留言"/>

<div class="list">

<?php
	foreach ($models as $key => $value) {
?>
		<li><?php echo $value['content']?>----<?php echo $value['time']?>------<a href="index.php?r=index/l_del&id=<?php echo $value['id']?>">删除</a> || <a href="#" class="update" value="<?php echo $value['id']?>">修改</a></li>
<?php		
	}
?>



<?php echo LinkPager::widget([
    'pagination' => $pages,
	]);
?>

</div>






<script type="text/javascript" src="jquery1-8-0.js"></script>
<script type="text/javascript">
	$(function(){
		//alert('111')
		$(".click").click(function(){
			var content=$("#content").val();
			//alert(content)
			location.href="index.php?r=index/l_add&content="+content;

		})

		$(".update").click(function(){
			var id=$(this).attr('value');
			//alert(id);
			location.href="index.php?r=index/l_update&id="+id;
		})


	})

</script>
