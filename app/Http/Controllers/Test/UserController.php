<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function list()
    {
    	return view('user/list');
    }

    //给add方法注入request对象
    public function add(Request $request)
    {
    	// dd($request); //==var_dump() + die;
    	// dd($request->all());
    	// dd($request->input('age'));
    	if($request->isMethod('get'))
    	{
    		//显示视图
    		return "get request";
    	}else if($request->isMethod('post'))
    	{
    		//数据处理
    	}
    }
}
