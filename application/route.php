<?php
use think\Route;

/*栗子*/
//Route::rule('a/','api/Login/a');

/*首页*/
Route::get('/position/:id', 'api/Login/position'); //获取当前定位
//Route::get('/positions/:id','api/Login/positions'); //手动定位
Route::get('/Search/:id', 'api/Login/Search'); //全文关键字搜索
Route::get('/login', 'api/Login/login'); //登陆
Route::get('/city', 'api/Login/city'); //所有城市
Route::get('/lbImg', 'api/Login/lbImg');//轮播图
Route::get('/get_qrcode', 'api/Login/get_qrcode'); //获取二维码

/*个人中心*/
Route::get('/infoperson/:id', 'api/User/infoPerson'); //个人信息
Route::post('/infoedit', 'api/User/infoEdit');//修改个人信息
Route::get('/mymsg/:id', 'api/User/myMsg');//我发布的信息
Route::get('/mymsgdel/:id', 'api/User/myMsgDel');//我发布删除
Route::get('/housetype', 'api/User/houseType');//我发布的信息
Route::post('/upFile', 'api/User/upFile');//上传
Route::get('/kfphone', 'api/User/kfPhone');//客服电话
Route::get('/pay', 'api/User/pay');//经纪人付费


/*搜索*/
Route::get('/searchindex/:id', 'api/Search/index'); //首页搜索
Route::get('/citysearch', 'api/Search/citySearch'); //城市搜索
Route::get('/getMsg/:id', 'api/Search/getMsg'); //城市搜索

/*求购发布*/
Route::post('/gethouse', 'api/Publish/getHouse');  //求购发布
Route::post('/sellhouse', 'api/Publish/sellHouse');  //卖房发布
Route::post('/rent', 'api/Publish/rent');  //租房
Route::post('/recruit', 'api/Publish/recruit');  //招聘
Route::post('/upFiles', 'api/Publish/upFiles');  //上传多图

/*信息详情*/
Route::get('/gethousedes/:id', 'api/Des/getHouseDes');  //求购发布
Route::get('/sellhousedes/:id', 'api/Des/sellHouseDes');  //卖房
Route::get('/rentdes/:id', 'api/Des/rentDes');  //租房
Route::get('/recruitdes/:id', 'api/Des/recruitDes');  //招聘
Route::get('/house/:id', 'api/Des/house');  //二手房等等房源详情

/*微信支付*/
Route::post('/wxpay', 'api/Wx/Wx_Pay');  //微信支付
Route::post('/wxspeech', 'api/Wx/wxSpeech');  //微信支付回调
Route::post('/wxpayphone', 'api/Wx/Wx_Payphone');  //微信支付
Route::post('/wxspeechphone', 'api/Wx/wxSpeechphone');  //微信支付回调


