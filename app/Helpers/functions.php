<?php

/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
function showMsg($status,$message = '',$data = array()){
    $result = array(
        'status' => $status,
        'message' =>$message,
        'data' =>$data
    );
    exit(json_encode($result));
}
    function createtree($data,$pid=0,$level=0){ 
        static $arr = [];
        foreach($data as $v){
             if($pid == $v['p_id']){
                $v['level'] = $level;
                $arr[] = $v;
                createtree($data,$v['goodsclass_id'],$level+1);
             }
        }
        return $arr;
}
//单文件上传
function uploads($file){
    //判断$file上传是否有误
    if(request()->file($file)->isValid()){
    //获取图片的信息
        $photo = request()->file($file);
    //图片的路径
        $store_result =$photo->store('images');
        return $store_result;
    }    
}

//多文件上传
function uploads2($file){
    $goods_imgs=request()->file($file);
    if(!is_array($goods_imgs)){
        return;
    }
    $arr=[];
    foreach($goods_imgs as $k=>$v){
       $arr[$k]=$v->store('images');  
    }
    $img=implode('|',$arr);
    return $img;
} 