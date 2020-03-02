<?php

<<<<<<< HEAD
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
=======
  function getCateInfo($cateInfo,$pid=0,$level=1){
    static $info=[];
    // if(!$cateInfo){
    //     return;
    //}
    foreach($cateInfo as $k=>$v){
        if($v['pid']==$pid){
            $v['level']=$level;
            $info[]=$v;
            getCateInfo($cateInfo,$v['c_id'],$v['level']+1);
        }
    }
    return $info;
}  

//单文件上传
    function uploads($filename){
       //判断上传过程有无错误
       if(request()->file($filename)->isValid()){
       //接受值
       $photo = request()->file($filename);
       //上传
       $store_result = $photo->store('uploads');
       return $store_result;
       }
       exit('未获取到上传文件或上传过程出错');
    }


    //多文件上传
    function Moreuploads($filename){
        $photo = request()->file($filename);
        if(!is_array($photo)){
            return;
        }

    foreach($photo as $v){
           //判断上传过程有无错误
       if($v->isValid()){
       
       $store_result[] = $v->store('uploads');
       
       }

    }
       return $store_result;
    }
>>>>>>> 216fabe2b7f8eac464cc03075e0075a75f6a9bfb
