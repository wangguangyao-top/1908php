<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goods_class;
use App\Goods;
use App\Brand;
class goodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $page=config('app.page');
        $data=Goods::join('goods_class','goods_class.goodsclass_id','=','goods.goods_classid')->join('brand','brand.brand_id','=','goods.brand_id')->paginate($page);
        return view('goods/index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brand=Brand::get();
        $goods_class=Goods_class::get();
        $createtree=createtree($goods_class);
        return view('goods/create',['brand'=>$brand,'createtree'=>$createtree]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->except('_token');   
        if($request->hasFile('goods_img')){
           $data['goods_img']=uploads('goods_img');
        }
        if($request->hasFile('goods_imgs')){
            $data['goods_imgs']=uploads2('goods_imgs');
         }
         $data['goods_plare']=date("Ymd").rand(10000,99999);
         $add=Goods::insert($data);
         if($add){
            //  '<script>alert("添加成功");window.location.href="";</script>';
            echo '<script>alert("添加成功");window.location.href="http://www.1908php.com/goods/index";</script>';
            die;
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $goods_class=Goods_class::get();
        $class2=createtree($goods_class);
        $brand=Brand::get();
        $goods=Goods::where('goods_id',$id)->first();
       return view('goods/edit',['class2'=>$class2,'brand'=>$brand,'goods'=>$goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=$request->except('_token');
        if($request->hasFile('goods_img')){
            $data['goods_img']=uploads('goods_img');
        }
        if($request->hasFile('goods_imgs')){
             $data['goods_imgs']=uploads2('goods_imgs');
        }

        $data2=Goods::where('goods_id',$id)->update($data);
        if($data2==1 || $data2==0){
            echo '<script>alert("修改成功");window.location.href="http://www.1908php.com/goods/index";</script>';
            die;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($id){
            $data=Goods::destroy($id);
            if($data){
                echo '<script>alert("删除成功");window.location.href="http://www.1908php.com/goods/index";</script>';
                 die;
            }
        }
    }
}
