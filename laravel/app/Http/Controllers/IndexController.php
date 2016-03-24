<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use DB;

class IndexController extends BaseController
{
    public function index(){
    	$arr=DB::table('liuyan')->orderBy('time', 'desc')->paginate(3);
    	//print_r($arr);die;
    	return view('index/index',['arr'=>$arr]);
    }

    public function l_add(){
    	$content=$_GET['content'];
    	//echo $content;die;
    	$time=date("Y-m-d H:i:s",time());
    	$info=DB::table('liuyan')->insert(['content'=>$content,'time'=>$time]);
    	//echo $info;die;
    	/*if($info){
    		echo "<script>alert('留言成功！')</script>";
    	}else{
    		echo "<script>alert('留言失败！')</script>";
    	}*/
    	$arr=DB::table('liuyan')->orderBy('time', 'desc')->paginate(3);
    	//print_r($arr);die;
    	return view('index/list',['arr'=>$arr]);
    }

    public function l_del(){
    	$id=$_GET['id'];
    	//echo $id;die;
    	$info=DB::table('liuyan')->where(['id'=>$id])->delete();
    	/*if($info){
    		echo "<script>alert('删除成功！')</script>";
    	}else{
    		echo "<script>alert('删除失败！')</script>";
    	}*/
    	$arr=DB::table('liuyan')->orderBy('time', 'desc')->paginate(3);
    	//print_r($arr);die;
    	return view('index/list',['arr'=>$arr]);
    }

    public function l_update(){
    	$id=$_GET['id'];
    	//echo $id;die;
    	//$id=2;
    	$info=DB::table('liuyan')->where(['id'=>$id])->first();
    	//print_r($info);die;
    	return view('index/update',['info'=>$info]);
    }

    public function l_update_do(){
    	//echo "222";die;
    	$id=$_GET['id'];
    	//echo $id;die;
    	$content=$_GET['content'];
    	//echo $content;die;
    	$info=DB::table('liuyan')->where(['id'=>$id])->update(['content' => $content]);
    	//echo $info;die;
    	if($info){
    		echo "<script>alert('修改成功！')</script>";
    	}else{
    		echo "<script>alert('修改失败！')</script>";
    	}
    	$arr=DB::table('liuyan')->orderBy('time', 'desc')->paginate(3);
    	//print_r($arr);die;
    	return view('index/index',['arr'=>$arr]);
    }
}
