<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"> 
    <title>Bootstrap 实例 - 水平表单</title>
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">  
    <script src="/static/js/jquery.min.js"></script>
    <script src="/static/js/bootstrap.min.js"></script>
</head>
<center><h1>品牌列表</h1></center><br>
<body>
    <table class="table">
      <thead> 
        <tr>
            <td>ID</td>
            <td>品牌名称</td>
            <td>品牌logo</td>
            <td>品牌网址</td>
            <td>品牌详情</td>
            <td>操作</td>
        </tr>
      </thead>
      <tbody>
        @foreach($data as $k=>$v)
        <tr @if($k%2==0) class="active" @else class="success" @endif>
            <td>{{$v->brand_id}}</td>
            <td>{{$v->brand_name}}</td>
            <td><img src="{{env('APP_UPL')}}{{$v->brand_logo}}" width="50" height="50"></td>
            <td>{{$v->brand_email}}</td>  
            <td>{{$v->brand_desc}}</td>
            <td><a href="{{url('brand/edit/'.$v->brand_id)}}" class="btn btn-info">编辑</a>|<a href="{{url('brand/destroy/'.$v->brand_id)}}" class="btn btn-danger">删除</a></td>
        </tr>
        @endforeach
      </tbody> 
    </table>
</body>
</html>