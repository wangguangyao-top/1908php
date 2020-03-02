<form action="{{url('/admin/store')}}" method="post" enctype="multipart/form-data">
@csrf
  账号:<input type="text" name="account"><br><br>
  密码:<input type="password" name="pwd"><br><br>
  图片:<input type="file" name="img"><br><br>
  手机号:<input type="text" name="num"><br><br>
  邮箱:<input type="text" name="mail"><br><br>
  <input type="submit" value="添加">
</form>