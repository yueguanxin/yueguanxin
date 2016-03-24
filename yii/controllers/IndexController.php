<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Liuyan;
use \yii\data\Pagination;
/**
 * Site controller
 */
class IndexController extends Controller
{
	 public function actionIndex(){
	 	//echo "111";die;
	 	$liuyan=new Liuyan();
    	//$arr=$liuyan->find()->orderBy('time', 'desc')->all();
    	//print_r($arr);die;
    	$query = $liuyan->find()->orderBy('time');    //where条件可选，要也行不要就干掉。
	    $countQuery = clone $query;
	    $pages = new Pagination(['totalCount' => $countQuery->count()]);
	    $models = $query->offset($pages->offset)
	        ->limit($pages->limit)
	        ->all();

	    return $this->render('index', [
	         'models' => $models,
	         'pages' => $pages,
	    ]);
    }

    public function actionL_add(){
    	$liuyan=new Liuyan();
    	$content=$_GET['content'];
    	//echo $content;die;
    	$time=date("Y-m-d H:i:s",time());
    	$liuyan->content=$content;
    	$liuyan->time=$time;
    	$info=$liuyan->save();
    	//echo $info;die;
    	if($info){
    		echo "<script>alert('留言成功！');location.href='index.php?r=index/index'</script></script>";
    	}else{
    		echo "<script>alert('留言失败！');location.href='index.php?r=index/index'</script></script>";
    	}
    }

    public function actionL_del(){
    	$liuyan=new Liuyan();
    	$id=$_GET['id'];
    	//echo $id;die;
    	$info=$liuyan->findOne($id)->delete();
    	if($info){
    		echo "<script>alert('删除成功！');location.href='index.php?r=index/index'</script></script>";
    	}else{
    		echo "<script>alert('删除失败！');location.href='index.php?r=index/index'</script></script>";
    	}
    }

    public function actionL_update(){
    	$liuyan=new Liuyan();
    	$id=$_GET['id'];
    	//echo $id;die;
    	//$id=2;
    	$info=$liuyan->find()->where("id='".$id."'")->one();
    	//print_r($info);die;
    	return $this->render('update',['info'=>$info]);
    }

    public function actionL_update_do(){
    	$liuyan=new Liuyan();
    	//echo "222";die;
    	$db=yii::$app->db;
    	$id=$_GET['id'];
    	//echo $id;die;
    	$content=$_GET['content'];
    	//echo $content;die;
    	$info=$db->createCommand("update liuyan set content='".$content."' where id = '".$id."'")->execute();
    	//echo $info;die;
    	if($info){
    		echo "<script>alert('修改成功！');location.href='index.php?r=index/index'</script>";
    	}else{
    		echo "<script>alert('修改失败！')</script>";
    	}
    }
}