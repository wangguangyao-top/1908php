<form action="{{url('/admin/update/'.$admin->id)}}" method="post" enctype="multipart/form-data">
@csrf
  账号:<input type="text" name="account" value="{{$admin->account}}"><br><br>
  密码:<input type="password" name="pwd" value="{{$admin->pwd}}"><br><br>
  图片:
  <img src="{{env('APP_UPL')}}{{$admin->img}}" width="50" height="50">
  <input type="file" name="img"><br><br>
  手机号:<input type="text" name="num" value="{{$admin->num}}"><br><br>
  邮箱:<input type="text" name="mail" value="{{$admin->mail}}"><br><br>
  <input type="submit" value="修改">
</form>