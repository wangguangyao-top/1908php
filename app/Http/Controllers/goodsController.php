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
    public function pay($order){
        require_once app_path('ailpay/wappay/service/AlipayTradeService.php');
        require_once app_path('ailpay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php');
        require app_path('ailpay/config.php');
        $out_trade_no = $order;
    if (!empty($out_trade_no)&& trim($out_trade_no)!=""){
    //商户订单号，商户网站订单系统中唯一订单号，必填
    
    //订单名称，必填
    $subject = '苹果8P';

    //付款金额，必填
    $total_amount = rand(1,10000);

    //商品描述，可空
    $body = '';

    //超时时间
    $timeout_express="1m";

    $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
    $payRequestBuilder->setBody($body);
    $payRequestBuilder->setSubject($subject);
    $payRequestBuilder->setOutTradeNo($out_trade_no);
    $payRequestBuilder->setTotalAmount($total_amount);
    $payRequestBuilder->setTimeExpress($timeout_express);

    $payResponse = new \AlipayTradeService($config);
    $result=$payResponse->wapPay($payRequestBuilder,$config['return_url'],$config['notify_url']);

    return ;
    }
  }
  public function return_url(){
    require_once app_path("ailpay/config.php");
    require_once app_path('ailpay/wappay/service/AlipayTradeService.php');
    
    
    $arr=$_GET;
    $alipaySevice = new \AlipayTradeService($config); 
    $result = $alipaySevice->check($arr);
    
    /* 实际验证过程建议商户添加以下校验。
    1、商户需要验证该通知数据中的out_trade_no是否为商户系统中创建的订单号，
    2、判断total_amount是否确实为该订单的实际金额（即商户订单创建时的金额），
    3、校验通知中的seller_id（或者seller_email) 是否为out_trade_no这笔单据的对应的操作方（有的时候，一个商户可能有多个seller_id/seller_email）
    4、验证app_id是否为该商户本身。
    */
    if($result) {//验证成功
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        //请在这里加上商户的业务逻辑程序代码
        
        //——请根据您的业务逻辑来编写程序（以下代码仅作参考）——
        //获取支付宝的通知返回参数，可参考技术文档中页面跳转同步通知参数列表
    
        //商户订单号
    
        $out_trade_no = htmlspecialchars('123456');
    
        //支付宝交易号
    
        $trade_no = htmlspecialchars('9999');
            
        echo "验证成功<br />外部订单号：".$out_trade_no;
    
        //——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
        
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    }
    else {
        //验证失败
        echo "验证失败";
    }
  }
}
