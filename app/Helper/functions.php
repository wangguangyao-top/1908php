<?php
/**
 * 公用的方法  返回json数据，进行信息的提示
 * @param $status 状态
 * @param string $message 提示信息
 * @param array $data 返回数据
 */
//文件上传
  function upload($filename){
        //判断文件上传是否有错误
        if(request()->file($filename)->isValid()){
            //接受值
            $photo=request()->file($filename);
            //上传
            $store_result=$photo->store('uploads');
            return $store_result;
        }
        exit('过程没有文件上传或文件上传错误');
    }