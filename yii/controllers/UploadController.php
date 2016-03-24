<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\UploadForm;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class UploadController extends Controller
{


	public $enableCsrfValidation = false;
	//上传
   public function actionUpload()
{
    //$model = new UploadForm();

        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->file && $model->validate()) {                
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }else{
		echo 1;
		}
		/*$model = new UploadForm();
		//$a=new UserForm();

        if (Yii::$app->request->isPost) {
         $img=   $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
		// print_r($img);die;
            if ($model->upload()) {
				$request=Yii::$app->request;
                // 文件上传成功
				//$a->img=$img->name;
				//$a->save();

				echo '上传成功！！！';
                return;
            }
        }*/


    return $this->render('upload', ['model' => $model]);
}

}
