<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">  
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<center><h1>编辑品牌表</h1></center><br>
<body>

<form action="{{url('/brand/update/'.$user->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌名称</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="brand_name" value="{{$user->brand_name}}" id="firstname" 
                   placeholder="请输入品牌">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌logo</label>
        <div class="col-sm-10">
            <input type="file" name="brand_logo" value="{{$user->brand_logo}}" class="form-control">
            <img src="{{env('APP_UPL')}}{{$user->brand_logo}}" width="30" height="30">
        </div>
    </div>
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌网址</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="brand_email" value="{{$user->brand_email}}" id="firstname" 
                   placeholder="请输入网址">
        </div>
    </div>
    
    <div class="form-group">
        <label for="firstname" class="col-sm-2 control-label">品牌详情</label>
        <div class="col-sm-10">
            <textarea class="form-control" name="brand_desc" id="firstname" placeholder="请输入详情">{{$user->brand_desc}}</textarea>
            
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">编辑</button>
        </div>
    </div>
</form>

</body>
</html>