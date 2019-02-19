<?php

namespace App\Http\Controllers\ORM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Test\UserModel;

class UserController extends Controller
{
    public function list()
    {
    	$data = UserModel::all();
    	return view('orm/list',['data'=>$data]);
    }

    public function add(Request $request)
    {
    	if($request->isMethod('get')){
    		return view('orm/add');
    	}else if($request->isMethod('post')){
    		$user = UserModel::create($request->all());
    		if($user->save()){
    			return redirect('orm/list');
    		}else{
    			return redirect('orm/add');
    		}
    	}
    }

    public function edit(Request $request,$id)
    {
    	if($request->isMethod('get')){
    		$info = UserModel::find($id);
    		return view('orm/edit',['info'=>$info]);
    	}else if($request->isMethod('post')){

    		//第一种
    		// $info = UserModel::find($id);
    		// $info->name = $request->input('name');
    		// $info->pwd = $request->input('pwd');
    		// if($info->save()){
    		// 	return redirect('orm/list');
    		// }else{
    		// 	return redirect('orm/edit/'.$id);
    		// }
    		

    		//第二种
    		$rs = UserModel::find($id)->update($request->all());
    		if($rs===false){
    			return redirect('orm/edit/'.$id);
    		}else{
    			return redirect('orm/list');
    		}
    	}
    }

    public function del($id)
    {
    	$info = UserModel::find($id);
    	$info->delete();
    	return redirect('orm/list');
    }
}
