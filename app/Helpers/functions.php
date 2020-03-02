<?php

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