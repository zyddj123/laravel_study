<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//基本路由
// Route::get('/hello', function () {
// 	return "hello world";
// });

//基本参数一个
Route::get('/hello/{id}', function ($id) {
	return "hello world".$id;
});

//基本参数两个
Route::get('/hello/{id}/{name}', function ($id,$name) {
	return "hello world".$id.$name;
});

//可选参数
Route::get('/hello/{id?}', function ($id=0) {
	return "hello world".$id;
});

//单参数的正则约束
Route::get('/list/{id}', function ($id) {
	return "hello world".$id;
})->where('id','\d+');

//多参数的正则约束
Route::get('/list/{name}/{age}', function ($n,$a) {
	return "hello world".$n.$a;
})->where(['name'=>'\w+','age'=>'\d+']);

//路由到控制器
Route::get('/user/fn', 'Test\UserController@list');

//中间件测试
Route::get('/login', function()
{
	session(['uid'=>'100']);
	return "login view";
});

Route::get('/setting', function()
{
	return "seting route uid=".session('uid');
})->middleware('login');

//http请求
Route::get('user/add','Test\UserController@add');





//http响应

//1基本相应
Route::get('/response',function(){
	return response('hello world',200)->header('content-type','text/html;charset=utf-8');
});

//2设置cookie
Route::get('/response/cookie',function(){
	return response('hello world',200)->withCookie('name','小名');
});

Route::get('/cookie',function(){
	dd(Cookie::get('name'));  //cookie门面
});

//3.ajax 返回json数据
Route::get('/ajax',function(){
	return view('user/ajax');
});

Route::get('/response/ajax',function(){
	return response()->json(['name'=>'小名','age'=>20]);
});


//原生数据库操作 
//插入
// Route::get('/db/insert',function(){
// 	$rs = DB::insert("insert into user value(null,'xiaoming','123456')");
// });
 

//构建器的使用
//获取所有记录
Route::get('/db/get',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->get();
	dd($data);
});

//获取单挑记录
Route::get('/db/first',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->first();
	dd($data);
});

//获取一列数据记录
Route::get('/db/pluck',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->pluck('name','id');
	dd($data);
});

//where子句
Route::get('/db/where',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->where('id','=',1)->get();
	dd($data);
});

//insert
Route::get('/db/insert',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->insert([['name'=>'zhaoliu','pwd'=>123456],['name'=>'qianduoduo','pwd'=>123456]]);
	dd($data);
});

//insertgetid
Route::get('/db/insertgetid',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->insertGetId(['name'=>'qianduoduo','pwd'=>123456]);
	dd($data);
});

//update
Route::get('/db/update',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->where('id',2)->update(['name'=>'aaaaaaaa']);
	dd($data);
});

//delete
Route::get('/db/delete',function(){
	// dd(DB::table('user'));
	$data = DB::table('user')->where('id',2)->delete();
	dd($data);
});


//Eloquent ORM  CURD
//列表的路由
Route::get('/orm/list','ORM\UserController@list');

//添加的路由
Route::match(['post','get'],'/orm/add','ORM\UserController@add');

//修改的路由
Route::match(['post','get'],'/orm/edit/{id}','ORM\UserController@edit')
	->where('id','\d+');

//删除的路由
Route::get('/orm/del/{id}','ORM\UserController@del')
	->where('id','\d+');