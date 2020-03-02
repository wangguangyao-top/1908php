<b style="color: red">{{session('msg')}}</b>
<form action="{{url('/logindo')}}" method="post">
	@csrf
	账号:<input type="text" name="username"><br><br>
	密码:<input type="password" name="pwd"><br><br>
	<input type="submit" value="登陆">
</form>