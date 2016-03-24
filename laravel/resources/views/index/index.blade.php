
<h1>您好</h1>
<textarea id="content"></textarea>
<input type="button" class="click" value="留言"/>

<div class="list">

@foreach ($arr as $value)
        	<li>{{$value['content']}}----{{$value['time']}}------<a href="#" class="del" value="{{$value['id']}}">删除</a> || <a href="#" class="update" value="{{$value['id']}}">修改</a></li>
   @endforeach


</div>

{!! $arr->render() !!}








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
