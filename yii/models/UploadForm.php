<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
*/
class UploadForm extends Model
{
    /**
    * @var UploadedFile file attribute
    */
    public $file;

    /**
    * @return array the validation rules.
    */
    public function rules()
    {
        return [
            [['file'], 'file'],
        ];
    }
}

/*namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;
use yii\db\ActiveRecord;

class UploadForm extends ActiveRecord
{
    /**
     * @var UploadedFile
     

    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs('uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }
}*/