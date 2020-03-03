<table border="1">
	<tr>
		<td>编号</td>
		<td>账号</td>
		<td>图片</td>
		<td>手机号</td>
		<td>邮箱</td>
		<td>操作</td>
	</tr>
	@foreach($data as $k=>$v)
	<tr>
		<td>{{$v->id}}</td>
		<td>{{$v->account}}</td>
		<td><img src="{{env('APP_UPL')}}{{$v->img}}" width="50" height="50"></td>
		<td>{{$v->num}}</td>
		<td>{{$v->mail}}</td>
		<td>
			<a href="{{url('admin/edit/'.$v->id)}}">编辑</a> |
			<a href="{{url('admin/destroy/'.$v->id)}}">删除</a>|
		</td>
	</tr>
	@endforeach
</table>