<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *列表页展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$data = DB::table('people')->select('*')->get();
        
        $data = Brand::get();
        return view('brand.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *执行添加
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except('_token');

        //文件上传
        if($request->hasFile('brand_logo')){
            $data['brand_logo'] = $this->uploads('brand_logo');
            
        }
        //dd($data);
        //DB
        //$res = DB::table('people')->insert($data);
        //ORM
        $res = Brand::create($data);
        if($res){
            return redirect('/brand');
        }
    }

    public function uploads($filename){
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

    /**
     * Display the specified resource.
     *阅览详情页
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('brand')->where('brand_id',$id)->first();
        //$user = Brand::find($id);
        return view('brand.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *执行编辑
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //echo $id;die;
        $user = $request->except('_token');
         //文件上传
        if($request->hasFile('brand_logo')){
            $user['brand_logo'] = $this->uploads('brand_logo');
            //dd($data);
        }
        //DB
        $res = DB::table('brand')->where('brand_id',$id)->update($user);
        //orm
        //$res = Brand::where('brand_id',$id)->update($user);


        if($res!==false){
            return redirect('/brand');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //DB
        $res = DB::table('brand')->where('brand_id',$id)->delete();
        
        //orm
        //$res = Brand::destroy($id);
        if($res){
            return redirect('/brand');
        }
    }
}
